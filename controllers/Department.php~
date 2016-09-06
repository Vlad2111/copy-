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
Класс контроллер, информация об отделе.

@author ershov.v
*/
Class Controller_Department Extends Controller_Base {

	public $log;
	public $postgreSQL;

	/** Отображение списка сотрудников и проектов отдела. */
	function viewDepartment() {
		if($this->checkSession() == TRUE){		
			$date = $this->getDate();
			$this->template->vars('date', $date);
		
			$status = $this->checkDataEditingForDate($date);
			$this->template->vars('statusEditingData', $status);
		
			if ((isset ($_GET['I']))AND($_GET['departmentName']=="C")){
				$_GET['departmentName']=$_GET['departmentName']."&I";
			}
			if ((isset ($_GET['D']))AND($_GET['departmentName']=="R")){
				$_GET['departmentName']=$_GET['departmentName']."&D";
			}
			$this->template->vars('departmentId', $_GET['departmentId']);
			$this->template->vars('departmentName', $_GET['departmentName']);
			
			$arrayDepartmentNames = $this->postgreSQL->getDepartmentNames($date);
			$this->template->vars('arrayDepartmentNames', $arrayDepartmentNames);
		
			$arrayEmployeeNamesForDepartment = $this->postgreSQL->getEmployeeNamesForDepartment($_GET['departmentId'], $date);
			$this->template->vars('arrayEmployeeNamesForDepartment', $arrayEmployeeNamesForDepartment);
		
			$arrayProjectNamesForDepartment = $this->postgreSQL->getProjectNamesForDepartment($_GET['departmentId'], $date);
			$this->template->vars('arrayProjectNamesForDepartment', $arrayProjectNamesForDepartment);
		
			$this->template->view('department', 'DepartmentLayout');
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
		$this->viewDepartment();
	}
	
	/** Редактирование отдела. */
	function editDepartment(){
		$date = $this->getDate();
		$this->postgreSQL->changeDepartmentName($_GET['editId'], $date, $_GET['newName']);
		$_GET['departmentId'] = $_GET['editId'];
		$_GET['departmentName'] = $_GET['newName'];
		$this->viewDepartment();
	}
	
	/* Действия с сотрудниками */
	/** Добавление сотрудника. */
	function newEmployee(){
		$date = $this->getDate();
		$user=$this->checkLoginLdapForEmployee();
		$this->postgreSQL->newEmployee($date, $user['Login'], $user['Name'],
				$_GET['newDepartmwent']);
		$this->viewDepartment();
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
		$this->viewDepartment();
	}
	
	/** Удаление информации сотрудника. */
	function removeEmployee() {
		$date = $this->getDate();
		$this->postgreSQL->deleteEmployee($date, $_GET['employeeId']);
		$this->viewDepartment();
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
	
	/* Действия с проектами */
	/** Добавление проекта. */
	function newProject(){
		$date = $this->getDate();
		$this->postgreSQL->newProject($date, $_GET['newName'],
				$_GET['newDepartmwent']);
		$this->viewDepartment();
	}
	
	/** Редактирование проекта. */
	function editProject(){
		$date = $this->getDate();
		$idNameDepartment = explode('*-*', $_GET['newDepartmwent']);
		if($idNameDepartment['1']!=null){
			$departmentId=$idNameDepartment['0'];
			$departmentName=$idNameDepartment['1'];
		}else{
			$departmentId=$_GET['newDepartmwent'];
		}
		$this->postgreSQL->changeProjectNameAndDepartmentId($_GET['editId'],
				$date, $_GET['newName'], $departmentId);
		$registry['newIdDepForPro']=$departmentId;
		$registry['newNameDepForPro']=$departmentName;
		$this->viewDepartment();
	}
	
	/** Удаление проекта. */
	function removeProject() {
		$date = $this->getDate();
		$this->postgreSQL->deleteProject($date, $_GET['projectId']);
		$this->viewDepartment();
	}
}
