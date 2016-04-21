<?php
//login.php
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	$error = "";
	$username = "";
	$password = "";

	//проверить отправлена ли форма логина
	if(isset($_POST['submit-login'])) { 

		$username = $_POST['username'];
		$password = $_POST['password'];

		$userTools = new UserTools();
		if($userTools->login($username, $password)){
			//удачный вход, редирект на страницу
			header("Location: http://aurorashina.ru/ap/");
		}else{
			$error = "Incorrect username or password. Please try again.";
		}
	}
?>
<html>
	<head>
		<meta http-equiv='X-UA-Compatible' content='IE=edge' />
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link type='text/css' rel='stylesheet' media='all' href='/ap/css/login.css' />
		<title>Вход</title>
	</head>
	<body>
	<?php
		if($error != "") {
			echo $error."<br/>";
		}
	?>
	<div class="login">
		<div class="login_container">
			<div class="login-section">
				<form class="aui" action="login.php" method="post">
					<h2>Log in to Administrator console</h2>
					<fieldset>
						<legend class="assistive"><span>Log in to Administrator Panel</span></legend>
						<div class="field-group">
							<label>Username</label>
							<input class="text" type="text" name="username" placeholder="Username" data-focus="0" value="<?php echo $username; ?>" />
						</div>
						<div class="field-group">
							<label>Password</label>
							<input class="password" type="password" name="password" placeholder="Password" data-focus="0" value="<?php echo $password; ?>" />
						</div>
						<div class="field-group form-buttons compact-form-buttons">
							<input class="aui-button aui-style aui-button-primary" type="submit" value="Login" name="submit-login" />
						</div>
					</fieldset>
				</form>
			</div>	
		</div>
	</div>
	</body>
</html>