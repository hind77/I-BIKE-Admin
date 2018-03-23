<?php

include '../includes/db.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(isset($_GET['id']) && isset($_GET['fill_level'])){
		$pdo->query("INSERT INTO `bins`(`id`, `name`, `location_lat`, `location_lng`, `fill_level`, `battery_lvl`, `status`, `last_update`) VALUES (NULL, '".$_GET['id']."','31231231231','31321321',".$_GET['fill_level'].", '0', CURRENT_TIMESTAMP)");
	}
}
?>
