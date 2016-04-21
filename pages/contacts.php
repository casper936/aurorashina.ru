<?php
		require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
		$index = mysql_query("SELECT * FROM pages WHERE section = 'contact' ORDER BY id DESC LIMIT 1");
?>
<!doctype html>
<html>
<head>
	<meta http-equiv='X-UA-Compatible' content='IE=edge' />
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name='yandex-verification' content='669d98dc62339111' /> 
	<meta name="google-site-verification" content="C-O-fDthUPDb1ERNyTNlGlnJwCXkAia5O8LnfQZ7fKU" /> 
	<meta name="keywords" content="Продажа шин и дисков для грузовых автомобилей, спецтехники, сельхозтехники" />
	<meta name="description" content="Продажа грузовых шин и дисков" />
	<title>АВРОРА - Шинная Компания</title>
	<link href="../css/eCommerceStyle.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.cycle2.js"></script>
<script type="text/javascript" src="../js/func.js"></script>
<script type="text/javascript" src="../js/settings.js"></script>
<script charset="utf-8" type="text/javascript" src="http://firmsonmap.api.2gis.ru/js/DGWidgetLoader.js"></script>
</head>

<body>
<div id="mainWrapper">
 	<? include("../pages/header.php");	?>
<div id="content">
		<div style = 'float: left'>
			<a class="dg-widget-link" href="http://2gis.ru/novosibirsk/firm/141265771938929/center/82.911521,55.07920400000002/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Новосибирска</a>
			<div class="dg-widget-link">
				<a href="http://2gis.ru/novosibirsk/center/82.911521,55.079204/zoom/16/routeTab/rsType/bus/to/82.911521,55.079204╎АВРОРА-Шинная Компания, ООО?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до АВРОРА-Шинная Компания, ООО</a>
			</div>
			<script charset="utf-8" src="http://widgets.2gis.com/js/DGWidgetLoader.js"></script>
			<script charset="utf-8">new DGWidgetLoader({"width":640,"height":600,"borderColor":"#a3a3a3","pos":{"lat":55.07920400000002,"lon":82.911521,"zoom":16},"opt":{"city":"novosibirsk"},"org":[{"id":"141265771938929"}]});</script>
			<noscript style="color:#c00;font-size:16px;font-weight:bold;">Виджет карты использует JavaScript. Включите его в настройках вашего браузера.</noscript>
		</div>
		<div id = 'contact_c'>
			<?
				while ($row = mysql_fetch_array($index)) {
					echo $row["body"];
				}
			?>
		</div>
  </div>
  <footer> 
    <? include_once($_SERVER['DOCUMENT_ROOT']."/pages/footer.php") ?>
  </footer>
</div>
</body>
</html>
