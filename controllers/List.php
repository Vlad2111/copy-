<?php
if(isset($_COOKIE[session_name()])) {session_start();}
/*
* Copyright (c) 2016 Tecom LLC
* All rights reserved
*
* Исключительное право (c) 2016 пренадлежит ООО Теком
* Все права защищены
*/
/**
Класс контроллер, списки отделов, сотрудников и проетов.

@author ershov.v
*/
Class Controller_List Extends Controller_Base {

	public $log;
	public $postgreSQL;
	
	/* Отображение списков. */
	/** -->Список отделов. */
	function viewListDepartment() {
		$date = $this->getDate();
		$this->template->vars('date', $date);
		
		$status = $this->checkDataEditingForDate($date);
		$this->template->vars('statusEditingData', $status);
		
		$arrayDepartmentNames = $this->postgreSQL->getDepartmentNames($date);
		$this->template->vars('arrayDepartmentNames', $arrayDepartmentNames);
		
		$this->template->view('listDepartments', 'listDepartmentLayout');
	}
	
	/** -->Список сотрудников. */
	function viewListEmployee() {
		$date = $this->getDate();
		$this->template->vars('date', $date);
		
		$status = $this->checkDataEditingForDate($date);
		$this->template->vars('statusEditingData', $status);
		
		$arrayDepartmentNames = $this->postgreSQL->getDepartmentNames($date);
		$this->template->vars('arrayDepartmentNames', $arrayDepartmentNames);
		
		$arrayEmployeeNames = $this->postgreSQL->getEmployeeNames($date);
		$this->template->vars('arrayEmployeeNames', $arrayEmployeeNames);
		
		$this->template->view('listEmployees', 'listEmployeeLayout');
		
	}
	
	/** -->Список проектов. */
	function viewListProject() {
		$date = $this->getDate();
		$this->template->vars('date', $date);
		
		$status = $this->checkDataEditingForDate($date);
		$this->template->vars('statusEditingData', $status);

		$arrayDepartmentNames = $this->postgreSQL->getDepartmentNames($date);
		$this->template->vars('arrayDepartmentNames', $arrayDepartmentNames);

		$arrayProjectNames = $this->postgreSQL->getProjectNames($date);
		$this->template->vars('arrayProjectNames', $arrayProjectNames);

		$this->template->view('listProjects', 'listProjectLayout');
	}
		
	/** Получение даты. */
	private function getDate() {
		if (($_GET['Month']!=null)AND($_GET['Year']!=null)){
			$date = new DateTime('01.'.$_GET['Month'].'.'.$_GET['Year'], 
					new DateTimeZone('UTC'));
		}else{
			if ($_GET['date']!=null){
				$dayMonthYear = explode('/', $_GET['date']);
				$date = new DateTime('01.'.$dayMonthYear['0'].'.'.$dayMonthYear['2'],
						new DateTimeZone('UTC'));
			}else{
				$date = new DateTime();
				$date->setTimezone(new DateTimeZone('UTC'));
			}
		}
		return $date;
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
		if($_GET['lastPage']=="Department"){
			$this->viewListDepartment();
		}
		if($_GET['lastPage']=="Employee"){
			$this->viewListEmployee();
		}
		if($_GET['lastPage']=="Project"){
			$this->viewListProject();
		}
	}
	
	/**Клонирование информации в новый месяц*/
	function cloneData() {
		if (($_GET['dateFrom']!=null)AND($_GET['dateTo']!=null)){
			$dayMonthYear = explode('/', $_GET['dateFrom']);
			$dateFrom = new DateTime('01.'.$dayMonthYear['0'].'.'.$dayMonthYear['2'],
					new DateTimeZone('UTC'));
					
			$dayMonthYear = explode('/', $_GET['dateTo']);
			$dateTo = new DateTime('01.'.$dayMonthYear['0'].'.'.$dayMonthYear['2'],
					new DateTimeZone('UTC'));
					
			$this->postgreSQL->cloneModelData($dateFrom, $dateTo);
			
			$this->template->vars('dateTo', $dateTo);
			$this->viewListDepartment();
		}
	}
	
	/* Действия с отделами */
	/** -->Добавление отдела. */
	function newDepartment(){
		$date = $this->getDate();
		$this->postgreSQL->newDepartment($date, $_GET['newName']);
		$this->viewListDepartment();
	}
	
	/** -->Редактирование отдела. */
	function editDepartment(){
		$date = $this->getDate();
		$this->postgreSQL->changeDepartmentName($_GET['editId'], $date, $_GET['newName']);
		$this->viewListDepartment();
	}
	
	/** -->Удаление отдела. */
	function removeDepartment() {
		$date = $this->getDate();
		$this->postgreSQL->deleteDepartment($date, $_GET['departmentId']);
		$this->viewListDepartment();
	}
	
	/* Действия с сотрудниками */
	/** -->Добавление сотрудника. */
	function newEmployee(){
		$date = $this->getDate();
		$user = $this->checkLoginLdapForEmployee($_GET['newLogin']);
		$checkUser = $this->getLoginLdapForEmployee($_GET['nameEmployeeS'].' '.$_GET['nameEmployeeF']);
		if($checkUser != $user){
			$user=null;
		}
		if ($user != null){
			if($_GET['nameEmployeeM']!=null){
				$user['Name']=$user['Name'].' '.$_GET['nameEmployeeM'];
			}
			$this->postgreSQL->newEmployee($date, $user['Login'], $user['Name'], $_GET['newDepartment']);
		}
		$this->viewListEmployee();
	}
	
	/** -->Редактирование информации сотрудника. */
	function editEmployee(){
		$date = $this->getDate();
		$user = $this->checkLoginLdapForEmployee($_GET['newLogin']);
		$checkUser = $this->getLoginLdapForEmployee($_GET['nameEmployeeS'].' '.$_GET['nameEmployeeF']);
		if($checkUser != $user){
			$user=null;
		}
		if ($user != null){
			if($_GET['nameEmployeeM']!=null){
				$user['Name']=$user['Name'].' '.$_GET['nameEmployeeM'];
			}
			
			$this->postgreSQL->changeEmployeeInfo($_GET['editId'], $date, $user['Login'], $user['Name'], $_GET['newDepartment']);
		}
		$this->viewListEmployee();
	}
	
	/** -->Удаление информации сотрудника. */
	function removeEmployee() {
		$date = $this->getDate();
		$this->postgreSQL->deleteEmployee($date, $_GET['employeeId']);
		$this->viewListEmployee();
	}
	
	/** Проверка логина сотрудника в LDAP при создании и редактировании. */
	private function checkLoginLdapForEmployee($login) {
		$ldap = new LdapOperations();
		$ldap->connect();
		$arrayLDAPAccountNames = $ldap->getLDAPAccountNamesByPrefix($login);
		if (count($arrayLDAPAccountNames)>1){
			$date = $this->getDate();
			$this->template->vars('date', $date);
			$this->template->vars('arrayLDAPAccountNames', $arrayLDAPAccountNames);
			$this->template->view('selectLoginInLDAP', 'selectLoginInLDAPLayout');
		}else{
			$user['Name'] = $arrayLDAPAccountNames['0']['sn'].' '.$arrayLDAPAccountNames['0']['givenName'];
			$user['Login'] = $arrayLDAPAccountNames['0']['sAMAccountName'];
			return $user;
		}
	}
	
	/** Запрос логина сотрудника из LDAP при создании и редактировании. */
	private function getLoginLdapForEmployee($fullName) {
		$ldap = new LdapOperations();
		$ldap->connect();
		$arrayLDAPAccountNames = $ldap->getLDAPAccountNamesByFullName($fullName);
		if (count($arrayLDAPAccountNames)>1){
			$date = $this->getDate();
			$this->template->vars('date', $date);
			$this->template->vars('arrayLDAPAccountNames', $arrayLDAPAccountNames);
			$this->template->view('selectLoginInLDAP', 'selectLoginInLDAPLayout');
		}else{
			$user['Name'] = $arrayLDAPAccountNames['0']['sn'].' '.$arrayLDAPAccountNames['0']['givenName'];
			$user['Login'] = $arrayLDAPAccountNames['0']['sAMAccountName'];
			return $user;
		}
	}
	
	/* Действия с проектами */
	/** -->Добавление проекта. */
	function newProject(){
		$date = $this->getDate();
		$this->postgreSQL->newProject($date, $_GET['newName'], $_GET['newDepartment']);
		$this->viewListProject();
	}
	
	/** -->Редактирование проекта. */
	function editProject(){
		$date = $this->getDate();
		$this->postgreSQL->changeProjectNameAndDepartmentId($_GET['editId'], $date, $_GET['newName'], $_GET['newDepartment']);
		$this->viewListProject();
	}
	
	/** -->Удаление проекта. */
	function removeProject() {
		$date = $this->getDate();
		$this->postgreSQL->deleteProject($date, $_GET['projectId']);
		$this->viewListProject();
	}
	
}
