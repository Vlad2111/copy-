<?php
/*
* Copyright (c) 2016 Tecom LLC
* All rights reserved
*
* �������������� ����� (c) 2016 ����������� ��� �����
* ��� ����� ��������
*/
/**
�����, �������� � ������ ������ PostgreSQL

@author ershov.v
*/
class PostgreSQLOperations
{
	private $dbConnect;
	private $log;
	
	function __construct() {
		$this->log = Logger::getLogger(__CLASS__);
	}
	
		/** ����������� � ���� ������.*/
	public function connect()
	{ 
		$dbConnect = null;
		$DBConfiguration = Configuration::instance()->config;
		$DBConfigurationString = "host={$DBConfiguration['host']} ".
				"port={$DBConfiguration['port']} ".
				"dbname={$DBConfiguration['dbName']} ".
				"user={$DBConfiguration['user']} ". 
				"password={$DBConfiguration['password']}";
		$this->dbConnect = pg_pconnect($DBConfigurationString);
		if (!$this->dbConnect) {
			$this->log->error("PostgreSQL database not available!");
			throw new Exception("�� ������� ����������� � ���� ������. ".$DBConfigurationString." ".pg_last_error());
		}
		$this->log->info("Obtained connection of the database PostgreSQL with: ". $DBConfigurationString);
		return $this->dbConnect;
	}
	
	/** ������ ���� ������������.*/
	public function getRoleNameAndId($userId)
	{
		$result = pg_query_params($this->dbConnect, 'SELECT r.role_id, rd.role_name FROM "Role" '.
				'AS r inner join "Role_def" AS rd on r.role_id = rd.role_id WHERE r.user_id = $1', 
				array($userId));
		if (!$result) {
			throw new Exception("�� ������� ��������� ������ ����.");
		}
		if (pg_num_rows($result)<1) {
			$this->log->error("  ");
			throw new Exception("��� ������ � ������ ������������.");
		}
		if (pg_num_rows($result)>1) {
			throw new Exception("������ �������.");
		}
		$roleIdName = pg_fetch_all($result);
		return $roleIdName;
	}
	
	/** ������ ���� ����� ������.*/
	public function getDepartmentHead($userId)
	{
		$result = pg_query_params($this->dbConnect, 'SELECT r.department_id, rd.department_name '.
				'FROM "Head_departments" AS r inner join "Departments" AS rd on '.
				'r.department_id = rd.department_id WHERE r.user_id = $1', array($userId));
		if (!$result) {
			throw new Exception("�� ������� ��������� ������ ������.");
		}
		if (pg_num_rows($result)<1) {
			$this->log->error(date("[d-M-Y H:i:s]")." Alien head department.");
			throw new Exception("��� ������ � ������ ������������.");
		}
		if (pg_num_rows($result)>1) {
			throw new Exception("������ �������.");
		}
		$departmentNameAndId = pg_fetch_all($result);
		return $departmentNameAndId;
	}
	
	/** ������� ��������.*/
	public function returnInformation($month)
	{
		$month = $month - 1;
		/** ������� �������.*/
		$result = pg_query_params($this->dbConnect, 'SELECT department_id, department_name '.
				'FROM "Departments" WHERE date = $1', array($month));
		$departmentRows = pg_fetch_all($result);
		array_unshift($departmentsTable, "date" -> $month);
		pg_copy_from($this->dbConnect, "Departments", $departmentRows);
		
	}
	
	/** ������ ������ �������.*/
	public function getDepartmentNames(DateTime $month)
	{
		$result = pg_query($this->dbConnect, 'SELECT date_part(\'epoch\', date), department_id, department_name '.
				'FROM "Departments" WHERE date = $1', array($month));
		if (!$result) {
			throw new Exception("�� ������� ��������� ������ �� ��������� ������ �������. ������: ". pg_last_error());
		}
		$departmentNameAndId = pg_fetch_all($result);
		return $departmentNameAndId;
	}
}
?>