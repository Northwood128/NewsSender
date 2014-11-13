<?php 
	header("Content-Type: application/json");
	/*//Testing
	$endpoint = $_GET['endpoint'];
	$user = $_GET['user'];
	$password = $_GET['password'];
	*/
	$endpoint = $_POST['rdsendpoint'];
	$user = $_POST['rdsusername'];
	$password = $_POST['rdspassword'];
	
	$dsn = 'mysql:host='.$endpoint.';db=users';

	try {
		$handle = new PDO($dsn,$user,$password);
		$response = array(
				'status' => 'green'
			);
	}catch(Exception $e){
		$response = array(
				'message' => $e->getMessage(),
				'status' => 'red'
			);
	}
	die(json_encode($response));
?>