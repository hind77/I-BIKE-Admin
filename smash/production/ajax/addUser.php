<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

	header('Content-type: application/json');

	if(isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['username']) && isset($_GET['password']) && isset($_GET['email'])){

		include '../includes/db.php';
		$result = array();
		$query = $pdo->query('INSERT INTO users (`id_user`, `first_name`, `last_name`, `username`, `password`, `email`) 
			VALUES (NULL,
			"'.$_GET['fname'].'",
			"'.$_GET['lname'].'",
			"'.$_GET['username'].'",
			"'.$_GET['password'].'",
			"'.$_GET['email'].'")');

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