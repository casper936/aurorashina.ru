<?php
		require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
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
	<link href="/css/eCommerceStyle.css" rel="stylesheet" type="text/css">
    <link href="/css/tires.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script type="text/javascript" src="/js/jquery.js"></script>
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/jquery.cycle2.js"></script>
<script type="text/javascript" src="/js/settings.js"></script>
<script type="text/javascript" src="/js/func.js"></script>
</head>

<body>
<div id="mainWrapper">
	<div class = 'hb'>
 	<? 
		include_once($_SERVER['DOCUMENT_ROOT']."/pages/header.php");	
		include_once($_SERVER['DOCUMENT_ROOT']."/pages/filter_disk.php");
	?>
    </div>
<div id="content" style="padding-top: 0px !important">
    
      <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->
  
    <div class="mainContent" style="width: 100% !important; float: none !important; padding-left: 0px !important">
      <div class="table">
      	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr id = "h_tr">
      <th scope="col" id = "h_tr1">Бренд</th>
      <th scope="col" id = "h_tr2">Ширина</th>
      <th scope="col" id = "h_tr3">Диаметр</th>
      <th scope="col" id = "h_tr4">P.C.D.</th>
      <th scope="col" id = "h_tr5">Вылет</th>
      <th scope="col" id = "h_tr6">D.I.A.</th>
      <th scope="col" id = "h_tr7">Применяемость</th>
      <th scope="col" id = "h_tr8">Цена</th>
      <th scope="col" id = "h_tr9">На складе</th>
    </tr>
    <?php
		$query = mysql_query("SELECT * FROM price_disks ORDER BY d_br ASC");
	$i = 1;
	while ($row = mysql_fetch_assoc($query)) {
		if ($i%2==0) $color="#FFFFFF";else $color="#F5F5F5";
		$i++;
echo "
    <tr BGCOLOR = $color>
      <td id = 'h_td1'>".$row["d_br"]."</td>
      <td id = 'h_td2'>".$row["d_w"]."</td>
      <td id = 'h_td3'>".(float)$row["d_d"]."</td>
      <td id = 'h_td4'>".$row["d_otv"]."x".(float)$row["d_pcd"]."</td>
      <td id = 'h_td5'>".str_replace("77777","-",$row["d_et"])."</td>
      <td id = 'h_td6'>".(float)$row["d_dia"]."</td>
      <td id = 'h_td7'>".$row["komment"]."</td>
      <td id = 'h_td8'>".number_format($row["price"], 0, ',', ' ')." руб.</td>";
      if ($row["quantity"] == -2) {
			echo "<td id = 'h_td9'>Более 10 шт.</td>";
	  } elseif ($row["quantity"] == -1) {
			echo "<td id = 'h_td9'>В пути</td>";
	  } elseif ($row["quantity"] == 0) {
			echo "<td id = 'h_td9'>По запросу</td>";		
	  } else {
			echo "<td id = 'h_td9'>".$row["quantity"]." шт.</td>";
	  };
echo "</tr>";
	}
	?>
  </tbody>
</table>

      </div>
    </div>
  </div>
  <footer> 
    <? include_once($_SERVER['DOCUMENT_ROOT']."/pages/footer.php") ?>
  </footer>
</div>
</body>
</html>
