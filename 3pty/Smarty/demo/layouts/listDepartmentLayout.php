<?php

/** Файл со Смарти переменными и обычными переменными, которые повторяются в каждом Layout. */
require '3pty/Smarty/demo/layouts/SmartyRepeatVariables.php';

/** Переменные для отображения списка отделов. */
{
	$smarty->assign('arrayDepartmentNames', $arrayDepartmentNames);
	$smarty->assign('status1', 'active');	
	$smarty->assign('title', 'Список Отделов');
	$smarty->display($contentPage);
}