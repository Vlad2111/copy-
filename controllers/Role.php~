<?php
session_start();
/*
* Copyright (c) 2016 Tecom LLC
* All rights reserved
*
* Исключительное право (c) 2016 пренадлежит ООО Теком
* Все права защищены
*/
/**
Класс контроллер, список пользователей и ролей.

@author ershov.v
*/
Class Controller_Role Extends Controller_Base {

	public $log;
	public $postgreSQL;
	
	/** Отображение списка пользоваьелей и ролей. */
	function viewRole() {
		if($this->checkSession() == TRUE){
			$date = $this->getDate();
			$this->template->vars('date', $date);
		
			$arrayEmployeeNames = $this->postgreSQL->getEmployeeNames($date);
			$this->template->vars('arrayEmployeeNames', $arrayEmployeeNames);
			
			$arrayDepartmentNames = $this->postgreSQL->getDepartmentNames($date);
			$this->template->vars('arrayDepartmentNames', $arrayDepartmentNames);
			
			$arrayRoleDef = $this->postgreSQL->getRoleDef();
			$this->template->vars('arrayRoleDef', $arrayRoleDef);
			
			$arrayEmployeeRoleNamesAndId = $this->postgreSQL->getEmployeeRoleNamesAndId($date);
			$this->template->vars('arrayEmployeeRoleNamesAndId', $arrayEmployeeRoleNamesAndId);
			
			$this->template->view('role', 'RoleLayout');
		}else{
			$_GET['route']='Index';
			include 'index.php';
		}
	}
	
	/** Получение даты. */
	private function getDate() {
		if (($_GET['Month']!=null)AND($_GET['Year']!=null)){
			$date = new DateTime('01.'.$_GET['Month'].'.'.$_GET['Year'], new DateTimeZone('UTC'));
		}else{
			if ($_GET['date']!=null){
				$dayMonthYear = explode('/', $_GET['date']);
				$date = new DateTime('01.'.$dayMonthYear['0'].'.'.$dayMonthYear['2'], new DateTimeZone('UTC'));
			}else{
				$date = new DateTime();
				$date->setTimezone(new DateTimeZone('UTC'));
			}
		}
		return $date;
	}

	/** Проверка сессии. */
	private function checkSession() {
		if($_SESSION['startSESSION'] == 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	/* Действия с ролями */
	/** ->Добавление роли. */
	function newRole(){
		$date = $this->getDate();
		$this->postgreSQL->newRole($_GET['employeeId'], $_GET['roleId']);
		if($_GET['roleId']=='1'){
			$this->postgreSQL->newHeadDepartment($date, $_GET['employeeId'], $_GET['headDepartmentId']);
		}
		$this->viewRole();
	}
		
	/** -->Редактирование роли. */
	function editRole(){
		$date = $this->getDate();
		
		if(($_GET['lastHeadDepartmentId']!=null)AND($_GET['roleId']!='1')){
			$this->postgreSQL->deleteHeadDepartment($date, $_GET['employeeId'], $_GET['lastHeadDepartmentId']);
		}
		
		if(($_GET['lastHeadDepartmentId']==null)AND($_GET['roleId']=='1')){
			$this->postgreSQL->newHeadDepartment($date, $_GET['employeeId'], $_GET['headDepartmentId']);
		}
		
		if(($_GET['lastHeadDepartmentId']!=null)AND($_GET['roleId']=='1')){
			$this->postgreSQL->changeHeadDepartment($date, $_GET['employeeId'], $_GET['lastHeadDepartmentId'], $_GET['headDepartmentId']);
		}
		
		$this->postgreSQL->changeRole($_GET['employeeId'], $_GET['roleId']);
		$this->viewRole();
	}
		
	/** -->Удаление роли. */
	function removeRole() {
		$date = $this->getDate();
		$this->postgreSQL->deleteRole($_GET['employeeId']);
		if($_GET['lastHeadDepartmentId']!=null){
			$this->postgreSQL->deleteHeadDepartment($date, $_GET['employeeId'], $_GET['lastHeadDepartmentId']);
		}
		$this->viewRole();
	}
	
}
