<?
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	$db = new DB();
	$index = $_POST["index"];
	
	if ($index == 1) {
		$query = mysql_query("SELECT * FROM pages WHERE section = 'company' ORDER BY id DESC LIMIT 1");
		while ($row = mysql_fetch_array($query)) {
			echo $row["body"];
		}
	}
	if ($index == 2) {
		$query = mysql_query("SELECT * FROM pages WHERE section = 'news' ORDER BY id DESC LIMIT 1");
		while ($row = mysql_fetch_array($query)) {
			echo $row["body"];
		}
	}
	if ($index == 3) {
		$query = mysql_query("SELECT * FROM pages WHERE section = 'contact' ORDER BY id DESC LIMIT 1");
		while ($row = mysql_fetch_array($query)) {
			echo $row["body"];
		}
	}
	if ($index == 4) {
		$query = mysql_query("SELECT * FROM pages WHERE section = 'article' ORDER BY id DESC LIMIT 1");
		while ($row = mysql_fetch_array($query)) {
			echo $row["body"];
		}
	}
	if ($index == 5) {
		$query = mysql_query("SELECT * FROM pages WHERE section = 'tire' ORDER BY id DESC LIMIT 1");
		while ($row = mysql_fetch_array($query)) {
			echo $row["body"];
		}
	}
?>