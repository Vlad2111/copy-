<?php
/* Smarty version 3.1.28, created on 2016-09-05 16:19:36
  from "/var/www/hr-timetrack-dev/3pty/Smarty/demo/templates/role.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57cd70e8844ff2_36177368',
  'file_dependency' => 
  array (
    '1bc33036c702fae6202c0d6dd0b2890efc1eaed3' => 
    array (
      0 => '/var/www/hr-timetrack-dev/3pty/Smarty/demo/templates/role.tpl',
      1 => 1473070823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:3pty/Smarty/demo/templates/header.tpl' => 1,
  ),
),false)) {
function content_57cd70e8844ff2_36177368 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Tecomgroup | <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:3pty/Smarty/demo/templates/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<div class="content-wrapper">
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title" style="font-size:23px">Пользователи и Роли</h3>
								</div>
								<div class="box-body">
									<table id="role" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Пользователь</th>
												<th>Отдел</th>
												<th>Роль</th>
												<th style="width: 18px"></th>
												<th style="width: 18px"></th>
											</tr>
										</thead>
										<tbody>
										<?php if ($_smarty_tpl->tpl_vars['arrayEmployeeRoleNamesAndId']->value != null) {?>
										<?php
$_from = $_smarty_tpl->tpl_vars['arrayEmployeeRoleNamesAndId']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_foo_0_saved_item = isset($_smarty_tpl->tpl_vars['foo']) ? $_smarty_tpl->tpl_vars['foo'] : false;
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable();
$__foreach_foo_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_foo_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$__foreach_foo_0_saved_local_item = $_smarty_tpl->tpl_vars['foo'];
?>
											
											<tr>
												<td><?php echo $_smarty_tpl->tpl_vars['foo']->value['user_name'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['foo']->value['department_name'];?>
</td>
												<?php if ($_smarty_tpl->tpl_vars['foo']->value['head']['department_id'] != null) {?>
												<td><?php echo $_smarty_tpl->tpl_vars['foo']->value['role_name'];?>
: <?php echo $_smarty_tpl->tpl_vars['foo']->value['head']['department_name'];?>
</td>
												<td>
													<a 
														type="button" 
														class="btn btn-md" 
														data-toggle="modal" 
														data-lastroleid="<?php echo $_smarty_tpl->tpl_vars['foo']->value['role_id'];?>
" 
														data-lastheadid="<?php echo $_smarty_tpl->tpl_vars['foo']->value['head']['department_id'];?>
" 
														data-countselectrole="<?php echo $_smarty_tpl->tpl_vars['countArrayRoleDefForSelect']->value;?>
" 
														data-countselectdep="<?php echo $_smarty_tpl->tpl_vars['countArrayDepartmentNamesForSelect']->value;?>
"
														data-employeeid="<?php echo $_smarty_tpl->tpl_vars['foo']->value['employee_id'];?>
" 
														data-employeename="<?php echo $_smarty_tpl->tpl_vars['foo']->value['user_name'];?>
" 
														data-target="#RoleModal" 
														title="Редактировать Роль Сотрудника">
														<i class="glyphicon glyphicon-pencil"></i>
													</a>
												</td>
												<td>
													<a 
														type="button" 
														class="btn btn-md" 
														data-toggle="modal"  
														data-employeeid="<?php echo $_smarty_tpl->tpl_vars['foo']->value['employee_id'];?>
" 
														data-employeename="<?php echo $_smarty_tpl->tpl_vars['foo']->value['user_name'];?>
" 
														data-rolename="<?php echo $_smarty_tpl->tpl_vars['foo']->value['role_name'];?>
" 
														data-target="#removeModal"
														data-lastheadid="<?php echo $_smarty_tpl->tpl_vars['foo']->value['head']['department_id'];?>
" 
														title="Удалить Роль Сотрудника">
														<i class="glyphicon glyphicon-trash"></i>
													</a>
												</td>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['foo']->value['head']['department_name'] == null) {?>
												<td><?php echo $_smarty_tpl->tpl_vars['foo']->value['role_name'];?>
</td>
												<td>
													<a 
														type="button" 
														class="btn btn-md" 
														data-toggle="modal" 
														data-lastroleid="<?php echo $_smarty_tpl->tpl_vars['foo']->value['role_id'];?>
" 
														data-countselectrole="<?php echo $_smarty_tpl->tpl_vars['countArrayRoleDefForSelect']->value;?>
" 
														data-employeeid="<?php echo $_smarty_tpl->tpl_vars['foo']->value['employee_id'];?>
" 
														data-employeename="<?php echo $_smarty_tpl->tpl_vars['foo']->value['user_name'];?>
" 
														data-target="#RoleModal" 
														title="Редактировать Роль Сотрудника">
														<i class="glyphicon glyphicon-pencil"></i>
													</a>
												</td>
												<td>
													<a 
														type="button" 
														class="btn btn-md" 
														data-toggle="modal"  
														data-employeeid="<?php echo $_smarty_tpl->tpl_vars['foo']->value['employee_id'];?>
" 
														data-employeename="<?php echo $_smarty_tpl->tpl_vars['foo']->value['user_name'];?>
" 
														data-rolename="<?php echo $_smarty_tpl->tpl_vars['foo']->value['role_name'];?>
" 
														data-target="#removeModal" 
														title="Удалить Роль Сотрудника">
														<i class="glyphicon glyphicon-trash"></i>
													</a>
												</td>
												<?php }?>
											</tr>
										<?php
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_0_saved_local_item;
}
}
if ($__foreach_foo_0_saved_item) {
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_0_saved_item;
}
?>
										<?php }?>
										</tbody>
									</table>
									<a 
										type="button" 
										data-toggle="modal" 
										data-action="New" 
										data-countselectrole="<?php echo $_smarty_tpl->tpl_vars['countArrayRoleDefForSelect']->value;?>
" 
										data-target="#RoleModal" 
										class="btn btn-md" 
										title="Добавить Роль Пользователя">
										<i class="glyphicon glyphicon-plus"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="RoleModal" role="dialog" aria-labelledby="RoleModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="RoleModalLabel"></h4>
								</div>
								<form action="/index.php" method="get" onsubmit="diactive()">
									<div class="modal-body">
										<div class="form-group" id="employee"></div>
										<div class="form-group">
											<label>Роль:</label>
											<select 
												id="selectIdRole" 
												name="roleId" 
												class="form-control select2" 
												style="width: 100%;"
												onChange="headDepRole()"
												required="required">
												<?php
$_from = $_smarty_tpl->tpl_vars['arrayRoleDefForSelect']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_foo_1_saved_item = isset($_smarty_tpl->tpl_vars['foo']) ? $_smarty_tpl->tpl_vars['foo'] : false;
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable();
$__foreach_foo_1_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_foo_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$__foreach_foo_1_saved_local_item = $_smarty_tpl->tpl_vars['foo'];
?>
												
												<option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['role_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value['role_name'];?>
</option>
												<?php
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_1_saved_local_item;
}
}
if ($__foreach_foo_1_saved_item) {
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_1_saved_item;
}
?>
											</select>
										</div>
										<div class="form-group" id="department"></div>
										<div class="form-group" id="headDepartment"></div>
									</div>
									<div class="modal-footer">
										<div class="input-group hidden">
											<input id="route" name="route" type="hidden" >
											<input id="lastHeadId" name="lastHeadDepartmentId" type="hidden">
											<input name="nameUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
											<input name="roleUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['role']->value;?>
">
											<input name="headId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['headId']->value;?>
">
											<input name="Month" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['selectedMonthForGet']->value;?>
">
											<input name="Year" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['selectedYearForGet']->value;?>
">
										</div>
										<button id="buttonModalF" type="button" style="width: 200px" class="btn btn-default pull-left" data-dismiss="modal" style="width: 200px">Отмена</button>
										<button id="buttonModalS" type="submit" style="width: 200px" class="btn btn-primary" style="width: 200px">Сохранить</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" style="margin: 0 auto;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="removeModalLabel"></h4>
								</div>							
								<form action="/index.php" method="get" onsubmit="diactiveRemove()">
									<div class="modal-body">
									</div>
									<div class="modal-footer">
										<div class="input-group hidden">
											<input name="route" type="hidden" value="Role/removeRole">
											<input id="employeeId" name="employeeId" type="hidden">
											<input id="lastHeadId" name="lastHeadDepartmentId" type="hidden">
											<input name="nameUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
											<input name="roleUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['role']->value;?>
">
											<input name="Month" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['selectedMonthForGet']->value;?>
">
											<input name="Year" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['selectedYearForGet']->value;?>
">
											<input name="roleIdUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['roleId']->value;?>
">
											<input name="headId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['headId']->value;?>
">
										</div>
										<button id="buttonModalFRemove" type="button" class="btn btn-default pull-left" data-dismiss="modal" style="width: 200px">Отмена</button>
										<button id="buttonModalSRemove" type="submit" class="btn btn-primary" style="width: 200px">Да</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</section>
			</div>
			<footer class="main-footer">
				<div class="pull-right hidden-xs">
				</div>
			</footer>
			<?php echo '<script'; ?>
>
				$('#RoleModal').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget);
					var modal = $(this);
					var lastRoleId = button.data('lastroleid');
					var lastHeadId = button.data('lastheadid');
					var employeeName = button.data('employeename');
					var employeeId = button.data('employeeid');
					var countSelectRole = button.data('countselectrole');
					var countSelectDep = button.data('countselectdep');
					if (lastRoleId == null){
						$('#department').html('');
						modal.find('.modal-title').text('Новая Роль Пользователя');
						document.getElementById('route').value = 'Role/newRole';
						document.getElementById('lastHeadId').value = null;
						$('#employee').html('<label>Пользователь:<\/label><select name="employeeId" class="form-control select2" id="selectIdEmp" style="width: 100%;" required="required"><?php
$_from = $_smarty_tpl->tpl_vars['arrayEmployeeNamesForSelect']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_foo_2_saved_item = isset($_smarty_tpl->tpl_vars['foo']) ? $_smarty_tpl->tpl_vars['foo'] : false;
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable();
$__foreach_foo_2_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_foo_2_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$__foreach_foo_2_saved_local_item = $_smarty_tpl->tpl_vars['foo'];
?><option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['employee_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value['user_name'];?>
</option><?php
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_2_saved_local_item;
}
}
if ($__foreach_foo_2_saved_item) {
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_2_saved_item;
}
?></select>'); 
						var n = document.getElementById('selectIdEmp').options.selectedIndex;
						if (n!=null){
							document.getElementById('selectIdEmp').options[n].selected=false;
						}
						for (var i = 0; i < countSelectRole; i++) {
							document.getElementById('selectIdRole').options[i].selected=false;
						}
					}else{
						modal.find('.modal-title').text('Редактировать Роль Пользоателя');
						document.getElementById('route').value = 'Role/editRole';
						$('#employee').html('<label>Пользователь:<\/label><input type="text" class="form-control" id="employeeName" disabled><input type="hidden" class="form-control" name="employeeId" id="employeeId" value="">'); 
						document.getElementById('employeeName').value = employeeName;
						if(lastHeadId!=null){
							document.getElementById('lastHeadId').value = lastHeadId;
							$('#department').html('<label>Отдел:<\/label><select name="headDepartmentId" class="form-control select2" id="selectIdHead" style="width: 100%;" required="required"><?php
$_from = $_smarty_tpl->tpl_vars['arrayDepartmentNamesForSelect']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_foo_3_saved_item = isset($_smarty_tpl->tpl_vars['foo']) ? $_smarty_tpl->tpl_vars['foo'] : false;
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable();
$__foreach_foo_3_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_foo_3_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$__foreach_foo_3_saved_local_item = $_smarty_tpl->tpl_vars['foo'];
?><option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['department_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value['department_name'];?>
</option><?php
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_3_saved_local_item;
}
}
if ($__foreach_foo_3_saved_item) {
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_3_saved_item;
}
?></select>'); 
							for (var i = 0; i < countSelectDep; i++) {
							var val = document.getElementById('selectIdHead').options[i].value;
								if (val == lastHeadId){
									document.getElementById('selectIdHead').options[i].selected=true;
								}else{
									document.getElementById('selectIdHead').options[i].selected=false;
								}
							}
						}else{
							document.getElementById('lastHeadId').value = null;
							$('#department').html('');
						}
						document.getElementById('employeeId').value = employeeId;
						for (var i = 0; i < countSelectRole; i++) {
						var val = document.getElementById('selectIdRole').options[i].value;
							if (val == lastRoleId){
								document.getElementById('selectIdRole').options[i].selected=true;
							}else{
								document.getElementById('selectIdRole').options[i].selected=false;
							}
						}
					}
					$(function () {
						$(".select2").select2({
						modal: true,
						placeholder: "Выбирете....",
						allowClear: true
						});
					});
				});
				
				function headDepRole() {
					var n = document.getElementById('selectIdRole').options.selectedIndex;
					var val = document.getElementById('selectIdRole').options[n].value;
					if (val == '1'){
						$('#department').html('<label>Отдел:<\/label><select name="headDepartmentId" class="form-control select2" id="selectIdHead" style="width: 100%;" required="required"><?php
$_from = $_smarty_tpl->tpl_vars['arrayDepartmentNamesForSelect']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_foo_4_saved_item = isset($_smarty_tpl->tpl_vars['foo']) ? $_smarty_tpl->tpl_vars['foo'] : false;
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable();
$__foreach_foo_4_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_foo_4_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$__foreach_foo_4_saved_local_item = $_smarty_tpl->tpl_vars['foo'];
?><option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['department_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value['department_name'];?>
</option><?php
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_4_saved_local_item;
}
}
if ($__foreach_foo_4_saved_item) {
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_4_saved_item;
}
?></select>'); 
					}else{
						$('#department').html('');
					}
					$(function () {
						$(".select2").select2({
						modal: true,
						placeholder: "Выбирете....",
						allowClear: true
						});
					});
				}
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				function diactive() {
					document.getElementById('buttonModalS').disabled = 1;
					document.getElementById('buttonModalF').disabled = 1;
				}
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				$('#removeModal').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget);
					var modal = $(this);
					var employeeId = button.data('employeeid');
					var employeeName = button.data('employeename');
					var lastHeadId = button.data('lastheadid');
					var roleName = button.data('rolename');
					modal.find('.modal-title').html('Вы уверены, что хотите удалить данные роли сотрудника: <u><b>'+employeeName+'</u></b>. Роль: <u><b>'+roleName+'</u></b>');
					document.getElementById('employeeId').value = employeeId;
					if(lastHeadId!=null){
						document.getElementById('lastHeadId').value = lastHeadId;
					}else{
						document.getElementById('lastHeadId').value = null;
					}
				});
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				function diactiveRemove() {
					document.getElementById('buttonModalSRemove').disabled = 1;
					document.getElementById('buttonModalFRemove').disabled = 1;
				}
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				$(function () {
					$('#role').DataTable({
						"paging": true,
						"lengthChange": true,
						"searching": true,
						"ordering": true,
						"info": true,
						"autoWidth": true,
						"language": {
							"lengthMenu": "Показать _MENU_ элементов",
							"zeroRecords": "Ничего не найдено",
							"info": "С _START_ по _END_ из _TOTAL_",
							"infoEmpty": "Нет доступных данных",
							"infoFiltered": "(Отфильтровано из _MAX_ записей)",
							"paginate": {
								"first":"Первый",
								"last": "Последний",
								"next": "Следующая",
								"previous": "Предыдущая"
								},
							"loadingRecords": "Загрузка...",
							"processing": "Обработка...",
							"search": "Поиск:"
						}
					});
				});
			<?php echo '</script'; ?>
>
		</div>
	</body>
</html><?php }
}
