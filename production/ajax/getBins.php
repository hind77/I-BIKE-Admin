<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

	header('Content-type: application/json');
	include '../includes/db.php';

	$result = array();
	$result['data'] = array();
	$query = $pdo->query('SELECT * FROM `bins`');

	while($row = $query->fetch()){
		array_push($result['data'], 
			array(
				"id" => $row['id'],
				"name" => $row['name'],
				"lat" => $row['location_lat'],
				"lng" => $row['location_lng'],
				"fill_level" => $row['fill_level']
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