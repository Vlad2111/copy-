<?php
/*
* Copyright (c) 2016 Tecom LLC
* All rights reserved
*
* Исключительное право (c) 2016 пренадлежит ООО Теком
* Все права защищены
*/
/**
Класс Singleton

@author ershov.v
*/
class Configuration
{
	public $config = array();
	static $instance = null;
	
	function __construct() {
	}

	/** Фиксирование настроек из config. */
	public static function instance()
	{
		if (Configuration::$instance == null) {
			Configuration::$instance = new Configuration();
  			Configuration::$instance->readConfig();
		}
		return Configuration::$instance;
	}
	
	/** Чтение переменных из файла config. */
	private function readConfig()
	{
		 if(substr($_SERVER['DOCUMENT_ROOT'],-4)=="-dev"){
			$this->config = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/../hr-timetrack-dev-config");
		}else{
			$this->config = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/../hr-timetrack-config");

		}
	}
}
