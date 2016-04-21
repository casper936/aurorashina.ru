<? 
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	//Проверить вошел ли пользователь
	if(!isset($_SESSION['logged_in'])) {
		header("Location:  http://aurorashina.ru/php/login.php");
	}
		//взять объект user из сессии
		$user = unserialize($_SESSION['user']);

		$pages = $_POST["pages"];
		switch ($pages) {
			case 'edit_tire':
				$index = 6;
				$query = mysql_query("SELECT * FROM pages WHERE section = 'tire' ORDER BY id DESC LIMIT 1");
			break;

			case 'edit_company':
				$index = 2;
				$query = mysql_query("SELECT * FROM pages WHERE section = 'company' ORDER BY id DESC LIMIT 1");
			break;

			case 'edit_news':
				$index = 3;
				$query = mysql_query("SELECT * FROM pages WHERE section = 'news' ORDER BY id DESC LIMIT 1");
			break;

			case 'edit_contact':
				$index = 4;
				$query = mysql_query("SELECT * FROM pages WHERE section = 'contact' ORDER BY id DESC LIMIT 1");
			break;

			case 'edit_article':
				$index = 5;
				$query = mysql_query("SELECT * FROM pages WHERE section = 'article' ORDER BY id DESC LIMIT 1");
			break;
		}

	
?>
<!DOCTYPE html>
<html>
	<body>
	<script type="text/javascript">
	function elFinderBrowser (field_name, url, type, win) {
		tinymce.activeEditor.windowManager.open({
		file: '/ap/js/tinymce/plugins/elfinder/elfinder.html',// use an absolute path!
		title: 'Загрузка файлов и изображений',
		width: 900,  
		height: 450,
		resizable: 'yes'
	}, {
    setUrl: function (url) {
      win.document.getElementById(field_name).value = url;
    }
  });
  return false;
}
		tinymce.init({
			selector: "textarea",
			language : 'ru',
			plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
    image_advtab: true,
	convert_urls : false,
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
   file_browser_callback : elFinderBrowser  
		});
	</script>
	<?  ?>
<!-- Place this in the body of the page content -->
	<div id = 'user_id' style = 'display: none'><? echo $user->id ?></div>
	<div id = 'index' style = 'display: none'><? echo $index ?></div>
	<textarea id="mceEditor1">
		<?
			while ($row = mysql_fetch_array($query)) {
				echo $row["body"];
			}
		?>
	</textarea>
		<script language="javascript" type="text/javascript">
			function ShowHTML(mceId)
				{
					var data = tinyMCE.get(mceId).getContent(), usr_id = $('#user_id').text(), url = 'php/pages.php', index = $('#index').text();
					$.post (
						url,
						{
						data: data,
						user: usr_id,
						index: index
						},
						function(result) {
							alert(result);
						}
		);
				}
		</script>
<input type="button" value="Отправить" onclick="ShowHTML('mceEditor1');">
</html>