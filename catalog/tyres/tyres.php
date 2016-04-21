<?
	error_reporting(E_ALL);
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	
	if (isset($_POST["width"])) {
		$width = $_POST["width"];
		$res_h = mysql_query("SELECT * FROM price WHERE t_w = $width GROUP BY t_h");
		$heigth = array();
		while ($res_h1 = mysql_fetch_assoc($res_h)) {
			$heigth[] = array('id'=>$res_h1['id'], 't_h'=>str_replace("77777","-",$res_h1['t_h']));
		}
		$result = array('type' => 'success', 'heigth'=>$heigth);
		print json_encode($result);
	}
	if (isset($_POST["heigth"]) AND isset($_POST["width_d"])) {
		$heigth = str_replace("-","77777",$_POST["heigth"]);
		$width_d = $_POST["width_d"];
		$res_d = mysql_query("SELECT * FROM price WHERE t_w = $width_d AND t_h = $heigth GROUP BY t_d");
		$diameter = array();
		while ($res_d1 = mysql_fetch_assoc($res_d)) {
			$diameter[] = array('id'=>$res_d1['id'], 't_d'=>$res_d1['t_d']);
		}
		$result = array('type' => 'success', 'diameter'=>$diameter);
		print json_encode($result);
	}
?>
