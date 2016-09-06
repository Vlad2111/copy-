<?php
/* Smarty version 3.1.28, created on 2016-09-06 10:19:21
  from "/var/www/hr-timetrack-dev/3pty/Smarty/demo/templates/header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57ce6df9eb5182_88214854',
  'file_dependency' => 
  array (
    '7fb2b3d29423f3fb3adbb641346e817efe2bf4dc' => 
    array (
      0 => '/var/www/hr-timetrack-dev/3pty/Smarty/demo/templates/header.tpl',
      1 => 1473070823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ce6df9eb5182_88214854 ($_smarty_tpl) {
?>
			<!-- REQUIRED CSS SCRIPTS -->
			<link rel="stylesheet" href="3pty/AdminLTE-2.3.5/dist/css/skins/_all-skins.min.css">
			<link rel="stylesheet" href="3pty/AdminLTE-2.3.5/bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
			<link rel="stylesheet" href="3pty/AdminLTE-2.3.5/dist/css/AdminLTE.min.css">
			<link rel="stylesheet" href="3pty/AdminLTE-2.3.5/dist/css/skins/skin-blue.min.css">
			<link rel="stylesheet" href="3pty/AdminLTE-2.3.5/plugins/datatables/dataTables.bootstrap.css">
			<link rel="stylesheet" href="3pty/AdminLTE-2.3.5/plugins/datepicker/datepicker3.css">
			<link rel="stylesheet" href="3pty/AdminLTE-2.3.5/plugins/select2/select2.min.css">
			<!-- REQUIRED JS SCRIPTS -->
			<?php echo '<script'; ?>
 src="3pty/AdminLTE-2.3.5/plugins/fastclick/fastclick.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="3pty/AdminLTE-2.3.5/dist/js/demo.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="3pty/AdminLTE-2.3.5/plugins/jQuery/jquery-2.2.3.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="3pty/AdminLTE-2.3.5/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="3pty/AdminLTE-2.3.5/dist/js/app.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="3pty/AdminLTE-2.3.5/plugins/datatables/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="3pty/AdminLTE-2.3.5/plugins/datatables/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="3pty/AdminLTE-2.3.5/plugins/datepicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="3pty/AdminLTE-2.3.5/plugins/select2/select2.full.min.js"><?php echo '</script'; ?>
>
			<header class="main-header">
				<a class="logo">
					<span class="logo-mini"><small>Теком</small></span>
					<span class="logo-lg"><b>Текомыч</b></span>
				</a>
				<nav class="navbar navbar-static-top">
					<a class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<li>
								<a data-toggle="modal" data-target="#dateChoose" class="btn btn-lg text-grey" title="Выбрать Дату"><i class="glyphicon glyphicon-calendar"></i></a>					
							</li>
							<?php if (($_smarty_tpl->tpl_vars['selectedMonth']->value != null) && ($_smarty_tpl->tpl_vars['selectedYearForGet']->value != null)) {?>
							<li>
								<div style="margin-right:100px;">
									<b style="font-size:35px"><?php echo $_smarty_tpl->tpl_vars['selectedMonth']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['selectedYearForGet']->value;?>
</b>
								</div>
							</li>
							<li>
								<a data-toggle="modal" data-target="#changeDataMonthEditing" class="btn btn-lg text-grey" title="Изменить статус редактирования данных для данного месяца">
									<i class="glyphicon glyphicon-refresh"></i>
								</a>
							</li>
							<?php }?>
						</ul>
					</div>
				</nav>
			</header>
			<aside class="main-sidebar">
				<section class="sidebar">
					<ul class="sidebar-menu">		
						<li class="<?php echo $_smarty_tpl->tpl_vars['status1']->value;?>
">
							<a 
								href="/index.php
									?route=List/viewListDepartment
									&nameUser=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>

									&roleUser=<?php echo $_smarty_tpl->tpl_vars['role']->value;?>

									&Month=<?php echo $_smarty_tpl->tpl_vars['selectedMonthForGet']->value;?>

									&Year=<?php echo $_smarty_tpl->tpl_vars['selectedYearForGet']->value;?>

									&headId=<?php echo $_smarty_tpl->tpl_vars['headId']->value;?>

									&roleIdUser=<?php echo $_smarty_tpl->tpl_vars['roleId']->value;?>
">
								<i class="fa fa-th-list text-blue"></i>
								<span>Список отделов</span>
							</a>
						</li>
						<li class="<?php echo $_smarty_tpl->tpl_vars['status2']->value;?>
">
							<a 
								href="/index.php
									?route=List/viewListEmployee
									&nameUser=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>

									&roleUser=<?php echo $_smarty_tpl->tpl_vars['role']->value;?>

									&Month=<?php echo $_smarty_tpl->tpl_vars['selectedMonthForGet']->value;?>

									&Year=<?php echo $_smarty_tpl->tpl_vars['selectedYearForGet']->value;?>

									&headId=<?php echo $_smarty_tpl->tpl_vars['headId']->value;?>

									&roleIdUser=<?php echo $_smarty_tpl->tpl_vars['roleId']->value;?>
">
								<i class="fa fa-th-list text-blue"></i>
								<span>Список сотрудников</span>
							</a>
						</li>
						<li class="<?php echo $_smarty_tpl->tpl_vars['status3']->value;?>
">
							<a 
								href="/index.php
									?route=List/viewListProject
									&nameUser=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>

									&roleUser=<?php echo $_smarty_tpl->tpl_vars['role']->value;?>

									&Month=<?php echo $_smarty_tpl->tpl_vars['selectedMonthForGet']->value;?>

									&Year=<?php echo $_smarty_tpl->tpl_vars['selectedYearForGet']->value;?>

									&headId=<?php echo $_smarty_tpl->tpl_vars['headId']->value;?>

									&roleIdUser=<?php echo $_smarty_tpl->tpl_vars['roleId']->value;?>
">
								<i class="fa fa-th-list text-blue"></i>
								<span>Список проектов</span>
							</a>
						</li>
						<?php if ($_smarty_tpl->tpl_vars['role']->value == "Администратор" || $_smarty_tpl->tpl_vars['role']->value == "Директор Компании" || $_smarty_tpl->tpl_vars['role']->value == "Отдел Кадров") {?>
							<li>
								<a 
									data-toggle="modal" 
									data-target="#cloneInfo" 
									title="Копирование Информации Базы Данных из Одного Месяца в Другой">
									<i class="fa fa-clone text-blue"></i>
									<span>Новый месяц</span>
								</a>
							</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['role']->value == "Администратор" || $_smarty_tpl->tpl_vars['role']->value == "Директор Компании" || $_smarty_tpl->tpl_vars['role']->value == "Отдел Кадров") {?>
							<li>
								<a 
									data-toggle="modal" 
									data-target="#fileReaderXLSX" 
									title="Чтение Excel файла">
									<i class="glyphicon glyphicon-open-file text-blue"></i>
									<span>Загрузить Excel файл</span>
								</a>
							</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['role']->value == "Администратор" || $_smarty_tpl->tpl_vars['role']->value == "Директор Компании") {?>
							<li class="<?php echo $_smarty_tpl->tpl_vars['status4']->value;?>
">
								<a 
									href="/index.php
										?route=Role/viewRole
										&nameUser=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>

										&roleUser=<?php echo $_smarty_tpl->tpl_vars['role']->value;?>

										&Month=<?php echo $_smarty_tpl->tpl_vars['selectedMonthForGet']->value;?>

										&Year=<?php echo $_smarty_tpl->tpl_vars['selectedYearForGet']->value;?>

										&headId=<?php echo $_smarty_tpl->tpl_vars['headId']->value;?>

										&roleIdUser=<?php echo $_smarty_tpl->tpl_vars['roleId']->value;?>
">
									<i class="fa fa-user-secret text-blue"></i>
									<span>Пользователи и Роли</span>
								</a>
							</li>
						<?php }?>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown">
								<i class="glyphicon glyphicon-file text-blue"></i>
								<span>Отчеты</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="#">Список отделов</a></li>
								<li><a href="#">Список сотрудников</a></li>
								<li><a href="#">список проектов</a></li>
							</ul>
						</li>
					</ul>
					<ul class="sidebar-menu" style="position: fixed; bottom:0;">
						<li style="width:230px;">
							<a class="user">
								<i class="glyphicon glyphicon-user text-blue" aria-hidden="true"></i>
								<span>Пользователь: <p><b><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</b></p></span>
							</a>
						</li>
						<li>
							<a class="user">
								<i class="glyphicon glyphicon-briefcase text-blue" aria-hidden="true"></i>
								<span>Роль: <p><b><?php echo $_smarty_tpl->tpl_vars['role']->value;?>
</b></p></span>
							</a>
						</li>
						<li>
							<a class="user" href="/index.php">
								<i class="glyphicon glyphicon-log-out text-blue" aria-hidden="true"></i>
								<span>Выход</span>
							</a>
						</li>
					</ul>
				</section>
			</aside>
			<div class="modal fade" id="dateChoose" tabindex="-1" role="dialog" aria-labelledby="dateChooseLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="z-index:1000;">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="dateChooseLabel">Выбор Даты</h4>
						</div>
						<form action="/index.php" method="get" onsubmit="diactivedate()">			
							<div class="modal-body">
								<div class="form-group">
									<label>Дата:</label>
									<div class="input-group date" style="z-index:2000;">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input name="date" type="text" class="form-control pull-right" id="datepicker" required="required">
									</div>
									<div class="input-group hidden">
										<input name="route" type="hidden" value="List/viewListDepartment">
										<input name="nameUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
										<input name="headId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['headId']->value;?>
">
										<input name="roleIdUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['roleId']->value;?>
">
										<input name="roleUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['role']->value;?>
">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button id="buttonModalFdate" type="button" class="btn btn-default pull-left" data-dismiss="modal" style="width: 200px">Отмена</button>
								<button id="buttonModalSdate" type="submit" class="btn btn-primary" style="width: 200px">Сохранить</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal fade" id="cloneInfo" tabindex="-1" role="dialog" aria-labelledby="cloneInfoLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="z-index:1000;">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="cloneInfoLabel">Копирование Информации из Месяца в Месяц</h4>
						</div>
						<form action="/index.php" method="get" onsubmit="diactivecopy()">			
							<div class="modal-body">
								<div class="form-group">
									<label>Дата Откуда Копируем:</label>
									<div class="input-group date" style="z-index:2000;">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input name="dateFrom" type="text" class="form-control pull-right" id="datepicker1" required="required">
									</div>
									<label>Дата Куда Копируем:</label>
									<div class="input-group date" style="z-index:2000;">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input name="dateTo" type="text" class="form-control pull-right" id="datepicker2" required="required">
									</div>
									<div class="input-group hidden">
										<input name="route" type="hidden" value="List/cloneData">
										<input name="nameUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
										<input name="headId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['headId']->value;?>
">
										<input name="roleIdUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['roleId']->value;?>
">
										<input name="roleUser" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['role']->value;?>
">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button id="buttonModalFcopy" type="button" class="btn btn-default pull-left" data-dismiss="modal" style="width: 200px">Отмена</button>
								<button id="buttonModalScopy" type="submit" class="btn btn-primary" style="width: 200px">Сохранить</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal fade" id="fileReaderXLSX" tabindex="-1" role="dialog" aria-labelledby="fileReaderXLSXLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content" style="z-index:1000;">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="fileReaderXLSXLabel">Загрузка файла</h4>
						</div>
						<form 
							action="/index.php
								?route=SaveXLSX/readerXLSXFile
								&nameUser=<?php echo $_smarty_tpl->tpl_vars['name']->value;?>

								&roleUser=<?php echo $_smarty_tpl->tpl_vars['role']->value;?>

								&Month=<?php echo $_smarty_tpl->tpl_vars['selectedMonthForGet']->value;?>

								&Year=<?php echo $_smarty_tpl->tpl_vars['selectedYearForGet']->value;?>
 
								&headId=<?php echo $_smarty_tpl->tpl_vars['headId']->value;?>

								&roleIdUser=<?php echo $_smarty_tpl->tpl_vars['roleId']->value;?>
"
							role="form" 
							enctype="multipart/form-data" 
							method="post"
							onsubmit="diactivefile()">			
							<div class="modal-body">
								<div class="form-group">
									<label>Файл:</label>
									<input type="file" id="inputFile" name="file" accept=".xlsx, .xls, .csv" required="required">
								</div>
								<div class="form-group">
									<label>Название листа с таблицей распределения времени:</label>
									<input id="nameSheet" name="nameSheet" type="text" class="form-control" required="required">
								</div>
							</div>
							<div class="modal-footer">
								<button id="buttonModalFfile" type="button" class="btn btn-default pull-left" data-dismiss="modal" style="width: 200px">Отмена</button>
								<button id="buttonModalSfile" type="submit" class="btn btn-primary" style="width: 200px">Сохранить</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php echo '<script'; ?>
>
				$(function () {
					$('#datepicker').datepicker({
						autoclose: true
					});
				});
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				$(function () {
					$('#datepicker1').datepicker({
						autoclose: true
					});
				});
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				$(function () {
					$('#datepicker2').datepicker({
						autoclose: true
					});
				});
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				function diactivefile() {
					document.getElementById('buttonModalSfile').disabled = 1;
					document.getElementById('buttonModalFfile').disabled = 1;
					document.getElementById("nameSheet").setAttribute("readonly", "readonly");
				}
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				function diactivecopy() {
					document.getElementById('buttonModalScopy').disabled = 1;
					document.getElementById('buttonModalFcopy').disabled = 1;
				}
			<?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
>
				function diactivedate() {
					document.getElementById('buttonModalSdate').disabled = 1;
					document.getElementById('buttonModalFdate').disabled = 1;
				}
			<?php echo '</script'; ?>
><?php }
}
