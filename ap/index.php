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
	<head>
		<meta http-equiv='X-UA-Compatible' content='IE=edge' />
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<link type='text/css' rel='stylesheet' media='all' href='/ap/css/style.css' />
		<link type='text/css' rel='stylesheet' media='all' href='/ap/css/style_tyre.css' />
		<link type='text/css' rel='stylesheet' media='all' href='/ap/css/nav.css' />
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="/ap/js/autoresize.jquery.js"></script>
		<script type="text/javascript" src="/ap/js/tinymce/tinymce.min.js"></script> 
		<script type="text/javascript" src="/ap/js/page.js"></script>
		<script type="text/javascript" src="/ap/js/jquery.wallform.js"></script>
		<title>Панель администратора</title>
	</head>
	<body>
	<script type="text/javascript">
		$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
			options.async = true;
		});
	</script>
	<div class="page-root">
		<div class="head">
			<div class="head_wrap">
				<div class="head_left">
					<span class="logo">
						<a class="logo_ashk" href = 'http://aurorashina.ru/' target="_blank"></a>
						<span class="logo_arrow">
							<span class="logo_arrow-text">Панель администратора</span>
						</span>
					</span>
				</div>
			</div>
		</div>
		<div class="centerblock-page">
			<div class = 'centerblock'>
				<div id = 'content'>
					<h2>Вы находитесь в Панели администратора. Здесь  Вы можете редактировать контент (статей, новостей и т.д.), вставлять фотографии к номенклатуре. </h2>
				</div>
			</div>
			<div class="sidebar__placeholder">
				<div class="sidebar">
					<div class="sidebar_cont">
						<ul>
							<li>
								<span>Работа с прайс-листом</span>
								<ul>
									<li><a href="#" id = "load_price"><span>Загрузка прайс-листа</span></a></li>
									<li><a href="#"><span class = "section" id = "edit_tire">Прайс на шиномонтаж</span></a></li>
						<!--			<li><a href="#" id = "edit_price"><span>Редактирование ном-ры</span></a></li> -->
								</ul>
							</li>
							<li>
								<span>Редактирование ном-ры</span>
								<ul>
									<li><a href="#" id = "tyres"><span>Категория Шины</span></a></li>
									<li><a href="#" id = "_disks"><span>Категория Диски (временно Н/Д)</span></a></li>
									<li><a href="#" id = "models"><span>Описание моделей</span></a></li>
								</ul>
							</li>
							<li>
								<span>Работа с контентом</span>
								<ul>
									<li><a href="#"><span class = "section" id = "edit_company">О компании</span></a></li>
									<li><a href="#"><span class = "section" id = "edit_news">Новости</span></a></li>
									<li><a href="#"><span class = "section" id = "edit_contact">Контакты</span></a></li>
									<li><a href="#"><span class = "section" id = "edit_article">Статьи</span></a></li>
								</ul>
							</li>
							<li>
								<span>Настройка</span>
								<ul>
									<li><a href="#" id = "edit_users"><span>Пользователи</span></a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>	
	</body>
</html>