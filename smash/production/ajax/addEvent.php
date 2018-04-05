<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

	header('Content-type: application/json');

	if(isset($_GET['name']) && isset($_GET['description']) && isset($_GET['date'])){

		include '../includes/db.php';
		$result = array();
		$query = $pdo->query('INSERT INTO `events`(`id`, `name`, `description`, `Date`) 
			VALUES (NULL,
			"'.$_GET['name'].'",
			"'.$_GET['description'].'",
			"'.$_GET['date'].'")');

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