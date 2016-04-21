<?
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	error_reporting(E_ALL);
		$width = (isset($_POST["w"])) ? $_POST["w"]:"";
		$brend = (isset($_POST["b"])) ? $_POST["b"]:"";
		$applicability = (isset($_POST["a"])) ? $_POST["a"]:"";
		$season = (isset($_POST["s"])) ? $_POST["s"]:"";
		
		if ($width <> "" AND $brend <> "" AND $applicability <> "" AND $season <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE typesize = $width AND t_br = '$brend' AND t_applicability = '$applicability' AND  t_cat = '$season'");	
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
					$('.productRow').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT i.*, p.* FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod WHERE p.typesize = $width AND p.t_br = '$brend' AND p.t_applicability = '$applicability' AND  p.t_cat = '$season'");	
			}
		}
		if ($width <> "" AND $brend <> "" AND $applicability <> "" AND $season == "")  {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE typesize = '$width' AND t_br = '$brend' AND t_applicability = '$applicability'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
					$('.productRow').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT i.*, p.* FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod WHERE p.typesize = '$width' AND p.t_br = '$brend' AND p.t_applicability = '$applicability'");
			}	
		}
		if ($width <> "" AND $brend <> "" AND $applicability == "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE typesize = '$width' AND t_br = '$brend'");	
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
					$('.productRow').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT i.*, p.* FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod WHERE p.typesize = '$width' AND p.t_br = '$brend'");	
			}
		}
		if ($width <> "" AND $brend == "" AND $applicability == "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE typesize = '$width'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
					$('.productRow').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT i.brend, i.model, i.photo FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod WHERE p.typesize = '$width' GROUP BY i.brend, i.model, i.photo");
			}
		}
		if ($width <> "" AND $brend == "" AND $applicability == "" AND $season <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE typesize = '$width' AND t_cat = '$season'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
					$('.productRow').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT i.*, p.* FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod WHERE p.typesize = '$width' AND p.t_cat = '$season'");
			}
		}
		if ($width <> "" AND $brend == "" AND $applicability <> "" AND $season <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE typesize = '$width' AND t_cat = '$season' AND t_applicability = '$applicability'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
					$('.productRow').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT i.*, p.* FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod WHERE p.typesize = '$width' AND p.t_cat = '$season' AND p.t_applicability = '$applicability'");
			}
		}
		if ($width == "" AND $brend == "" AND $applicability == "" AND $season <> "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_cat = '$season'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
					$('.productRow').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT i.*, p.* FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod WHERE p.t_cat = '$season'");
			}
		}
		if ($width == "" AND $brend == "" AND $applicability <> "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_applicability = '$applicability'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
					$('.productRow').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT DISTINCT i.model, i.brend, i.photo FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod WHERE p.t_applicability = '$applicability'");
			}
		}
		if ($width == "" AND $brend <> "" AND $applicability == "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_br = '$brend'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
					$('.productRow').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT DISTINCT i.model, i.brend, i.photo FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod WHERE p.t_br = '$brend'");
			}
		}
		if ($width == "" AND $brend <> "" AND $applicability <> "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE t_br = '$brend' AND t_applicability = '$applicability'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
				$query = mysql_query("SELECT * FROM price");
				echo "
				<script type='text/javascript'>
					$('.productRow').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT i.*, p.* FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod WHERE p.t_br = '$brend' AND p.t_applicability = '$applicability'");
			}
		}
		if ($width <> "" AND $brend == "" AND $applicability <> "" AND $season == "") {
			$result = mysql_query("SELECT COUNT(*) as total FROM price WHERE typesize = '$width' AND t_applicability = '$applicability'");
			$data = mysql_fetch_assoc($result);
			if ($data['total'] == 0) {
			//	$query = mysql_query("SELECT i.*, p.* FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod");
				echo "
				<script type='text/javascript'>
					$('.productRow').empty();
				</script>	
				<div class = 'error'>Извините, по вашему запросу ничего не найдено</div>
				";
			} else {
				$query = mysql_query("SELECT i.brend, i.model, i.photo FROM item i INNER JOIN price p ON i.brend = p.t_br AND i.model = p.t_mod WHERE p.typesize = '$width' AND p.t_applicability = '$applicability' GROUP BY i.brend, i.model, i.photo");
			}
		}
		
	$i = 0;
	$count = mysql_query("SELECT COUNT(DISTINCT model) FROM item");
	$row_count = mysql_fetch_row($count);
			echo "<div class='productRow'>"; //<!-- Each product row contains info of 3 elements -->
			while ($row = mysql_fetch_assoc($query)) {
				if ($row["photo"] == "") {
					$photo = "/image/no-image.jpg";
				} else {
					$photo = "/image/tyre/".$row["photo"];
				} 
			if ($i++%1 == 0) {
       		echo	"<div class='productInfo'>"; //<!-- Each individual product description -->
        	echo		"<div><a href = 'catalog/tires/".$row["brend"]."/".$row["model"]."' title = '".$row["brend"]." ".$row["model"]."'><img alt='sample' src='".$photo."' height = '150'></a></div>
          				<p class='price'>".$row["brend"]."</p>
						<p class='productContent'>".$row["model"]."</p>";		
//<p class='productContent'>от ".number_format($row["price"], 0, ',', ' ')." руб.</p>						
         			//	<input type='button' name='button' value='Buy' class='buyButton'>
	       	echo	"</div>";
					};
		};
			echo "</div>";
?>