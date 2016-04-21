<?php
		require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
		$result_tw = mysql_query("SELECT typesize FROM price GROUP BY typesize");
		$result_tp = mysql_query("SELECT t_applicability FROM price GROUP BY t_applicability");
		$result_tbr = mysql_query("SELECT * FROM price GROUP BY t_br");
		$result_tcat = mysql_query("SELECT * FROM price GROUP BY t_cat");
?>
<!doctype html>
<html>
<head>
	<meta http-equiv='X-UA-Compatible' content='IE=edge' />
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name='yandex-verification' content='669d98dc62339111' /> 
	<meta name="google-site-verification" content="C-O-fDthUPDb1ERNyTNlGlnJwCXkAia5O8LnfQZ7fKU" /> 
	<meta name="keywords" content="продажа шин, покупка шин, диски для грузовых автомобилей, спецтехники, сельхозтехники" />
	<meta name="description" content="Продажа грузовых шин и дисков" />
	<title>АВРОРА - Шинная Компания</title>
	<link href="css/eCommerceStyle.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script type="text/javascript" src="js/jquery.js"></script>
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.cycle2.js"></script>
<script type="text/javascript" src="js/func.js"></script>
<script type="text/javascript" src="js/settings.js"></script>
<script charset="utf-8" type="text/javascript" src="http://firmsonmap.api.2gis.ru/js/DGWidgetLoader.js"></script>
</head>

<body>
<div id="mainWrapper">
 	<? include_once($_SERVER['DOCUMENT_ROOT']."/pages/header.php");	?>
<div id="content">
    <nav class="sidebar"> 
      <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->
      <div id="menubar">
        <div class="menu">
          <h1><!-- Title for menuset 1 -->Поиск шин</h1>
          <hr>
          <ul>
            <!-- List of links under menuset 1 -->
            <li>
            	<div class="li_head">Типоразмер:</div>
						<select name = 'standard_size' id = 'standard_size' style="width: 100%">
							<option selected value = ''>Любой...</option>
						<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_tw)) {
								echo "<option value = '".$row["typesize"]."'>".$row["typesize"]."</option>";
								$i++;
							}
						?>
						</select>
            </li>
            <li>
           		 <div class="li_head">Применяемость:</div>
						<select name = 'os_tyre' id = 'os_tyre' style="width: 100%">
							<option selected value = ''>Любая...</option>
								<?	
								$i = 1;
								while ($row = mysql_fetch_array($result_tp)) {
									switch ($row["t_applicability"]) {
										case 'в':
									$l = "Ведущая ось";
									break;
								case 'р':
									$l = "Рулевая ось";
									break;
								case 'п':
									$l = "Прицепная ось";
									break;
								case 'с':
									$l = "Спецшина";
									break;
								case 'у':
									$l = "Универсальные";
									break;
								case 'пк':
									$l = "Прицеп(карьер)";
									break;
								case 'пр':
									$l = "Прицеп, Руль";
									break;
									}
									echo "<option value = '".$row["t_applicability"]."'>".$l."</option>";
									$i++;
								}
								?>
						</select>
            </li>
            <li>
            	<div class="li_head">Производитель:</div>
						<select name = 'brend_tyre' class = 'filter' id = 'brend_tyre' style="width: 100%">
							<option selected value = '' >(Все)</option>
							<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_tbr)) {
								echo "<option value = '".$row["t_br"]."'>".$row["t_br"]."</option>";
								$i++;
							}
							?>
						</select>
            </li>
            <li class="notimp"><!-- notimp class is applied to remove this link from the tablet and phone views -->
            	Сезон:
						<select name = 'season' class = 'filter' id = 'season' style="width: 100%">
							<option selected value = '' >(Все)</option>
							<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_tcat)) {
								switch ($row["t_cat"]) {
								case 'л':
									$k = "Летние";
									break;
								case 'з':
									$k = "Зимние";
									break;
								case 'в':
									$k = "Всесезонные";
									break;
								case 'спец':
									$k = "Спецшина";
									break;
							}
								echo "<option value = '".$row["t_cat"]."'>".$k."</option>";
								$i++;
							}
							?>
						</select>
            </li>
          </ul>
        </div>
         <div class = "buttom">
          	<input type = 'submit' value = 'Найти' id = 'search_tyre_index' style = 'margin: 0 10px 10px 0; float: right;'>
		  	<input type = 'submit' value = 'Сброс' id = 'reset' style = 'margin: 0 10px 10px 0; float: left;'>
          </div>
      </div>
    </nav>
    <div class="mainContent">
      <? include_once($_SERVER['DOCUMENT_ROOT']."/pages/list.php") ?>
    </div>
  </div>
  <footer>
      <?  include_once($_SERVER['DOCUMENT_ROOT']."/pages/footer.php") ?>
  </footer>
</div>
</body>
</html>
