<?php
	//$settings['RDS']['endpoint']
	//$settings['RDS']['username']
	//$settings['RDS']['password']
	require '../vendor/autoload.php';
	require 'Config.class.php';
	
	#Namespace for Amazon SES Client
	use Aws\Ses\SesClient;
	
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
    	$loader = new ConfigLoader("amazon");
        $settings = $loader->getDbSettings();
   		$dns = "mysql:host=" . $settings['RDS']['endpoint'] . ";dbname=NS";
		
        $subject = $_POST['subject'];
		$mailBody = $_POST['mailBody'];
		$from = 'northwood128@gmail.com';//This muy muy bad
		
		try {
             $DB_Handle = new PDO($dns,$settings['RDS']['username'], $settings['RDS']['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } catch (PDOException $e) {
             echo 'Error: ' . $e->getMessage() . '\n';
			 echo $settings['RDS']['username'] ."::". $settings['RDS']['password'];//*******************This needs to be changed
        }
	    
		$stmt = $DB_Handle->prepare("SELECT email FROM subscribers_test WHERE status = 'active'");
		$stmt->execute();
		$badTo = $stmt->fetchAll();
		
		foreach ($badTo as $email) {
			$to[] = $email['email'];
		}
		//App Settings: app_config.ini
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		
		$client = SesClient::factory(array(
			'profile' => 'default',
    		'region'  => 'us-west-2'
		));
		
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