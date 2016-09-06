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
Класс контроллер, проверка после авторизации.

@author ershov.v
*/
Class Controller_SaveXLSX Extends Controller_Base {

	public $log;
	public $postgreSQL;
	public $errors;
	public $errorsNum;

	
	function readerXLSXFile() {
		if($this->checkSession() == TRUE){	
			$this->errorsNum = 0;
			require_once '3pty/PHPExcel/Classes/PHPExcel.php';
			$file_type = PHPExcel_IOFactory::identify( $_FILES['file']['tmp_name'] );
			$objReader = PHPExcel_IOFactory::createReader( $file_type );
			$objPHPExcel = $objReader->load( $_FILES['file']['tmp_name'] );
			$sheet = $objPHPExcel->getSheetByName($_POST['nameSheet']);
			$sheet1 = $objPHPExcel->getSheetByName('Список проектов');
			
			$date = $this->getDate( $sheet );
			
			$this->postgreSQL->beginTran();
			$this->columnOfDepartment( $sheet , $date );
			$this->columnOfProject( $sheet1 , $date );
			$this->columnOfEmployee( $sheet , $date );
			$this->columnsOfTimeDistr( $sheet , $date );
			if($this->errorsNum == 0){
				$this->postgreSQL->commitTran();
			$_GET['route']='list/viewListDepartment';
				include 'index.php';
			}else{
				$this->postgreSQL->rollbackTran();
				$_GET['route'] = 'Errors/viewListErrorsXLSX';
				$_GET['errors']= $this->errors;
				include 'index.php';
			}
		}else{
			$_GET['route']='Index';
			include 'index.php';
		}
	}

	/** Проверка сессии. */
	private function checkSession() {
		if($_SESSION['startSESSION'] == 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	/** Чтение дат из файла. */
	private function getDate( $sheet ){
		for ($i = 4; $i < 11; $i++) {
			$date[$i] = $sheet->getCellByColumnAndRow($i, 1)->getValue();
			$date[$i] = PHPExcel_Shared_Date::ExcelToPHPObject($date[$i]);
			$date[$i]->setTimezone(new DateTimeZone('UTC'));
		}
		return $date;
	}
	
	/** Чтение отделов из файла. */
	private function columnOfDepartment( $sheet , $date ){
		for ($i = 2; $i <= $sheet->getHighestRow(); $i++) {
			$departmentName = $sheet->getCellByColumnAndRow(2, $i)->getValue();
			rtrim($departmentName);
			if ($departmentName == null){
				$i = $sheet->getHighestRow();
			}else{
				foreach ($date as $datetime){
					$departmentId = $this->postgreSQL->getDepartmentId($datetime, $departmentName);
					if ($departmentId == null){
						$this->postgreSQL->newDepartment($datetime, $departmentName);
					}
				}
			}
		}
	}
	
	/** Чтение проектов из файла. */
	private function columnOfProject( $sheet , $date ){
		for ($i = 2; $i <= $sheet->getHighestRow(); $i++) {
			$projectName = $sheet->getCellByColumnAndRow(1, $i)->getValue();
			rtrim($projectName);
			$departmentName = $sheet->getCellByColumnAndRow(2, $i)->getValue();
			rtrim($departmentName);
			foreach ($date as $datetime){
				$departmentId = $this->postgreSQL->getDepartmentId($datetime, $departmentName);
				if ($departmentId == null){
					$this->postgreSQL->newDepartment($datetime, $departmentName);
					$departmentId = $this->postgreSQL->getDepartmentId($datetime, $departmentName);
				}
				$projectId = $this->postgreSQL->getProjectId($datetime, $projectName);
				if ($projectId == null){
					$this->postgreSQL->newProject($datetime, $projectName, $departmentId);
				}
			}
		}
	}
	
	/** Чтение сотрудников из файла. */
	private function columnOfEmployee( $sheet , $date ){
		for ($i = 2; $i <= $sheet->getHighestRow(); $i++) {
			$departmentName = $sheet->getCellByColumnAndRow(2, $i)->getValue();
			rtrim($departmentName);
			$employeeName = $sheet->getCellByColumnAndRow(1, $i)->getValue();
			rtrim($employeeName);
			if (($departmentName == null)AND($employeeName == null)){
				$i = $sheet->getHighestRow();
			}else{
				foreach ($date as $key=>$datetime){
					$time = $sheet->getCellByColumnAndRow($key, $i)->getValue();
					rtrim($time);
					if($time != null){
						$departmentId = $this->postgreSQL->getDepartmentId($datetime, $departmentName);
						$employeeIdAndLogin = $this->postgreSQL->getEmployeeId($datetime, $employeeName);
						if ($employeeIdAndLogin['employee_id'] == null){
							$ldap = new LdapOperations();
							$ldap->connect();
							$login = $ldap->getLDAPAccountNamesByFullName($employeeName);
							$this->postgreSQL->newEmployee($datetime, $login[0]['sAMAccountName'], $employeeName, $departmentId);
						}
					}
				}
			}
		}
	}
	
	/** Чтение распределения времени из файла. */
	private function columnsOfTimeDistr( $sheet , $date ){
		foreach ($date as $key=>$datetime){
			for ($i = 2; $i <= $sheet->getHighestRow(); $i++) {
				$employeeName = $sheet->getCellByColumnAndRow(1, $i)->getValue();
				rtrim($employeeName);
				$projectName = $sheet->getCellByColumnAndRow(3, $i)->getValue();
				rtrim($projectName);
				$time = $sheet->getCellByColumnAndRow($key, $i)->getValue();
				rtrim($time);
				if (($employeeName == null)AND($projectName == null)){
					$i = $sheet->getHighestRow();
				}else{
					if ($time != null){
						$time = $time*100;
						$employeeIdAndLogin = $this->postgreSQL->getEmployeeId($datetime, $employeeName);
						$departmentName = $sheet->getCellByColumnAndRow(2, $i)->getValue();
						rtrim($departmentName);
						$departmentId = $this->postgreSQL->getDepartmentId($datetime, $departmentName);
						$projectId = $this->postgreSQL->getProjectId($datetime, $projectName);
						if ($projectId==null){
							$this->postgreSQL->newProject($datetime, $projectName, $departmentId);
							$projectId = $this->postgreSQL->getProjectId($datetime, $projectName);
						}
						try {
							$this->postgreSQL->saveTran();
							$this->postgreSQL->newTimeDistribution($datetime, $projectId, $employeeIdAndLogin['employee_id'], $time);
						} 
						catch (Exception $exc) {
							$this->postgreSQL->rollbackSaveTran();
							$this->errors[$this->errorsNum]['comment']="Ошибка при записи нового распределения времени.";
							$this->errors[$this->errorsNum]['info']['date']=$datetime->format('F');
							$this->errors[$this->errorsNum]['info']['nameEmp']=$employeeName;
							$this->errors[$this->errorsNum]['info']['namePro']=$projectName;
							$this->errors[$this->errorsNum]['info']['time']=$time;
							$this->errors[$this->errorsNum]['message'] = $exc->getMessage();
							$this->errorsNum=$this->errorsNum+1;
						}
					}
				}
			}
		}
	}
}
