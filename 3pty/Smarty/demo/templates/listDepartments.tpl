﻿<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Tecomgroup | {$title}</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			{include file='3pty/Smarty/demo/templates/header.tpl'}
			<div class="content-wrapper">
				<section class="content">
					<div class="row">
						<div class="col-xs-12">
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
										{if $arrayDepartmentNames!=null}
										{foreach from=$arrayDepartmentNames item=foo}
									
											<tr>
												<td>
													<a 
														href="/index.php
															?route=department/viewDepartment
															&departmentId={$foo.department_id}
															&departmentName={$foo.department_name}
															&nameUser={$name}
															&roleUser={$role}
															&Month={$selectedMonthForGet}
															&Year={$selectedYearForGet}
															&headId={$headId}
															&roleIdUser={$roleId}">
													{$foo.department_name}
													</a>
												</td>
													<td>
													<a 
														class="btn btn-md" 
														type="button" 
														data-toggle="modal" 
														data-lastname="{$foo.department_name}" 
														data-editid="{$foo.department_id}" 
														data-target="#departmentModal" 
														title="Редактировать Данные Отдела"
														{$accessEdit}>
														<i class="glyphicon glyphicon-pencil"></i>
													</a>
												</td>
												<td>
													<a 
														type="button" 
														class="btn btn-md" 
														href="/index.php
															?route=list/removeDepartment
															&departmentId={$foo.department_id}
															&nameUser={$name}
															&roleUser={$role}
															&Month={$selectedMonthForGet}
															&Year={$selectedYearForGet}
															&headId={$headId}
															&roleIdUser={$roleId}" 
														title="Удалить Данные Отдела"
														{$accessEdit}>
														<i class="glyphicon glyphicon-trash"></i>
														</a>
												</td>
											</tr>
										{/foreach}
										{/if}
										</tbody>
									</table>
									<a 
										type="button" 
										class="btn btn-md" 
										data-toggle="modal" 
										data-target="#departmentModal" 
										title="Добавить Отдел"
										{$accessEdit}>
										<i class="glyphicon glyphicon-plus"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="departmentModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="departmentModalLabel"></h4>
								</div>
								<form action="/index.php" method="get" onsubmit="diactive()">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label">Название:</label>
											<input name="newName" type="text" class="form-control" id="nameDepartment" value="" required="required">
										</div>
									</div>
									<div class="modal-footer">
										<div class="input-group hidden">
											<input id="route" name="route" type="hidden">
											<input id="editId" name="editId" type="hidden">
											<input name="nameUser" type="hidden" value="{$name}">
											<input name="roleUser" type="hidden" value="{$role}">
											<input name="Month" type="hidden" value="{$selectedMonthForGet}">
											<input name="Year" type="hidden" value="{$selectedYearForGet}">
											<input name="roleIdUser" type="hidden" value="{$roleId}">
											<input name="roleUser" type="hidden" value="{$role}">
										</div>
										<button id="buttonModalF" type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
										<button id="buttonModalS" type="submit" class="btn btn-primary">Сохранить</button>
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
			<script>
				$('#departmentModal').on('show.bs.modal', function (event) {
					var button = $(event.relatedTarget);
					var modal = $(this);
					var lastName = button.data('lastname');
					var editId = button.data('editid');
					if (editId != null){
						modal.find('.modal-title').text('Редактировать Данные Отдела');
						document.getElementById('route').value = 'list/editDepartment';
						document.getElementById('nameDepartment').value = lastName;
						document.getElementById('editId').value = editId;
					}else{
						modal.find('.modal-title').text('Новый Отдел');
						document.getElementById('route').value = 'list/newDepartment';
						document.getElementById('nameDepartment').value = null;
						document.getElementById('editId').value = null;
					}
				});
			</script>
			<script>
				function diactive() {
					document.getElementById('buttonModalS').disabled = 1;
					document.getElementById('buttonModalF').disabled = 1;
				}
			</script>
			<script>
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
			</script>
		</div>
	</body>
</html>