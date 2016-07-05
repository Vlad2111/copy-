<?php
/*
 * Copyright (c) 2016 Tecom LLC
 * All rights reserved
 *
 * �������������� ����� (c) 2016 ����������� ��� �����
 * ��� ����� ��������
 */		

include_once 'Configuration.php';
include_once 'Logger.php';

/**
 ����� ����� ����������.

 @author ershov.v
 */
class ApplicationInit
{
	public static function init()
	{

		$configForLogger = Configuration::instance()->config;
		$osType = PHP_OS;
		if ($osType = 'WINNT') {
			Logger::configure ( $configForLogger ['loggerConfigWindows'] );
		} else {
			if ($osType = 'LINUX') {
				Logger::configure ( $configForLogger ['loggerConfigLinux'] );
			}
		}
	}
	
}
?>