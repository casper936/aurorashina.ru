<?
	//temp.php
	error_reporting(E_ALL);
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	
		$width = (isset($_POST["w"])) ? $_POST["w"]:"";
		$pcd = (isset($_POST["p"])) ? $_POST["p"]:"";
		$diam = (isset($_POST["d"])) ? $_POST["d"]:"";
		$brend = (isset($_POST["b"])) ? $_POST["b"]:"";
		$et = (isset($_POST["e"])) ? $_POST["e"]:"";
	
		if ($width <> "" AND $diam == "" AND $pcd == "" AND $et == "" AND $brend == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price_disks WHERE d_w = $width");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price_disks");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price_disks WHERE d_w = $width");
			}
		}
		if ($width <> "" AND $diam <> "" AND $pcd == "" AND $et == "" AND $brend == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price_disks WHERE d_w = $width AND d_d= '$diam'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price_disks");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price_disks WHERE d_w = $width AND d_d = '$diam'");
			}
		}
		if ($width <> "" AND $diam <> "" AND $pcd <> "" AND $et == "" AND $brend == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price_disks WHERE d_w = $width AND d_d = '$diam' AND d_pcd = '$pcd'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price_disks");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price_disks WHERE d_w = $width AND d_d = '$diam' AND d_pcd = '$pcd'");
			}
		}
		if ($width <> "" AND $diam <> "" AND $pcd <> "" AND $et == "" AND $brend <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price_disks WHERE d_w = $width AND d_d = '$diam' AND d_pcd = '$pcd' AND d_br = '$brend'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price_disks");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price_disks WHERE d_w = $width AND d_d = '$diam' AND d_pcd = '$pcd'");
			}
		}
		if ($width <> "" AND $diam <> "" AND $pcd <> "" AND $et <> "" AND $brend == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price_disks WHERE d_w = $width AND d_d = '$diam' AND d_pcd = '$pcd' AND d_et = '$et'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price_disks");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price_disks WHERE d_w = $width AND d_d = '$diam' AND d_pcd = '$pcd' AND d_et = '$et'");
			}
		}
		if ($width <> "" AND $diam <> "" AND $pcd <> "" AND $et <> "" AND $brend <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price_disks WHERE d_w = $width AND d_d = '$diam' AND d_pcd = '$pcd' AND d_et = '$et' AND d_br = '$brend'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price_disks");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price_disks WHERE d_w = $width AND d_d = '$diam' AND d_pcd = '$pcd' AND d_et = '$et' AND d_br = '$brend'");
			}
		}
		if ($width == "" AND $diam == "" AND $pcd == "" AND $et <> "" AND $brend == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price_disks WHERE d_et = '$et'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price_disks");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price_disks WHERE d_et = '$et'");
			}
		}
		if ($width == "" AND $diam == "" AND $pcd == "" AND $et == "" AND $brend <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price_disks WHERE d_br = '$brend'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price_disks");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price_disks WHERE d_br = '$brend'");
			}
		}
		if ($width == "" AND $diam == "" AND $pcd <> "" AND $et == "" AND $brend == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price_disks WHERE d_pcd = '$pcd'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price_disks");
				echo "
				<script type='text/javascript'>
				$('table').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT * FROM price_disks WHERE d_pcd = '$pcd'");
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
      <th scope="col">Бренд</th>
      <th scope="col">Ширина</th>
      <th scope="col">Диаметр</th>
      <th scope="col">P.C.D.</th>
      <th scope="col">Вылет</th>
      <th scope="col">D.I.A.</th>
      <th scope="col">Применяемость</th>
      <th scope="col">Цена</th>
      <th scope="col">На складе</th>
    </tr>
    <?php
	$i = 1;
	while ($row = mysql_fetch_assoc($query)) {
		if ($i%2==0) $color="#FFFFFF";else $color="#F5F5F5";
		$i++;
echo "
    <tr BGCOLOR = $color>
      <td>".$row["d_br"]."</td>
      <td>".$row["d_w"]."</td>
      <td>".(float)$row["d_d"]."</td>
      <td>".$row["d_otv"]."x".(float)$row["d_pcd"]."</td>
      <td>".str_replace("77777","-",$row["d_et"])."</td>
      <td>".(float)$row["d_dia"]."</td>
      <td>".$row["komment"]."</td>
      <td>".number_format($row["price"], 2, ',', ' ')." руб.</td>";
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