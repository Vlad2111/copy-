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
Класс контроллер, информация о проекте.

@author ershov.v
*/
Class Controller_Project Extends Controller_Base {

	public $log;
	public $postgreSQL;
	
	/** Отображение списка сотрудников и времени проета. */
	function viewProject() {
		if($this->checkSession() == TRUE){
			$date = $this->getDate();
			$this->template->vars('date', $date);
		
			$status = $this->checkDataEditingForDate($date);
			$this->template->vars('statusEditingData', $status);
			
			$this->template->vars('projectId', $_GET['projectId']);
			$this->template->vars('projectName', $_GET['projectName']);
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
		
			$arrayEmployeeNamesForDepartment = $this->postgreSQL->getEmployeeNamesForDepartment($_GET['departmentId'], $date);
			$this->template->vars('arrayEmployeeNamesForDepartment', $arrayEmployeeNamesForDepartment);
		
			$arrayEmployeeNamesNotForDepartment = $this->postgreSQL->getEmployeeNamesNotForDepartment($_GET['departmentId'], $date);
			$this->template->vars('arrayEmployeeNamesNotForDepartment', $arrayEmployeeNamesNotForDepartment);
		
			$arrayEployeeNamesAndPercentsForProject = $this->postgreSQL->getEployeeNamesAndPercentsForProject($_GET['projectId'], $date);
			$this->template->vars('arrayEployeeNamesAndPercentsForProject', $arrayEployeeNamesAndPercentsForProject);
		
			$this->template->view('project', 'ProjectLayout');
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
		$this->viewProject();
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
				
		$_GET['projectId'] = $_GET['editId'];
		$_GET['projectName'] = $_GET['newName'];
		$_GET['departmentId'] = $departmentId;
		$_GET['departmentName'] = $departmentName;
		
		$this->viewProject();
	}
		
	/* Действия с процентами */
	/** ->Добавление времени. */
	function newPercent(){
		$date = $this->getDate();
		$this->postgreSQL->newTimeDistribution($date, $_GET['projectId'],
				$_GET['employeeId'], $_GET['newTime']);
		$this->viewProject();
	}
		
	/** -->Редактирование времени. */
	function editPercent(){
		$date = $this->getDate();
		$this->postgreSQL->changeEployeeTimeForProject($_GET['employeeId'], $_GET['projectId'],
				$date, $_GET['newTime']);
		$this->viewProject();
	}
		
	/** -->Удаление времени. */
	function removePercent() {
		$date = $this->getDate();
		$this->postgreSQL->deleteTimeDistribution($date, $_GET['projectId'], $_GET['employeeId']);
		$this->viewProject();
	}
}
