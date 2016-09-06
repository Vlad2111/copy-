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
Класс контроллер, информация о сотруднике.

@author ershov.v
*/
Class Controller_Employee Extends Controller_Base {

	public $log;
	public $postgreSQL;
	
	/** Отображение списка проетов и время сотрудника. */
	function viewEmployee() {
		if($this->checkSession() == TRUE){
			$date = $date = $this->getDate();
			$this->template->vars('date', $date);
			
			$status = $this->checkDataEditingForDate($date);
			$this->template->vars('statusEditingData', $status);
			
			$this->template->vars('employeeId', $_GET['employeeId']);
			$this->template->vars('employeeLogin', $_GET['employeeLogin']);
			$this->template->vars('employeeName', $_GET['employeeName']);
			$this->template->vars('departmentId', $_GET['departmentId']);
			if (isset ($_GET['I'])){
				$_GET['departmentName']=$_GET['departmentName']."&I";
			}
			if (isset ($_GET['D'])){
				$_GET['departmentName']=$_GET['departmentName']."&D";
			}
			$this->template->vars('departmentName', $_GET['departmentName']);
																
			$arrayDepartmentNames = $this->postgreSQL->getDepartmentNames($date);
			$this->template->vars('arrayDepartmentNames', $arrayDepartmentNames);
			
			$arrayProjectNamesForDepartment = $this->postgreSQL->getProjectNamesForDepartment($_GET['departmentId'], $date);
			$this->template->vars('arrayProjectNamesForDepartment', $arrayProjectNamesForDepartment);
		
			$arrayProjectNamesNotForDepartment = $this->postgreSQL->getProjectNamesNotForDepartment($_GET['departmentId'], $date);
			$this->template->vars('arrayProjectNamesNotForDepartment', $arrayProjectNamesNotForDepartment);
			
			$arrayEmployeeInfo = $this->postgreSQL->getEmployeeInfo($_GET['employeeId'], $date);
			$this->template->vars('arrayEmployeeInfo', $arrayEmployeeInfo);
		
			$employeePercentSum = 0;
			for ($i=0; $i<count($arrayEmployeeInfo); $i++){
				$employeePercentSum = $employeePercentSum + $arrayEmployeeInfo[$i]['time'];
			}
			$this->template->vars('employeePercent', $employeePercentSum);
			
			$this->template->view('employee', 'EmployeeLayout');
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
	
	/** Проверка данных для даты на возможность редактирования. */
	private function checkDataEditingForDate(DateTime $date) {
		$status = $this->postgreSQL->getDataStatusForEditing($date);
		if($status == null){
			$this->postgreSQL->newDataStatusForEditing($date, 0);
			return FALSE;
		}else{
			return $status['0']['editing_status'];
		}
	}
	
	/** Изменение возможности редактирования данных. */
	function changeDataStatusForEditing() {
		$date = $this->getDate();
		if($_GET['lastStatus']==FALSE){
			$status = $this->postgreSQL->changeDataStatusForEditing($date, 1);
		}else{
			$status = $this->postgreSQL->changeDataStatusForEditing($date, 0);
		}
		$this->viewEmployee();
	}
	
	/** Редактирование информации сотрудника. */
	function editEmployee(){
		$date = $this->getDate();
		$user=$this->checkLoginLdapForEmployee();
		$idNameDepartment = explode('*-*', $_GET['newDepartmwent']);
		if($idNameDepartment['1']!=null){
			$departmentId=$idNameDepartment['0'];
			$departmentName=$idNameDepartment['1'];
		}else{
			$departmentId=$_GET['newDepartmwent'];
		}
		$this->postgreSQL->changeEmployeeInfo($_GET['editId'], $date,
				$user['Login'], $user['Name'], $departmentId);
				
		$_GET['employeeId'] = $_GET['editId'];
		$_GET['employeeName'] = $user['Name'];
		$_GET['employeeLogin'] = $user['Login'];
		$_GET['departmentId'] = $departmentId;
		$_GET['departmentName'] = $departmentName;
		$this->viewEmployee();
	}
		
	/** Проверка логина сотрудника в LDAP при создании и редактировании. */
	private function checkLoginLdapForEmployee() {
		$ldap = new LdapOperations();
		$ldap->connect();
		$rows = $ldap->getLDAPAccountNamesByPrefix($_GET['newLogin']);
		if (count($rows)>1){
			$this->template->vars('rows', $rows);
			$this->template->view('selectLoginInLDAP', 'index');
		}else{
			$user['Name'] = $rows['0']['sn'].' '.$rows['0']['givenName'];
			$user['Login'] = $rows['0']['sAMAccountName'];
			return $user;
		}
	}
		
	/* Действия с процентами */
	/** ->Добавление времени. */
	function newPercent(){
		$date = $this->getDate();
		$this->postgreSQL->newTimeDistribution($date, $_GET['projectId'],
				$_GET['employeeId'], $_GET['newTime']);
		$this->viewEmployee();
	}
		
	/** -->Редактирование времени. */
	function editPercent(){
		$date = $this->getDate();
		$this->postgreSQL->changeEployeeTimeForProject($_GET['employeeId'], $_GET['projectId'],
				$date, $_GET['newTime']);
		$this->viewEmployee();
	}
		
	/** -->Удаление времени. */
	function removePercent() {
		$date = $this->getDate();
		$this->postgreSQL->deleteTimeDistribution($date, $_GET['projectId'], $_GET['employeeId']);
		$this->viewEmployee();
	}
}
