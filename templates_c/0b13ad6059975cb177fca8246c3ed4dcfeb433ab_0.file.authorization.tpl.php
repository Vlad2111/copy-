<?php
/* Smarty version 3.1.28, created on 2016-09-06 10:19:17
  from "/var/www/hr-timetrack-dev/3pty/Smarty/demo/templates/authorization.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_57ce6df5737078_97919892',
  'file_dependency' => 
  array (
    '0b13ad6059975cb177fca8246c3ed4dcfeb433ab' => 
    array (
      0 => '/var/www/hr-timetrack-dev/3pty/Smarty/demo/templates/authorization.tpl',
      1 => 1473070823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ce6df5737078_97919892 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Tecomgroup | Авторизация</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- REQUIRED CSS SCRIPTS -->
		<link rel="stylesheet" href="3pty/AdminLTE-2.3.5/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="3pty/AdminLTE-2.3.5/dist/css/AdminLTE.min.css"
		<link rel="stylesheet" href="3pty/AdminLTE-2.3.5/plugins/iCheck/square/blue.css">
		<!-- REQUIRED JS SCRIPTS -->
		<?php echo '<script'; ?>
 src="3pty/AdminLTE-2.3.5/plugins/jQuery/jquery-2.2.3.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="3pty/AdminLTE-2.3.5/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="3pty/AdminLTE-2.3.5/plugins/iCheck/icheck.min.js"><?php echo '</script'; ?>
>
	
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
			<?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
		<![endif]-->
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<b>Текомыч</b>
			</div>
			<div class="login-box-body">
				<form action="/index.php?route=CheckAuthorization" method="post">
					<div class="form-group has-feedback">
						<input name="login" type="login" class="form-control" placeholder="Логин">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input name="password" type="password" class="form-control" placeholder="Пароль">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-7">
						</div>
						<div class="col-xs-5">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Отправить</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
<?php }
}
