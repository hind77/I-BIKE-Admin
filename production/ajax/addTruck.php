<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

	header('Content-type: application/json');

	if(isset($_GET['name']) && isset($_GET['capacity']) && isset($_GET['driver'])){

		include '../includes/db.php';
		$result = array();
		$query = $pdo->query('INSERT INTO `trucks`(`id_truck`, `name`, `capacity`, `driver`, `is_available`) 
			VALUES (NULL,
			"'.$_GET['name'].'",
			'.$_GET['capacity'].',
			"'.$_GET['driver'].'"
			,"0")');

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