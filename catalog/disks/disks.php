<?
	error_reporting(E_ALL);
	require_once $_SERVER['DOCUMENT_ROOT'].'/inc/global.inc.php';
	
	if (isset($_POST["width"])) {
		$width = $_POST["width"];
		$res_h = mysql_query("SELECT * FROM price_disks WHERE d_w = $width GROUP BY d_d");
		$diameter = array();
		while ($res_h1 = mysql_fetch_assoc($res_h)) {
			$diameter[] = array('id'=>$res_h1['id'], 'd_d'=>$res_h1['d_d']);
		}
		$result = array('type' => 'success', 'diameter'=>$diameter);
		print json_encode($result);
	}
	if (isset($_POST["departure_d"])) {
		$et = $_POST["departure_d"];
		$res_d = mysql_query("SELECT * FROM price_disks WHERE d_et = $et GROUP BY d_br");
		$br = array();
		while ($res_d1 = mysql_fetch_assoc($res_d)) {
			$br[] = array('id'=>$res_d1['id'], 'd_br'=>$res_d1['d_br']);
		}
		$result = array('type' => 'success', 'br'=>$br);
		print json_encode($result);
	}
	if (isset($_POST["diameter_d"]) AND isset($_POST["width_dk"]) AND (!isset($_POST["pcd_d"])) AND (!isset($_POST["brand_disks"])) AND (!isset($_POST["departure_d"]))) {
		$diameter = $_POST["diameter_d"];
		$width = $_POST["width_dk"];
		$res_d = mysql_query("SELECT * FROM price_disks WHERE d_w = $width AND d_d = $diameter GROUP BY d_pcd");
		$pcd = array();
		while ($res_d1 = mysql_fetch_assoc($res_d)) {
			$pcd[] = array('id'=>$res_d1['id'], 'd_pcd'=>$res_d1['d_pcd']);
		}
		$result = array('type' => 'success', 'pcd'=>$pcd);
		print json_encode($result);
	}
	if (isset($_POST["diameter_d"]) AND isset($_POST["width_dk"]) AND isset($_POST["pcd_d"]) AND (!isset($_POST["brand_disks"])) AND (!isset($_POST["departure_d"]))) {
		$diameter = $_POST["diameter_d"];
		$width = $_POST["width_dk"];
		$pcd = $_POST["pcd_d"];
		$res_d = mysql_query("SELECT * FROM price_disks WHERE d_w = $width AND d_d = $diameter AND d_pcd = $pcd GROUP BY d_et");
		$et = array();
		while ($res_d1 = mysql_fetch_assoc($res_d)) {
			$et[] = array('id'=>$res_d1['id'], 'd_et'=>$res_d1['d_et']);
		}
		$result = array('type' => 'success', 'et'=>$et);
		print json_encode($result);
	}
	if (isset($_POST["diameter_d"]) AND isset($_POST["width_dk"]) AND isset($_POST["pcd_d"]) AND isset($_POST["departure_d"]) AND (!isset($_POST["brand_disks"])) ) {
		$diameter = $_POST["diameter_d"];
		$width = $_POST["width_dk"];
		$pcd = $_POST["pcd_d"];
		$et = $_POST["departure_d"];
		$res_d = mysql_query("SELECT * FROM price_disks WHERE d_w = $width AND d_d = $diameter AND d_et = $et AND d_pcd = $pcd GROUP BY d_br");
		$br = array();
		while ($res_d1 = mysql_fetch_assoc($res_d)) {
			$br[] = array('id'=>$res_d1['id'], 'd_br'=>$res_d1['d_br']);
		}
		$result = array('type' => 'success', 'br'=>$br);
		print json_encode($result);
	}
?>