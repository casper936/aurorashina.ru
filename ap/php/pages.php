<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	$db = new DB();
	$data = $_POST["data"];
	$user = $_POST["user"];
	$index = $_POST["index"];
	$date = date("Y-m-d H:i:s",time());
	
	if ($index == 1) {
		$arr = array(
			"section" => "'index'",
			"body" => "'$data'",
			"date" => "'$date'",
			"author_id" => "'$user'"
		);
		$db->insert($arr, 'pages');
		echo "✔ Запись на главную страницу добавлена";
	}
	elseif ($index == 2) {
		$arr = array(
			"section" => "'company'",
			"body" => "'$data'",
			"date" => "'$date'",
			"author_id" => "'$user'"
		);
		$db->insert($arr, 'pages');
		echo "✔ Запись о компании добавлена";
	}
	elseif ($index == 3) {
		$arr = array(
			"section" => "'news'",
			"body" => "'$data'",
			"date" => "'$date'",
			"author_id" => "'$user'"
		);
		$db->insert($arr, 'pages');
		echo "✔ Запись в раздел Новости добавлена";
	}
	elseif ($index == 4) {
		$arr = array(
			"section" => "'contact'",
			"body" => "'$data'",
			"date" => "'$date'",
			"author_id" => "'$user'"
		);
		$db->insert($arr, 'pages');
		echo "✔ Запись в раздел Контакты добавлена";
	}
	elseif ($index == 5) {
		$arr = array(
			"section" => "'article'",
			"body" => "'$data'",
			"date" => "'$date'",
			"author_id" => "'$user'"
		);
		$db->insert($arr, 'pages');
		echo "✔ Запись в раздел Контакты добавлена";
	}
	elseif ($index == 6) {
		$arr = array(
			"section" => "'tire'",
			"body" => "'$data'",
			"date" => "'$date'",
			"author_id" => "'$user'"
		);
		$db->insert($arr, 'pages');
		echo "✔ Запись в раздел Шиномонтаж добавлена";
	}
?>