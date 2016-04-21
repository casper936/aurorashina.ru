<? 
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	//Проверить вошел ли пользователь
	if(!isset($_SESSION['logged_in'])) {
		header("Location:  http://aurorashina.ru/php/login.php");
	}
		//взять объект user из сессии
		$user = unserialize($_SESSION['user']);
	
?>
<!DOCTYPE html>
<html>
	<body>		
		<input type="button" value="Сменить пароль">
	</body>	
</html>