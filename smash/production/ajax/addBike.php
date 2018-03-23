<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

	header('Content-type: application/json');

	if(isset($_GET['name']) && isset($_GET['lat']) && isset($_GET['lng'])){

		include '../includes/db.php';
		$result = array();
		$query = $pdo->query('INSERT INTO `bikes`(`id`, `name`, `lat`, `lng`, `state`) 
			VALUES (NULL,
			"'.$_GET['name'].'",
			"'.$_GET['lat'].'",
			"'.$_GET['lng'].'"
			,20)');

		if($query){
			$result['code'] = '200';
			echo json_encode($result);
		}else{
			$result['code'] = '404';
			echo json_encode($result);
		}
	}
}
?>