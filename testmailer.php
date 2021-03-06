<?php
	#error_reporting(E_ALL);
 	#ini_set('display_errors', 1);
	//This must be moved to a separate config file
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	require 'vendor/autoload.php';
	
	#Namespace for Amazon SES Client
	use Aws\Ses\SesClient;
	
	$client = SesClient::factory(array(
    	'profile' => 'default',
    	'region'  => 'us-west-2'
	));
	
	$result = $client->sendEmail(
		array(
			// Source is required
			'Source' => '',
			// Destination is required
			'Destination' => array(
				'ToAddresses' => array(''),
			),
			// Message is required
			'Message' => array(
				// Subject is required
				'Subject' => array(
				// Data is required
					'Data' => 'Mail de prueba 24/08/2014',
					'Charset' => 'UTF-8',
				),
				// Body is required
					'Body' => array(
						'Html' => array(
						// Data is required
   							'Data' => '<b>Hola</b>',
   							'Charset' => 'UTF-8',
    	    			),
  					),
			),
		));
	echo $result;
	//echo 'hola';
?>
