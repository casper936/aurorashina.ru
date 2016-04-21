<?
	//filter_disk.php
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	$result_dw = mysql_query("SELECT d_w FROM price_disks GROUP BY d_w");
	$result_dd = mysql_query("SELECT d_d FROM price_disks GROUP BY d_d");
	$result_pcd = mysql_query("SELECT d_pcd FROM price_disks GROUP BY d_pcd");
	$result_et = mysql_query("SELECT d_et FROM price_disks GROUP BY d_et");
	$result_br = mysql_query("SELECT d_br FROM price_disks GROUP BY d_br");
?>
<div class = 'filter_block gb'>
	<div class = 'block_bd'>
		<div class = 'block_head'>
			Подбор грузовых дисков
		</div>
		<div class = 'block_body'>
			<div class = 'search'>
				<div class = 'filter_label'>Размер:</div>
				<select name = 'width' class = 'filter' id = 'width_disks'>
					<option selected value = ''>Любой...</option>
					<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_dw)) {
								echo "<option value = '".$row["d_w"]."'>".$row["d_w"]."</option>";
								$i++;
							}
					?>
				</select><span> x 
				<select name = 'diameter' class = 'filter' id = 'diameter_disks'>
					<option selected value = ''>Любой...</option>
					<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_dd)) {
								echo "<option value = '".$row["d_d"]."'>".$row["d_d"]."</option>";
								$i++;
							}
					?>
				</select></span><span>
				<select name = 'P.C.D.' class = 'filter' id = 'pcd'>
					<option selected value = ''>P.C.D.</option>
					<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_pcd)) {
								echo "<option value = '".$row["d_pcd"]."'>".$row["d_pcd"]."</option>";
								$i++;
							}
					?>
				</select></span>
				<div class = 'filter_label'>Вылет:</div>
				<select name = 'departure' class = 'filter' style = 'width: 200px' id = 'departure'>
					<option selected value = ''>Любой...</option>
					<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_et)) {
								echo "<option value = '".$row["d_et"]."'>".str_replace("77777","-",$row["d_et"])."</option>";
								$i++;
							}
					?>
				</select>
				<div class = 'filter_label'>Производитель:</div>
				<select name = 'brand' class = 'filter' style = 'width: 200px' id = 'brand_disks'>
					<option selected value = '' >(Все)</option>
					<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_br)) {
								echo "<option value = '".$row["d_br"]."'>".$row["d_br"]."</option>";
								$i++;
							}
					?>
				</select>
			</div>
		</div>
		<input type = 'submit' value = 'Найти' id = 'search_disks' style = 'float: right; margin: 0 10px 10px 0'>
		<input type = 'submit' value = 'Сброс' id = 'reset' style = 'float: left; margin: 0 10px 10px 0'>
	</div>
</div> 