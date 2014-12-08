<?php
  session_start();
  require 'passwordHash.php';
  require 'sanitization.php';
  require 'Config.class.php';
  
  $loader = new ConfigLoader("amazon");
  $settings = $loader->getDbSettings();
  $dns = "mysql:host=" . $settings['RDS']['endpoint'] . ";dbname=NS_users";
	
  $user_data['email'] = sanitize($_POST['user_mail']);
  $user_data['pwd'] = sanitize($_POST['pwd']);
    
  try {
      $DB_Handle = new PDO($dns,$settings['RDS']['username'],$settings['RDS']['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  } catch (PDOException $e) {
      echo 'Error: ' , $e->getMessage(), '\n';
  }
   
   $sql_user_uid = 'SELECT uid FROM users WHERE username = ' . "'" . $user_data['email'] . "'";
   $uid_stmt = $DB_Handle->prepare($sql_user_uid);
   $uid_stmt->execute();
   $user_uid = $uid_stmt->fetch(PDO::FETCH_ASSOC);

   $sql_user_hash = 'SELECT hash FROM hashes WHERE uid = :uid';
   $hash_stmt = $DB_Handle->prepare($sql_user_hash);
   $hash_stmt->bindParam(':uid', $user_uid['uid']);
   $hash_stmt->execute();
   $user_hash = $hash_stmt->fetch(PDO::FETCH_ASSOC);
   
   $sql_user_hash = 'SELECT salt FROM salt WHERE uid = :uid';
   $salt_stmt = $DB_Handle->prepare($sql_user_hash);
   $salt_stmt->bindParam(':uid', $user_uid['uid']);
   $salt_stmt->execute();
   $user_salt = $salt_stmt->fetch(PDO::FETCH_ASSOC);
   
   $hash_pack = PBKDF2_HASH_ALGORITHM . ':' . PBKDF2_ITERATIONS . ':' . $user_salt['salt'] . ':' . $user_hash['hash'];
   
   if (validate_password($user_data['pwd'], $hash_pack)){
   	   $_SESSION['token'] = '';
       header('Location: ../html/dashboard.html');
   }
   
   session_destroy();
   //echo create_hash($user_data['pwd']) . "<br />";
   //echo $hash_pack;
   //header('Location: ../html/login.html?login=false');
   
?>