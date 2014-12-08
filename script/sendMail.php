<?php
	require '../vendor/autoload.php';
	
	#Namespace for Amazon SES Client
	use Aws\Ses\SesClient;
	
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $subject = $_POST['subject'];
		$mailBody = $_POST['mailBody'];
		$from = 'northwood128@gmail.com';
		//App Settings: app_config.ini
		date_default_timezone_set('America/Argentina/Buenos_Aires');

		$client = SesClient::factory(array(
			'profile' => 'default',
    		'region'  => 'us-west-2'
		));
		$to =array('estefaniagon90@gmail.com', 'notallme1991@hotmail.com','agustinrecalde128@gmail.com','estefaniagon90@hotmail.com');
		$result = $client->sendEmail(
		array(
			// Source is required
			'Source' => $from,
			// Destination is required
			'Destination' => array(
				'ToAddresses' => $to,
			),
			// Message is required
			'Message' => array(
				// Subject is required
				'Subject' => array(
				// Data is required
					'Data' => $subject,
					'Charset' => 'UTF-8',
				),
				// Body is required
					'Body' => array(
						'Html' => array(
						// Data is required
   							'Data' => $mailBody,
   							'Charset' => 'UTF-8',
    	    			),
  					),
			),
		));
    }
?>