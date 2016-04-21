<? 
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php'; 
//	$query = mysql_query("SELECT * FROM price");	
	$query = mysql_query("SELECT (i.id) as id, (i.model) AS model, (i.brend) AS brend, (i.photo) AS photo, MIN( p.price ) AS price, (p.quantity) AS quantity FROM item i INNER JOIN price p ON i.model = p.t_mod AND i.brend = p.t_br GROUP BY i.model, i.brend, i.photo ORDER BY i.brend ASC ");

?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="/ap/js/action.js"></script>
	</head> 
	<body>
	<table cellpadding = '0' cellspacing = '0' border = '0' style = 'width: 95%'>
					<tr>
						<th class = 'tr_tyre' align = 'center'><? echo "Бренд" ?></th>
						<th class = 'tr_tyre' align = 'center'><? echo "Модель" ?></th>
						<th class = 'tr_tyre' align = 'center'><? echo "Цена" ?></th>
						<th class = 'tr_tyre' align = 'center'><? echo "На складе" ?></th>
						
					<?
						$i = 1;
						while ($row = mysql_fetch_array($query)) {
							if ($i%2==0) $color="#FFFFFF";else $color="#E6E6FA";
							$i++;
							if ($row["photo"] == "") {
								$photo = "";
							} else {
								$photo = "/image/tyre/".$row["photo"];
							} 
							echo	
								"<tr BGCOLOR = $color class = 'select_row'>
									<td class = 'row'>".$row["brend"]."</td>
									<td class = 'row'>".$row["model"]."</td>
									<td class = 'row'>".number_format($row["price"], 2, ',', ' ')." руб.</td>
									<td class = 'row'>".$row["quantity"]." шт.</td>
								</tr>";
						}
					?>
				</table>
			
	</body>
</html>