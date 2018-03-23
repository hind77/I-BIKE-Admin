<?php
	
	header('Content-Type: application/json');

	$data = array();
	$data['changed'] = 'yes';
	
	$output = exec('sudo python /usr/local/bin/ultrasonic.py');

	$data['fill_level'] = $output;

	//file_get_contents('http://172.20.10.2/smash/production/scripts/updteBin.php?id=3&fill_level='.$output);
	

	echo json_encode($data);
	
?>
