<?php
   require '../vendor/autoload.php';
   
   use Aws\Sqs\SqsClient;
   
   $queueUrl = 'https://sqs.us-west-2.amazonaws.com/167468132568/NewsSenderBouncesQueue';
   
   //App Settings: app_config.ini
   date_default_timezone_set('America/Argentina/Buenos_Aires');
   
   $sqsClient = SqsClient::factory(array(
       'profile' => 'default',
       'region'  => 'us-west-2'
   ));
   
   $result = $sqsClient->receiveMessage(array(
       'QueueUrl'        => $queueUrl,
       'WaitTimeSeconds' => 10,
   ));
   
	foreach ($result->getPath('Messages/*/Body') as $messageBody) {
	    // Do something with the message
	    echo $messageBody;
	}
?>