<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

	header('Content-type: application/json');
	include '../includes/db.php';

	$result = array();
	$result['data'] = array();
	$query = $pdo->query('SELECT * FROM `history`');	

	$rowCount = $query->rowCount();
	$cmpt = 0;

	while($cmpt < $rowCount-1){
		$row1 = $query->fetch();
		$row2 = $query->fetch();

		$date1 = $row1['duration'];
		$date2 = $row2['duration'];

		$date1 = explode(" ", $date1);
		$date11= $date1[0];
		$date1 = explode("-", $date1[0]);

		$date2 = explode(" ", $date2);
		$date2 = explode("-", $date2[0]);

		if($date1[2] == $date2[2]){

			$month = date('M', mktime(0, 0, 0, $date1[1], 10));
			array_push($result['data'], array(
				"label" => $month ." " .$date1[2],
				"data" => $row1["kilometers"] + $row2["kilometers"],
				//"collected" => $row1["collected_bins"] + $row2["collected_bins"]
			));
		}else{
			$month = date('M', mktime(0, 0, 0, $date1[1], 10));
			array_push($result['data'], array(
				"label" => $month ." " .$date1[2],
				"data" => $row1["n_kilometers"],
				//"collected" => $row1['collected_bins']
			));
			$month = date('M', mktime(0, 0, 0, $date2[1], 10));
			array_push($result['data'], array(
				"label" => $month ." " .$date2[2],
				"data" => $row2["n_kilometers"],
				//"collected" => $row2['collected_bins']
			));
		}
		$cmpt+= 2;
	}

	// for($i=0; $i < $query->rowCount()-1; $i++){
	// 	$row1 = $query->fetch();
	// 	$row2 = $query->fetch();

	// 	$date1 = $row1['route_start'];
	// 	$date2 = $row2['route_start'];

	// 	$date1 = explode(" ", $date1);
	// 	$date1 = explode("-", $date1[0]);

	// 	$date2 = explode(" ", $date2);
	// 	$date2 = explode("-", $date2[0]);

	// 	if($date1[2] == $date2[2]){
	// 		array_push($result['data'], array(
	// 			"label" => $date1[2],
	// 			"data" => $row1["n_kilometers"] + $row2["n_kilometers"]
	// 		));
	// 	}
	// }

	if($query){
		$result['code'] = '200';
		echo json_encode($result);
	}else{
		$result['code'] = '404';
		echo json_encode($result);
	}
	
}
?>