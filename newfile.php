<?php
echo 1;
/*
* Copyright (c) 2016 Tecom LLC
* All rights reserved
*
* �������������� ����� (c) 2016 ����������� ��� �����
* ��� ����� ��������
*/
/**
/**
�����, �������� � ������ ������ PostgreSQL

@author ershov.v
*/

class PostgreSQLOperations
{
	/** ����������� � ���� ������.*/
	public function dbConnection()
	{ 
		$dbConnect = null;
		$DBConfiguration = Configuration::instance()->config;
		echo $DBConfiguration;
		$DBConfigurationString = "host={$DBConfiguration[host]} port={$DBConfiguration[port]} dbname={$DBConfiguration[dbName]} user={$DBConfiguration[user]} password={$DBConfiguration[password]}";
		$dbConnect = pg_pconnect($DBConfigurationString);
		if (!$dbConnect) {
			throw new Exception("�� ������� ����������� � ���� ������");
		}
	}
	/** ������ ���� ������������.*/
	public function getRoleNameAndId($userId)
	{
	$roleIdName = pg_query($dbConnect, "SELECT r.role_id, rd.role_name FROM Role AS r inner join Role_def AS rd on r.role_id = rd.role_id WHERE user_id = $userId");
	return array ($roleIdName);
	}
	
	/** ������ ���� ����� ������.*/
	public function getDepartmentHead($userId)
	{
	$departmentIdName = pg_query($dbConnect, "SELECT department_id FROM Head_departments WHERE user_id = $userId");
	$departmentName = pg_query($dbConnect, "SELECT department_name FROM Departments WHERE department_id = $departmentId");	
	return array ($departmentName, $departmentId);
	}
}

$this->dbConnection();

?>