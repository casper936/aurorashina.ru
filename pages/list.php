<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	$query = mysql_query("SELECT (i.model) AS model, (i.brend) AS brend, (i.photo) AS photo, MIN( p.price ) AS price FROM item i INNER JOIN price p ON i.model = p.t_mod AND i.brend = p.t_br GROUP BY i.model, i.brend, i.photo ORDER BY i.model ASC ");
	$count = mysql_query("SELECT COUNT(DISTINCT model) FROM item");
		
	$i = 0;
	$row_count = mysql_fetch_row($count);
			echo "<div class='productRow'>"; //<!-- Each product row contains info of 3 elements -->
			while ($row = mysql_fetch_assoc($query)) {
				if ($row["photo"] == "") {
					$photo = "../image/no-image.jpg";
				} else {
					$photo = "../image/tyre/".$row["photo"];
				} 
			if ($i++%1 == 0) {
       		echo	"<div class='productInfo'>"; //<!-- Each individual product description -->
        	echo		"<div><a href = 'catalog/tyres/description.php?b=".$row["brend"]."&m=".$row["model"]."' title = '".$row["brend"]." ".$row["model"]."'><img alt='sample' src='".$photo."' height = '150'></a></div>
        				<p class='price'>от ".number_format($row["price"], 0, ',', ' ')." руб.</p>
          				<p class='productContent'>".$row["brend"]." ".$row["model"]." </p>";
         			//	<input type='button' name='button' value='Buy' class='buyButton'>
	       	echo	"</div>";
					};
		};
			echo "</div>";
?> 