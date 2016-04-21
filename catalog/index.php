<?php
		require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
		$result_tbr = mysql_query("SELECT * FROM price GROUP BY t_br");
?>
<!doctype html>
<html>
<head>
	<meta http-equiv='X-UA-Compatible' content='IE=edge' />
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name='yandex-verification' content='669d98dc62339111' /> 
	<meta name="google-site-verification" content="C-O-fDthUPDb1ERNyTNlGlnJwCXkAia5O8LnfQZ7fKU" /> 
	<meta name="keywords" content=<? echo $brend." продажа, покупка шин дисков для грузовых автомобилей, спецтехники, сельхозтехники" ?> />
	<meta name="description" content="Продажа грузовых шин <? while ($row = mysql_fetch_array($result_tbr)) {
											echo $row["t_br"] . " ";
										} ?> и грузовых дисков"/>
	<title>АВРОРА - Шинная Компания</title>
	<link href="../css/eCommerceStyle.css" rel="stylesheet" type="text/css">
    <link href="../css/tires.css" rel="stylesheet" type="text/css">

<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script type="text/javascript" src="../js/jquery.js"></script>
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.cycle2.js"></script>
<script type="text/javascript" src="../js/settings.js"></script>
<script type="text/javascript" src="../js/func.js"></script>
</head>

<body>
<div id="mainWrapper">
 	<? include("../pages/header.php");	?>
<div id="content" style="padding-top: 0px !important">
    
      <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->
      
      <?php include("../pages/filter_tyre.php"); ?>
  
    <div class="mainContent" style="width: 100% !important; float: none !important; padding-left: 0px !important">
		
    </div>
  </div>
  <footer> 
    <? include_once($_SERVER['DOCUMENT_ROOT']."/pages/footer.php") ?>
  </footer>
</div>
</body>
</html>
