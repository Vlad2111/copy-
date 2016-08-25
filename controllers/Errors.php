<?php
/*
* Copyright (c) 2016 Tecom LLC
* All rights reserved
*
* Исключительное право (c) 2016 пренадлежит ООО Теком
* Все права защищены
*/
/**
Класс контроллер, Ошибки.

@author ershov.v
*/
Class Controller_Errors Extends Controller_Base {

	
	/** Отображение списка XLSX ошибок . */
	function viewListErrorsXLSX() {
		$date = $this->getDate();
		$this->template->vars('errors', $_GET['errors']);
		
		$this->template->vars('date', $date);
		$this->template->view('Errors', 'ErrorsLayout');
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
			}
		}
		return $date;
	}
}