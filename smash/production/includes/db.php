<?php
	$host = 'localhost';
	$dbname = 'ibike';
	$dbusername = 'root';
	$dbpassword = '';
	$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname,
					$dbusername,
					$dbpassword);
?>
