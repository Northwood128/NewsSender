<?php
   require '../vendor/autoload.php';
   
   use Aws\Sqs\SqsClient;
   
   $queueUrl = 'https://sqs.us-west-2.amazonaws.com/167468132568/NewsSenderBouncesQueue';
   
   $sqsClient = SqsClient::factory(array(
       'profile' => 'default',
       'region'  => 'us-west-2'
   ));
   
   $result = $client->receiveMessage(array(
       'QueueUrl'        => $queueUrl,
       'WaitTimeSeconds' => 10,
   ));
   
   var_dump($result);
?>