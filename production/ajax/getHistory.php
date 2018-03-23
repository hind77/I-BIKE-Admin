<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

	header('Content-type: application/json');
	include '../includes/db.php';

	$result = array();
	$result['data'] = array();
	$query = $pdo->query('SELECT * FROM `history`');
	$query2 = $pdo->query('SELECT * FROM `trucks`');	

	$result['trucks'] = $query2->rowCount();

	while($row = $query->fetch()){
		array_push($result['data'], $row);
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