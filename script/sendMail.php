<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $subject = $_POST['subject'];
		$mailBody = $_POST['mailBody'];
		$from = 'northwood128@gmail.com';
		
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		require '../vendor/autoload.php';
	
		#Namespace for Amazon SES Client
		use Aws\Ses\SesClient;
	
		$client = SesClient::factory(array(
    		'profile' => 'default',
    		'region'  => 'us-west-2'
		));
    }
?>