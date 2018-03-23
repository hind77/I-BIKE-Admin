<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){

	header('Content-type: application/json');
	if(isset($_GET['id'])){

		$result = array();
		include '../includes/db.php';
		$query = $pdo->query('DELETE FROM `bikes` WHERE id='.$_GET['id']);

		if($query){
			$result['code'] = '200';
			echo json_encode($result);
		}
	
	}
}
?>