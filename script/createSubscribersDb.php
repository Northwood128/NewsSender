<?php
   
   require 'Config.class.php';
   
   $file = "subscribers.txt";
   $fhd = fopen($file, 'r');
   $line = '';
   $subscribers = array();
   
   $loader = new ConfigLoader("amazon");
   $settings = $loader->getDbSettings();
   $dns = "mysql:host=" . "localhost" . ";dbname=NS";
   //$dns = "mysql:host=" . $settings['RDS']['endpoint'] . ";dbname=NS";
   
   if ($fhd){
	   while (($line = fgets($fhd)) != false){
	      $subscriber = explode(',',trim($line));
		  $subscribers[] = $subscriber;
	   }
   }else{
      echo "Error";
   }
   //var_dump($subscribers);
   
   try {
   	    $DB_Handle = new PDO($dns,"root","//*praga800dc*" , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        //$DB_Handle = new PDO($dns,$settings['RDS']['username'], $settings['RDS']['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    } catch (PDOException $e) {
        echo 'Error: ' , $e->getMessage(), '\n';//*******************This needs to be changed
    }
	
	for ($i=0; $i <= sizeof($subscribers)-1; $i++) {
		$stmt = $DB_Handle->prepare('INSERT INTO subscribers (nombre, apellido, email) VALUES(:nombre, :apellido, :email)');
		$stmt->bindParam(':nombre',$subscribers[$i][0]);
		$stmt->bindParam(':apellido',$subscribers[$i][1]);
		$stmt->bindParam(':email',$subscribers[$i][2]);
		$stmt->execute();
	}
	if ($stmt) {
		header('Location: ../html/success.html');
	} else {
		header('Location: ../html/fail.html');
	}
?>