<?php
/* Smarty version 3.1.28, created on 2016-09-06 10:19:21
  from "/var/www/hr-timetrack-dev/3pty/Smarty/demo/templates/listDepartments.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57ce6df9df99e8_77230262',
  'file_dependency' => 
  array (
    '3cca3bc80009b6a71068869338a6e0d3e70d2ca5' => 
    array (
      0 => '/var/www/hr-timetrack-dev/3pty/Smarty/demo/templates/listDepartments.tpl',
      1 => 1473070823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:3pty/Smarty/demo/templates/header.tpl' => 1,
  ),
),false)) {
function content_57ce6df9df99e8_77230262 ($_smarty_tpl) {
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
						<?php if ($_smarty_tpl->tpl_vars['statusEditing']->value != null) {?>
						<?php echo $_smarty_tpl->tpl_vars['statusEditing']->value;?>

						<?php }?>
							<div class="box">
								<div class="box-header">
									<h3 class="box-title" style="font-size:23px">Список Отделов</h3>	
								</div>
								<div class="box-body">
									<table id="department" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Название</th>
												<th style="width: 18px"></th>
												<th style="width: 18px"></th>
											</tr>
										</thead>
										<tbody>
										<?php if ($_smarty_tpl->tpl_vars['arrayDepartmentNames']->value != null) {?>
										<?php
$_from = $_smarty_tpl->tpl_vars['arrayDepartmentNames']->value;
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
												<td>
													<a 
														href="/index.php
															?route=Department/viewDepartment
															&departmentId=<?php echo $_smarty_tpl->tpl_vars['foo']->value['department_id'];?>

															&departmentName=<?php echo $_smarty_tpl->tpl_vars['foo']->value['department_name'];?>

															&nameUser=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>

															&roleUser=<?php echo $_smarty_tpl->tpl_vars['role']->value;?>

															&Month=<?php echo $_smarty_tpl->tpl_vars['selectedMonthForGet']->value;?>

															&Year=<?php echo $_smarty_tpl->tpl_vars['selectedYearForGet']->value;?>

															&headId=<?php echo $_smarty_tpl->tpl_vars['headId']->value;?>

															&roleIdUser=<?php echo $_smarty_tpl->tpl_vars['roleId']->value;?>
">
													<?php echo $_smarty_tpl->tpl_vars['foo']->value['department_name'];?>

													</a>
												</td>
												<td>
													<?php if ($_smarty_tpl->tpl_vars['status']->value == FALSE) {?>
													<a 
														class="btn btn-md" 
														type="button" 
														<?php if ($_smarty_tpl->tpl_vars['access']->value == null) {?>
														data-toggle="modal" 
														data-lastname="<?php echo $_smarty_tpl->tpl_vars['foo']->value['department_name'];?>
" 
														data-editid="<?php echo $_smarty_tpl->tpl_vars['foo']->value['department_id'];?>
" 
														data-target="#departmentModal" 
														<?php }?>
														title="Редактировать Данные Отдела"
														<?php echo $_smarty_tpl->tpl_vars['access']->value;?>
>
														<i class="glyphicon glyphicon-pencil"></i>
													</a>
													<?php }?>
												</td>
												<td>
													<?php if ($_smarty_tpl->tpl_vars['status']->value == FALSE) {?>
													<a 
														type="button" 
														class="btn btn-md" 
														<?php if ($_smarty_tpl->tpl_vars['access']->value == null) {?>
														data-toggle="modal" 
														data-departmentid="<?php echo $_smarty_tpl->tpl_vars['foo']->value['department_id'];?>
" 
														data-departmentname="<?php echo $_smarty_tpl->tpl_vars['foo']->value['department_name'];?>
" 
														data-target="#removeModal" 
														<?php }?>
														title="Удалить Данные Отдела"
														<?php echo $_smarty_tpl->tpl_vars['access']->value;?>
>
														<i class="glyphicon glyphicon-trash"></i>
													</a>
													<?php }?>
												</td>
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
									<?php if ($_smarty_tpl->tpl_vars['status']->value == FALSE) {?>
									<a 
										type="button" 
										class="btn btn-md" 
										<?php if ($_smarty_tpl->tpl_vars['access']->value == null) {?>
										data-toggle="modal" 
										data-target="#departmentModal" 
										<?php }?>
										title="Добавить Отдел"
										<?php echo $_smarty_tpl->tpl_vars['access']->value;?>
>
										<i class="glyphicon glyphicon-plus"></i>
									</a>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="departmentModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="departmentModalLabel"></h4>
								</div>
								<form action="/index.php" method="get" onsubmit="diactive()">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label">Название:</label>
											<input 
												id="nameDepartment" 
												name="newName" 
												type="text" 
												class="form-control" 
												required="required">
										</div>
									</div>
									<div class="modal-footer">
										<div class="input-group hidden">
											<input id="route" name="route" type="hidden">
											<input id="editId" name="editId" type="hidden">
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
											<input name="roleUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['role']->value;?>
">
										</div>
										<button id="buttonModalF" type="button" class="btn btn-default pull-left" data-dismiss="modal" style="width: 200px">Отмена</button>
										<button id="buttonModalS" type="submit" class="btn btn-primary" style="width: 200px">Сохранить</button>
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
											<input name="route" type="hidden" value="List/removeDepartment">
											<input id="departmentId" name="departmentId" type="hidden">
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
					<div class="modal fade" id="changeDataMonthEditing" tabindex="-1" role="dialog" style="margin: 0 auto;">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title" id="changeDataMonthEditingLabel">Вы уверены что хотите 
										<?php if ($_smarty_tpl->tpl_vars['statusEditing']->value == null) {?>
											заблокировать
										<?php }?>
										<?php if ($_smarty_tpl->tpl_vars['statusEditing']->value != null) {?>
											разблокировать
										<?php }?>
										 данные месяца <b>(<?php echo $_smarty_tpl->tpl_vars['selectedMonth']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['selectedYearForGet']->value;?>
)</b> для редактирования.
									</h4>
								</div>							
								<form action="/index.php" method="get" onsubmit="diactiveChangeDataMonthEditing()">
									<div class="modal-body">
									</div>
									<div class="modal-footer">
										<div class="input-group hidden">
											<input name="route" type="hidden" value="List/changeDataStatusForEditing">
											<input name="lastStatus" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['status']->value;?>
">
											<input name="lastPage" type="hidden" value="Department">
											<input name="nameUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
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
										<button id="buttonModalFData" type="button" class="btn btn-default pull-left" data-dismiss="modal" style="width: 200px">Отмена</button>
										<button id="buttonModalSData" type="submit" class="btn btn-primary" style="width: 200px">Да</button>
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
				$('#departmentModal').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget);
					var modal = $(this);
					var lastName = button.data('lastname');
					var editId = button.data('editid');
					if (editId != null){
						modal.find('.modal-title').text('Редактировать Данные Отдела');
						document.getElementById('route').value = 'List/editDepartment';
						document.getElementById('nameDepartment').value = lastName;
						document.getElementById('editId').value = editId;
					}else{
						modal.find('.modal-title').text('Новый Отдел');
						document.getElementById('route').value = 'List/newDepartment';
						document.getElementById('nameDepartment').value = null;
						document.getElementById('editId').value = null;
					}
				});
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				function diactive() {
					document.getElementById('buttonModalS').disabled = 1;
					document.getElementById('buttonModalF').disabled = 1;
					document.getElementById("nameDepartment").setAttribute("readonly", "readonly");
				}
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				$('#removeModal').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget);
					var modal = $(this);
					var departmentId = button.data('departmentid');
					var departmentName = button.data('departmentname');
					modal.find('.modal-title').html('Вы уверены, что хотите удалить данные отдела: <u><b>'+departmentName+'</b></u>');
					document.getElementById('departmentId').value = departmentId;
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
				function diactiveChangeDataMonthEditing() {
					document.getElementById('buttonModalSData').disabled = 1;
					document.getElementById('buttonModalFData').disabled = 1;
				}
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				$(function () {
					$('#department').DataTable({
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
</html>
<?php }
}
