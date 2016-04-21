<?
	//filter_disk.php
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	$result_dw = mysql_query("SELECT d_w FROM price_disks GROUP BY d_w");
	$result_dd = mysql_query("SELECT d_d FROM price_disks GROUP BY d_d");
	$result_pcd = mysql_query("SELECT d_pcd FROM price_disks GROUP BY d_pcd");
	$result_et = mysql_query("SELECT d_et FROM price_disks GROUP BY d_et");
	$result_br = mysql_query("SELECT d_br FROM price_disks GROUP BY d_br");
?>
<div class="filter_tires">
	<div class="gb">
   				<span style="margin-left: 5px">Размер:
				<select name = 'width' id = 'width_disks'>
					<option selected value = ''>Любой...</option>
					<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_dw)) {
								echo "<option value = '".$row["d_w"]."'>".$row["d_w"]."</option>";
								$i++;
							}
					?>
				</select></span>
                <span> x 
				<select name = 'diameter' id = 'diameter_disks'>
					<option selected value = ''>Любой...</option>
					<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_dd)) {
								echo "<option value = '".$row["d_d"]."'>".$row["d_d"]."</option>";
								$i++;
							}
					?>
				</select></span><span style="margin-left: 10px">
				<select name = 'P.C.D.' id = 'pcd'>
					<option selected value = ''>P.C.D.</option>
					<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_pcd)) {
								echo "<option value = '".$row["d_pcd"]."'>".$row["d_pcd"]."</option>";
								$i++;
							}
					?>
				</select></span>
                </div>
                <div class="gb" style="margin-top: 0px !important">
				<span style="margin-left: 10px"> Вылет:
				<select name = 'departure' id = 'departure'>
					<option selected value = ''>Любой...</option>
					<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_et)) {
								echo "<option value = '".$row["d_et"]."'>".$row["d_et"]."</option>";
								$i++;
							}
					?>
				</select>
                </span>
				<span style="margin-left: 10px"> Производитель:
				<select name = 'brand' id = 'brand_disks'>
					<option selected value = '' >(Все)</option>
					<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_br)) {
								echo "<option value = '".$row["d_br"]."'>".$row["d_br"]."</option>";
								$i++;
							}
					?>
				</select>
                </span>
                </div>
        <div style="float:right; margin-right: 5px">
			<input type = 'submit' value = 'Найти' id = 'search_disks' style = "float: right">
			<input type = 'submit' value = 'Сброс' id = 'reset'>
        </div>
</div>        