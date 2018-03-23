<?php
	$host = 'localhost';
	$dbname = 'smash';
	$dbusername = 'root';
	$dbpassword = '';
	$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname,
					$dbusername,
					$dbpassword);
?>