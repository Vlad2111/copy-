<?php
/*
* Copyright (c) 2016 Tecom LLC
* All rights reserved
*
* �������������� ����� (c) 2016 ����������� ��� �����
* ��� ����� ��������
*/
/**
����� Singleton

@author ershov.v
*/
class Configuration
{
	public $config = array();
	static $instance = null;
	
	function __construct() {
	}

	/** ������������ �������� �� config.*/
	public static function instance()
	{
		if (Configuration::$instance == null) {
			Configuration::$instance = new Configuration();
  			Configuration::$instance->readConfig();
		}
		return Configuration::$instance;
	}
	
	/** ������ ���������� �� ����� config.*/
	private function readConfig()
	{
		$this->config = parse_ini_file("config.ini");
	}
}
?>