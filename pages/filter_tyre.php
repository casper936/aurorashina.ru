<?
	//filter_tyre.php
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	
	$result_tw = mysql_query("SELECT t_w FROM price GROUP BY t_w");
	$result_tp = mysql_query("SELECT t_applicability FROM price GROUP BY t_applicability");
	$result_tbr = mysql_query("SELECT * FROM price GROUP BY t_br");
	$result_tcat = mysql_query("SELECT * FROM price GROUP BY t_cat");
?>
<div class="filter_tires">
	<div class="gb" style="margin-left: 5px">
   				<span> Размер:
						<select name = 'width_tyre' id = 'width_tyre'>
							<option selected value = ''>Любой...</option>
						<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_tw)) {
								echo "<option value = '".$row["t_w"]."'>".$row["t_w"]."</option>";
								$i++;
							}
						?>
						</select><span> / 
						<select name = 'height_tyre' id = 'height_tyre'>
							<option selected value = ''>Любой...</option>
						</select></span><span> R 
						<select name = 'diameter_tyre'  id = 'diameter_tyre'>
							<option selected value = ''>Любой...</option>
						</select></span>
                 </span>
				 <span style="margin-left: 5px">Применяемость:
						<select name = 'os_tyre' id = 'os_tyre'>
							<option selected value = ''>Любая...</option>
								<?	
								$i = 1;
								while ($row = mysql_fetch_array($result_tp)) {
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
									}
									echo "<option value = '".$row["t_applicability"]."'>".$l."</option>";
									$i++;
								}
								?>
						</select>
                     </span>  
	</div>                     
	<div class="gb" style="margin-top: 0px !important"> 
                    <span style="margin-left: 5px"> Производитель:
						<select name = 'brend_tyre' class = 'filter' id = 'brend_tyre'>
							<option selected value = '' >(Все)</option>
							<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_tbr)) {
								echo "<option value = '".$row["t_br"]."'>".$row["t_br"]."</option>";
								$i++;
							}
							?>
						</select>
                      </span>
                      <span style="margin-left: 5px">  
						Сезон:
						<select name = 'season' class = 'filter' id = 'season'>
							<option selected value = '' >(Все)</option>
							<?	
							$i = 1;
							while ($row = mysql_fetch_array($result_tcat)) {
								switch ($row["t_cat"]) {
								case 'л':
									$k = "Летние";
									break;
								case 'з':
									$k = "Зимние";
									break;
								case 'в':
									$k = "Всесезонные";
									break;
								case 'спец':
									$k = "Спецшина";
									break;
							}
								echo "<option value = '".$row["t_cat"]."'>".$k."</option>";
								$i++;
							}
							?>
						</select>
					</span>			
		</div>
		<div style="float: right; margin-right: 5px">
        	<input type = 'submit' value = 'Найти' id = 'search_tyre' style = "float: right">
            <input type = 'submit' value = 'Сброс' id = 'reset'>
        </div>
</div>