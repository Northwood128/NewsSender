<?php
  session_start();
  require 'passwordHash.php';
  require 'validation.php';
  
  $user_data['email'] = sanitize($_POST['user_mail']);
  $user_data['pwd'] = sanitize($_POST['pwd']);
  
  //This must be extracted safely from config file. This is just a mock
  $db_settings['dns'] = 'mysql:host=localhost;dbname=NS_users';
  $db_settings['db_user'] = 'root';
  $db_settings['db_pwd'] = 'dummypass';
  
  try {
      $DB_Handle = new PDO($db_settings['dns'],$db_settings['db_user'],$db_settings['db_pwd'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
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
   
   if (validate_password($user_data['pwd'], $user_hash)){
       header('Location: dashboard.php');
   }else{
       header('Location: ../html/login.html?login=false');
   };
?>
