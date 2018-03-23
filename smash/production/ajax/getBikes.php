<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

	header('Content-type: application/json');
	include '../includes/db.php';

	$result = array();
	$result['data'] = array();
	$query = $pdo->query('SELECT * FROM `bikes`');

	while($row = $query->fetch()){
		array_push($result['data'], 
			array(
				"id" => $row['id_bike'],
				"name" => $row['name'],
				"lat" => $row['lat'],
				"lng" => $row['lng'],
				"fill_level" => $row['state'],
				"station" => $row['station']
			)
		);
	}

	if($query){
		$result['code'] = '200';
		echo json_encode($result);
	}else{
		$result['code'] = '404';
		echo json_encode($result);
	}
	
}
?>