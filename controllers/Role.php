<?php
/*
* Copyright (c) 2016 Tecom LLC
* All rights reserved
*
* Исключительное право (c) 2016 пренадлежит ООО Теком
* Все права защищены
*/
/**
Класс контроллер, список.

@author ershov.v
*/
Class Controller_Role Extends Controller_Base {

	public $layouts = "index";
	public $log;

	function index($registry) {
		if(($registry['GET']['nameUser']!=null)AND($registry['GET']['roleUser']!=null)){
			$registry['roleName']=$registry['GET']['roleUser'];
			$registry['userName']=$registry['GET']['nameUser'];
		}
		if(($registry['roleName']!=null)AND($registry['userName']!=null)){
			if (($registry['GET']['Month']!=null)AND($registry['GET']['Year']!=null)){
				$registry['date'] = new DateTime('01.'.$registry['GET']['Month'].'.'.$registry['GET']['Year'], new DateTimeZone('UTC'));
			}else{
				if ($registry['GET']['date']!=null){
					$dayMonthYear = explode('/', $registry['GET']['date']);
					$registry['date'] = new DateTime('01.'.$dayMonthYear['0'].'.'.$dayMonthYear['2'], new DateTimeZone('UTC'));
				}else{
					$registry['date'] = new DateTime();
				}
			}
			if($registry['date']!=null){
				$model = new Model_PostgreSQLOperations();
				$model->connect();
				if($registry['GET']['action']=='create'){
				
				}
				if($registry['GET']['action']=='edit'){
				
				}
				if($registry['GET']['action']=='remove'){
				
				}
				$this->template->vars('rows', $rows);
				$this->template->view('Role');
			}
		}
	}
}