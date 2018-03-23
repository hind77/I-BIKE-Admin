<?php

include '../includes/simple_html_dom.php';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	header('Content-type: application/json');

	$data = array();
	// $iotPrototype = file_get_contents('http://192.168.4.1/');

	// var_dump($iotPrototype);

	//echo $iotPrototype->find('div[id = "distance"]', 0);



	$result = array();
	$result['changed'] = 'no';	

	if(isset($_GET['id'])){

		if($_GET['id'] == '3'){
			$result['fill_level'] = '33';
			$result['changed'] = 'yes';
		}
		
	}

	echo json_encode($result);
}

?>