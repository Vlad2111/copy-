<?php

/** Файл со Смарти переменными и обычными переменными повторяющиеся в каждом Layout. */
require '3pty/Smarty/demo/layouts/SmartyRepeatVariables.php';

/** Переменные для доступа к функционалу ролей. */
{
	if($_GET['roleIdUser']=='0'){
		$smarty->assign('access', 'disabled');
	}
	if($_GET['roleIdUser']=='1'){
		$smarty->assign('access', 'disabled');
	}
	if($_GET['roleIdUser']=='2'){
		$smarty->assign('access', 'disabled');
	}
	if($_GET['roleIdUser']=='3'){}
	if($_GET['roleIdUser']=='4'){}
}

/** Переменные для отображения информации о проекте. */
{
	$smarty->assign('projectId', $projectId);
	$smarty->assign('projectName', $projectName);
	$smarty->assign('departmentId', $departmentId);
	$smarty->assign('departmentName', $departmentName);
	
	$smarty->assign('arrayEployeeNamesAndPercentsForProject', $arrayEployeeNamesAndPercentsForProject);
	
	$smarty->assign('arrayDepartmentNamesForSelect', $arrayDepartmentNames);
	$smarty->assign('countArrayDepartmentNamesForSelect', count($arrayDepartmentNames));
	$smarty->assign('arrayEmployeeNamesForDepartmentForSelect', $arrayEmployeeNamesForDepartment);
	$smarty->assign('arrayEmployeeNamesNotForDepartmentForSelect', $arrayEmployeeNamesNotForDepartment);
	$smarty->assign('countArrayEmployeeNamesForDepartmentForSelect', count($arrayEmployeeNamesForDepartment)+count($arrayEmployeeNamesNotForDepartment));
	
	$smarty->assign('title', 'Проект: '. $projectName);
	$smarty->display($contentPage);
}