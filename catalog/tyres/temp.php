<?
	error_reporting(E_ALL);
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
		$width = (isset($_POST["w"])) ? $_POST["w"]:"";
		$height = (isset($_POST["h"])) ? str_replace("-","77777",$_POST["h"]):"";
		$diam = (isset($_POST["d"])) ? $_POST["d"]:"";
		$brend = (isset($_POST["b"])) ? $_POST["b"]:"";
		$applicability = (isset($_POST["a"])) ? $_POST["a"]:"";
		$season = (isset($_POST["s"])) ? $_POST["s"]:"";
	
		if ($width <> "" AND $height <> "" AND $diam <> "" AND $brend <> "" AND $applicability <> "" AND $season <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_w = $width AND t_h = $height AND t_d = $diam AND t_br = '$brend' AND t_applicability = '$applicability' AND  t_cat = '$season'");	
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_w = $width AND t_h = $height AND t_d = $diam AND t_br = '$brend' AND t_applicability = '$applicability' AND  t_cat = '$season'");	
			}
		}
		if ($width <> "" AND $height <> "" AND $diam <> "" AND $brend <> "" AND $applicability <> "" AND $season == "")  {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_w = $width AND t_h = $height AND t_d = $diam AND t_br = '$brend' AND t_applicability = '$applicability'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_w = $width AND t_h = $height AND t_d = $diam AND t_br = '$brend' AND t_applicability = '$applicability'");
			}	
		}
		if ($width <> "" AND $height <> "" AND $diam <> "" AND $brend <> "" AND $applicability == "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_w = $width AND t_h = $height AND t_d = $diam AND t_br = '$brend'");	
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_w = $width AND t_h = $height AND t_d = $diam AND t_br = '$brend'");	
			}
		}
		if ($width <> "" AND $height <> "" AND $diam <> "" AND $brend == "" AND $applicability == "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_w = $width AND t_h = $height AND t_d = $diam");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_w = $width AND t_h = $height AND t_d = $diam");
			}
		}
		if ($width <> "" AND $height <> "" AND $diam <> "" AND $brend == "" AND $applicability == "" AND $season <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_w = $width AND t_h = $height AND t_d = $diam AND t_cat = '$season'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_w = $width AND t_h = $height AND t_d = $diam");
			}
		}
		if ($width <> "" AND $height <> "" AND $diam <> "" AND $brend == "" AND $applicability <> "" AND $season <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_w = $width AND t_h = $height AND t_d = $diam AND t_cat = '$season' AND t_applicability = '$applicability'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_w = $width AND t_h = $height AND t_d = $diam");
			}
		}
		if ($width <> "" AND $height <> "" AND $diam == "" AND $brend == "" AND $applicability == "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_w = $width AND t_h = $height");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_w = $width AND t_h = $height");
			}	
		}
		if ($width == "" AND $height == "" AND $diam == "" AND $brend == "" AND $applicability == "" AND $season <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_cat = '$season'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_cat = '$season'");
			}
		}
		if ($width == "" AND $height == "" AND $diam == "" AND $brend == "" AND $applicability <> "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_applicability = '$applicability'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_applicability = '$applicability'");
			}
		}
		if ($width == "" AND $height == "" AND $diam == "" AND $brend <> "" AND $applicability == "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_br = '$brend'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_br = '$brend'");
			}
		}
		if ($width == "" AND $height == "" AND $diam == "" AND $brend <> "" AND $applicability == "" AND $season <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_br = '$brend' AND t_cat = '$season'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_br = '$brend' AND t_cat = '$season'");
			}
		}
		if ($width == "" AND $height == "" AND $diam == "" AND $brend <> "" AND $applicability <> "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_br = '$brend' AND t_applicability = '$applicability'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_br = '$brend' AND t_applicability = '$applicability'");
			}
		}
		if ($width == "" AND $height == "" AND $diam == "" AND $brend == "" AND $applicability <> "" AND $season <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_cat = '$season' AND t_applicability = '$applicability'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_cat = '$season' AND t_applicability = '$applicability'");
			}
		}
		if ($width <> ""  AND $height == "" AND $diam == "" AND $brend == "" AND $applicability == "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_w = $width");	
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_w = $width");	
			}
		}
		if ($width <> "" AND $height == "" AND $diam == "" AND $brend == "" AND $applicability <> "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_w = $width AND t_applicability = '$applicability'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price WHERE t_w = $width AND t_applicability = '$applicability'");
			}
		}
		
?><head>
		<link href="../css/eCommerceStyle.css" rel="stylesheet" type="text/css">
    	<link href="../css/tires.css" rel="stylesheet" type="text/css">
		<script type='text/javascript' src='../js/jquery.js'></script>
		<script type='text/javascript' src='../js/func.js'></script> 
	</head>
<div class="table">	
	  	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <th scope="col">Типоразмер</th>
      <th scope="col">Бренд</th>
      <th scope="col">Модель</th>
      <th scope="col">ИН/ИС</th>
      <th scope="col">Слойность</th>
      <th scope="col">Камерность</th>
      <th scope="col">Применяемость</th>
      <th scope="col">Цена</th>
      <th scope="col">На складе</th>
    </tr>
    <?php
		
	$i = 1;
	while ($row = mysql_fetch_assoc($query)) {
		if ($i%2==0) $color="#FFFFFF";else $color="#F5F5F5";
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
		};
		$i++;
echo "
    <tr BGCOLOR = $color>
      <td>".$row["typesize"]."</td>
      <td>".$row["t_br"]."</td>
      <td>".$row["t_mod"]."</td>
      <td>".$row["t_in_is"]."</td>
      <td>".$row["t_plies"]."</td>
      <td>".$row["t_seclusion"]."</td>
      <td>".$l."</td>
      <td>".number_format($row["price"], 0, ',', ' ')." руб.</td>";
      if ($row["quantity"] == -2) {
			echo "<td>Более 10 шт.</td>";
	  } elseif ($row["quantity"] == -1) {
			echo "<td>В пути</td>";
	  } elseif ($row["quantity"] == 0) {
			echo "<td>По запросу</td>";		
	  } else {
			echo "<td>".$row["quantity"]." шт.</td>";
	  };
echo "</tr>";
	}
	?>
  </tbody>
</table>
</div>