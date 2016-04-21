<? 
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
?>
<!DOCTYPE html>
<html>
<body style = 'font-size: 9pt;'>
<?php
error_reporting(E_ALL); // Выключаем показ ошибок. Чтобы их видеть - вместо 0 поставьте E_ALL
$max_file_size = 25; // Максимальный размер файла в МегаБайтах
$path = '../tmp/';
if(isset($_POST["update"]) == "OK"){
    // СТАРТ Загрузка файла на сервер
    if($_FILES["filename"]["size"] > $max_file_size*1024*1024){
        echo 'Размер файла превышает '.$max_file_size.' Мб!';
        include('form_file_load.php');
        exit;
    }
    if(copy($_FILES["filename"]["tmp_name"],$path.$_FILES["filename"]["name"])){
        echo("Файл "."<b>".$_FILES["filename"]["name"]."</b>"." успешно загружен!<br>");
		$ins_del= "DELETE FROM `price`";
		$ins_del2 = "DELETE FROM `price_disks`";
		$query = mysql_query($ins_del);
			if(!$query){
				die('Ошибочка '.mysql_error());
			}
		$query2 = mysql_query($ins_del2);
			if(!$query2){
				die('Ошибочка '.mysql_error());
			}
    }
    else{
        echo 'Ошибка загрузки файла<br>';
        include('form_file_load.php');
        exit;
    }

    //СТАРТ Считывание из файла Excel и запись в БД
    require_once $_SERVER['DOCUMENT_ROOT'].'/inc/Plugins/reader.class.php';
    $data = new Spreadsheet_Excel_Reader();
    $data->setOutputEncoding("UTF8"); //Кодировка выходных данных
	chmod($path."/".$_FILES["filename"]["name"],0777);
    $data->read($path."/".$_FILES["filename"]["name"]);

    for ($i=2; $i<=$data->sheets[0]["numRows"]; $i++){
        $cell1 = addslashes(trim($data->sheets[0]["cells"][$i][1]));
        $cell2 = addslashes(trim($data->sheets[0]["cells"][$i][2]));
        $cell3 = addslashes(trim($data->sheets[0]["cells"][$i][3]));
        $cell4 = addslashes(trim($data->sheets[0]["cells"][$i][4]));
        $cell5 = addslashes(trim($data->sheets[0]["cells"][$i][5]));
        $cell6 = addslashes(trim($data->sheets[0]["cells"][$i][6]));
        $cell7 = addslashes(trim($data->sheets[0]["cells"][$i][7]));
        $cell8 = addslashes(trim($data->sheets[0]["cells"][$i][8]));
        $cell9 = addslashes(trim($data->sheets[0]["cells"][$i][9]));
        $cell10 = addslashes(trim($data->sheets[0]["cells"][$i][10]));
        $cell11 = addslashes(trim($data->sheets[0]["cells"][$i][11]));
        $cell12 = addslashes(trim($data->sheets[0]["cells"][$i][12]));
        $cell13 = addslashes(trim($data->sheets[0]["cells"][$i][13]));
        $cell14 = addslashes(trim($data->sheets[0]["cells"][$i][14]));
        $cell15 = addslashes(trim($data->sheets[0]["cells"][$i][15]));
        $cell16 = addslashes(trim($data->sheets[0]["cells"][$i][16]));
        $cell17 = addslashes(trim($data->sheets[0]["cells"][$i][17]));
		
		$diam2 = str_replace(",",".",$cell2);
		$diam3 = str_replace("-","77777",$cell3);
		$diam4 = str_replace(",",".",$cell4);
		
		$ins= "INSERT INTO `price` (`typesize`, `t_w`, `t_h`, `t_d`, `t_in_is`, `t_ship`, `t_plies`, `price`, `quantity`, `t_br`, `t_mod`, `t_cont`, `t_cat`, `t_phot`, `t_applicability`,`t_seclusion`,`t_descr`) VALUES 
		('$cell1','$diam2','$diam3','$diam4','$cell5','$cell6','$cell7','$cell8','$cell9','$cell10','$cell11','$cell12','$cell13','$cell14','$cell15','$cell16','$cell17')";
		$query = mysql_query($ins);
			if(!$query){
				die('Ошибочка '.mysql_error());
			}
		}
		$query_count = mysql_query("SELECT COUNT(*) as total FROM price");
				$count = mysql_fetch_assoc($query_count);
				echo "<div style = 'font-weight: bold; padding: 5px'>Категория шины</div>
						<span>загружено позиций: </span><span style = 'font-weight: bold'>".$count["total"]."</span>";
	for ($i=2; $i<=$data->sheets[1]["numRows"]; $i++){
        $cell1 = addslashes(trim($data->sheets[1]["cells"][$i][1]));
        $cell2 = addslashes(trim($data->sheets[1]["cells"][$i][2]));
        $cell3 = addslashes(trim($data->sheets[1]["cells"][$i][3])); 
        $cell4 = addslashes(trim($data->sheets[1]["cells"][$i][4]));
        $cell5 = addslashes(trim($data->sheets[1]["cells"][$i][5]));
        $cell6 = addslashes(trim($data->sheets[1]["cells"][$i][6]));
        $cell7 = addslashes(trim($data->sheets[1]["cells"][$i][7]));
        $cell8 = addslashes(trim($data->sheets[1]["cells"][$i][8]));
        $cell9 = addslashes(trim($data->sheets[1]["cells"][$i][9]));
        $cell10 = addslashes(trim($data->sheets[1]["cells"][$i][10]));
		
		$d1 = str_replace(",",".",$cell1);
		$d2 = str_replace(",",".",$cell2);
		$d3 = str_replace(",",".",$cell3);
		$d5 = str_replace("-","77777",$cell5);
		$d6 = str_replace(",",".",$cell6);
		$d8 = str_replace(",",".",$cell8);
		$ins= "INSERT INTO `price_disks` (`d_w`, `d_d`, `d_pcd`, `d_otv`, `d_et`, `d_dia`, `d_br`, `price`, `quantity`, `komment`) VALUES 
		('$d1','$d2','$d3','$cell4','$d5','$d6','$cell7','$d8','$cell9', '$cell10')";
		$query = mysql_query($ins);
			if(!$query){
				die('Ошибочка '.mysql_error());
			}
		}$query_count = mysql_query("SELECT COUNT(*) as total FROM price_disks");
				$count = mysql_fetch_assoc($query_count);
				echo "<div style = 'font-weight: bold; padding: 5px'>Категория Диски</div>
						<span>Загружено позиций: </span><span style = 'font-weight: bold'>".$count["total"]."</span><div style = 'padding: 5px'><a href = 'http://aurorashina.ru/ap/'>Вернуться назад</a>";
			} else {
				include('form_file_load.php');
			}
	$insert = ("INSERT INTO item( brend, model, contry ) SELECT DISTINCT t_br, t_mod, t_cont FROM price 
	WHERE NOT EXISTS (SELECT brend, model FROM item WHERE price.t_br = item.brend AND price.t_mod = item.model)");
	$query_ins = mysql_query($insert);
	if (!$query_ins) {
		die('О-ой, ощибочка ' .mysql_error());
	}
?>
</body>