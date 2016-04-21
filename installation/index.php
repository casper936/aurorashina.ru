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
</head>

<body>
<div id="mainWrapper">
 	<? include("../pages/header.php");	?>
<div id="content">
    <div class="mainContent" style = "width: 100% !important; padding-left: 0px !important">
	<div class="installation">
      <? 
		$query = mysql_query("SELECT * FROM pages WHERE section = 'tire' ORDER BY id DESC LIMIT 1");
		while ($row = mysql_fetch_array($query)) {
			echo $row["body"];
		}
	  ?>
	 </div>
    </div>
  </div>
  <footer> 
    <? include_once($_SERVER['DOCUMENT_ROOT']."/pages/footer.php") ?>
  </footer>
</div>
</body>
</html>
