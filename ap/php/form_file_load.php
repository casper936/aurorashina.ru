<? 
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	setlocale(LC_ALL, 'ru_RU.UTF-8');
	//Проверить вошел ли пользователь
	if(!isset($_SESSION['logged_in'])) {
		header("Location:  http://aurorashina.ru/php/login.php");
	}


		//взять объект user из сессии
		$user = unserialize($_SESSION['user']);
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="/ap/js/action.js"></script>
</head>
	<body>
		<form action="php/price.php" method="post" enctype="multipart/form-data">
		<div class = 'upload'>
			<div class='file_upload'>
				<button type='button'>Выбрать</button>
				<div>Файл не выбран...</div>
				<input type="file" name = 'filename'>
				<input type='hidden' name = 'update' value = 'OK'>
			</div>
			<div class = 'file_submit'>
				<input type = 'submit'  name = 'upload' value = 'Загрузить'>
			</div>
		</div>
		</form>
		<?
			
		?>
	</body>
</html>