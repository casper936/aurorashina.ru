<? 
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	error_reporting(E_ALL);
	$query = mysql_query("SELECT (i.id) as id, (i.model) AS model, (i.brend) AS brend, (i.photo) AS photo, MIN( p.price ) AS price, (p.quantity) AS quantity, (i.description) AS description FROM item i INNER JOIN price p ON i.model = p.t_mod AND i.brend = p.t_br GROUP BY i.model, i.brend, i.photo ORDER BY i.photo ASC ");
?>
<!DOCTYPE html>
<html>
<!--	<head>
		<script type="text/javascript" src="/ap/js/action.js"></script>
		<script type="text/javascript" src="/ap/js/jquery.wallform.js"></script> 
	</head> -->
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
    <?php
		$i = 1;
		while ($row = mysql_fetch_array($query)) {
			if ($row["photo"] == "") {
				$photo = "";
			} else {
				$photo = "/image/tyre/".$row["photo"];	
			}
			echo "
				<div class = 'description_tyre'>
					<span class = 'photo' id = 'fon".$i."' style = 'background: url(".$photo.") center no-repeat; background-size: 100px auto;'>
					<div id='".$row["id"]."'></div>
					</span>
					<span id = 'description_model'>
						<div id = 'header'>".$row["brend"]." ".$row["model"]."</div>
						<div id = 'description_1'><textarea id = 'comments' style = 'both' placeholder='Описание модели...'>'".$row["description"]."'</textarea></div>
						<div id = 'save_model'><input type='button' id = '".$row["id"]."' class = 'blue_button' value = 'Сохранить'></div>
					</span>
				</div>
				<form id='imageform' method='post' enctype='multipart/form-data' name='form' action='php/ajaxImageUpload.php' style='clear:both'>
					<input type = 'text' name = 'id' value = '".$row["id"]."' style = 'display:none' />
					<div id='imageloadstatus' style='display:none'><img src='image/loader.gif'  alt='Uploading....'/></div>
					<div id='imageloadbutton'>
						<input type='file' name='photos[]' id = '".$row["id"]."' class='photoimg' multiple='true' />
					</div>
				</form>
			";
			$i++;
		}
	?>		
	</body>
</html>