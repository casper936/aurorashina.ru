<?php
		require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
		$brend = $_GET["b"];
		$model = $_GET["m"];
		$query = mysql_query("SELECT i.* , p.* FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod WHERE i.brend = '$brend' AND i.model = '$model'");
		$result_tbr = mysql_query("SELECT * FROM price GROUP BY t_br");
		
		while ($row = mysql_fetch_assoc($query)) {
			$result[] = $row["contry"];
			if ($row["photo"] == "") {
				$photo = "/image/no-image.jpg";
			} else {
				$photo = "/image/tyre/".$row["photo"];
			};
			$description = $row["description"];
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
		};
?>
<!doctype html>
<html>
<head>
	<meta http-equiv='X-UA-Compatible' content='IE=edge' />
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name='yandex-verification' content='669d98dc62339111' /> 
	<meta name="google-site-verification" content="C-O-fDthUPDb1ERNyTNlGlnJwCXkAia5O8LnfQZ7fKU" /> 
	<meta name="keywords" content=<? echo $brend." ".$model." продажа грузовых шин и дисков для грузовых автомобилей, спецтехники, сельхозтехники в новосибирске, нсо, по сибири"?> />
	<meta name="description" content="Продажа грузовых шин <? echo $brend." ".$model ?>" />
	<title><? echo "Шины - ".$brend." ".$model." | АВРОРА - Шинная Компания"; ?></title>
	<link href="/css/eCommerceStyle.css" rel="stylesheet" type="text/css">
	<link href="/css/tDescription.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/jquery.cycle2.js"></script>
<script type="text/javascript" src="/js/func.js"></script>
<script type="text/javascript" src="/js/settings.js"></script>
</head>

<body>
<div id="mainWrapper">
 	<? include($_SERVER['DOCUMENT_ROOT']."/pages/header.php");	?>
<div id="content">
    <nav class="sidebar"> 
      <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->
<!--      <input type="text"  id="search" value="search"> -->
	<img align = "left" src =<? echo "".$photo."" ?> />
      <div id="menubar">
        <div class="menu">
          <h1><!-- Title for Brend and Model--><? echo $brend." ".$model; ?> </h1>
          <hr>
          <ul>
            <!-- List of links under menuset 1 -->
            <li><span style = "font: 11px tahoma; font-weight: bold;">Страна производитель: </span><? echo "<div style = 'font: 11px tahoma'>".$result[0]."</div>"; ?></li>
            <li><span style = "font: 11px tahoma;font-weight: bold;">Ось монтажа: </span><? echo "<div style = 'font: 11px tahoma'>".$l."</div>"; ?></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="mainContent">
	  <div class="description">
        <div>
        	<? 
				echo "<h1>".$brend." ".$model."</h1>";
			?>
            <div style="text-align: left;"> 
            <?php echo $description; ?>
            </div>
        </div>
      </div>
      <table width="95%"  cellpadding = '0' cellspacing = '0' border = '0'>
  <tbody>
    <tr>
      <th scope="col">Размер</th>
      <th scope="col">Показатель <br /> слойности</th>
      <th scope="col">Индекс <br /> нагрузки</th>
      <th scope="col">Камерность</th>
      <th scope="col">Наличие</th>
      <th scope="col">Стоимость</th>
    </tr>
    <?php
			$query_d = mysql_query("SELECT * FROM price WHERE t_br = '$brend' AND t_mod = '$model' ORDER BY typesize ASC");
			$i = 1;
				while ($row_data = mysql_fetch_assoc($query_d)) {
					if ($i%2==0) $color="#FFFFFF";else $color="#F5F5F5";
					$i++;
   echo" 
   <tr BGCOLOR = $color>
      <td>".$row_data["typesize"]."</td>
      <td>".$row_data["t_plies"]."</td>
      <td>".$row_data["t_in_is"]."</td>
      <td>".$row_data["t_seclusion"]."</td>";
	  if ($row_data["quantity"] == -2) {
		echo "<td>Более 10 шт.</td>";
		} elseif ($row_data["quantity"] == -1) {
			echo "<td>В пути</td>";
		} elseif ($row_data["quantity"] == 0) {
			echo "<td>По запросу</td>";		
		} else {
			echo "<td>".$row_data["quantity"]." шт.</td>";
		};
     echo "<td>".number_format($row_data["price"], 0, ',', ' ')." руб.</td>
   </tr>";
				};
				?>
  </tbody>
</table>
    </div>
  </div>
  <footer> 
    <? include_once($_SERVER['DOCUMENT_ROOT']."/pages/footer.php") ?>
  </footer>
</div>
</body>
</html>