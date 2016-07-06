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
			echo pg_connection_status($connection);
			$this->log->error("�� ������� ����������� � ���� ������. ".$DBConfigurationString." ");
			throw new Exception("�� ������� ����������� � ���� ������. ".$DBConfigurationString." ");
		}
		$this->log->info("�������� ����������� � ���� ������ PostgreSQL: ". $DBConfigurationString);
		return $this->dbConnect;
	}
	
	/** ������ ���� ������������.*/
	public function getRoleNameAndId($userId)
	{
		$result = pg_query_params($this->dbConnect, 'SELECT r.role_id, rd.role_name FROM "Role" '.
				'AS r inner join "Role_def" AS rd on r.role_id = rd.role_id WHERE r.user_id = $1', 
				array($userId));
		if (!$result) {
			$this->log->error("�� ������� ��������� ������ ���� ��� ������������: ". $userId);
			throw new Exception("�� ������� ��������� ������ ���� ��� ������������: ". $userId);
		}
		if (pg_num_rows($result)<1) {
			$this->log->error("��� ������ � ������ ������������: ". $userId);
			throw new Exception("��� ������ � ������ ������������: ". $userId);
		}
		if (pg_num_rows($result)>1) {
			$this->log->error("������ �������. �������� ��������� �����������");
			throw new Exception("������ �������. �������� ��������� �����������");
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
			$this->log->error("�� ������� ��������� ������ ���������� ������ ��� ���� \"�������� �������������\". ������������: ". $userId);
			throw new Exception("�� ������� ��������� ������ ���������� ������ ��� ���� \"�������� �������������\". ������������: ". $userId);
		}
		if (pg_num_rows($result)<1) {
			$this->log->error("��� ������ � ������ ������������: ". $userId);
			throw new Exception("��� ������ � ������ ������������: ". $userId);
		}
		if (pg_num_rows($result)>1) {
			$this->log->error("������ �������. �������� ��������� �����������");
			throw new Exception("������ �������. �������� ��������� �����������");
		}
		$departmentNameAndId = pg_fetch_all($result);
		return $departmentNameAndId;
	}
	
	/** ������� ��������.*/
	public function clonModelData(DateTime $datefrom, DateTime $dateto)
	{
		//��������� �������
		$month = $dateTime->format('U');
		/** ������� �������.*/
		$result = pg_query($this->dbConnect, 'SELECT department_id, department_name '.
				'FROM "Departments"'/* WHERE date_part(\'epoch\', date_trunc(\'month\', date)) = $1', array($month)*/);
		if (!$result) {
			throw new Exception("�� ������� ��������� ������ �� ��������� ������ �������. ������: ". pg_last_error());
		}
		$departmentRows = pg_fetch_all($result);
		return $departmentRows;
		array_unshift($departmentsTable, "date" -> $month);
		pg_copy_from($this->dbConnect, "Departments", $departmentRows);
		
	}
	/** ������ ������ �������.*/
	public function getDepartmentNames($month)
	{
		$dateTime = new DateTime($month);
		
		$month=$dateTime->format('m.Y');
		echo $month;
		$result = pg_query($this->dbConnect, 'SELECT date_part(\'epoch\', date), department_id, department_name '.
				'FROM "Departments" WHERE date_trunc(\'month\', date) = $1', array($month));
		if (!$result) {
			throw new Exception("�� ������� ��������� ������ �� ��������� ������ �������. ������: ". pg_last_error());
		}
		$departmentNameAndId = pg_fetch_all($result);
		return $departmentNameAndId;
	}
}
?>