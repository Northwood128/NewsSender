<?php
    require 'passwordHash.php';
    //This must be extracted safely from config file. This is just a mock
    $db_settings['dns'] = 'mysql:host=localhost;dbname=NS_users';
    $db_settings['db_user'] = 'root';
    $db_settings['db_pwd'] = '//*praga800dc*';
    
    //This data comes from nuevo_usuario.html
    $new_user_data['new_user_email'] = 'agustinrecalde128@gmail.com';//$_POST['new_user_email'];
    $new_user_data['new_user_name'] = 'Agustin'; //4_POST['new_user_name'];
    $new_user_data['new_user_password'] = 'admin'; //$_POST['new_user_password'];
    $new_user_data['class'] = 'admin'; //$_POST['new_user_class'];
    
    $correct_hash = explode(':', create_hash($new_user_data['new_user_password']));
    
    try {
        $DB_Handle = new PDO($db_settings['dns'],$db_settings['db_user'],$db_settings['db_pwd'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    } catch (PDOException $e) {
      echo 'Error: ' , $e->getMessage(), '\n';
    }
    
    $sql_users = 'INSERT INTO users (username, name, class) VALUES (:new_user_email, :new_user_name, :new_user_class)';
    $stmt_users = $DB_handle->prepare($sql_users);
    $stmt_users->bindParam(':new_user_email',$new_user_data['new_user_email']);
    $stmt_users->bindParam(':new_user_name',$new_user_data['new_user_name']);
    $stmt_users->bindParam(':new_user_class',$new_user_data['new_user_class']);
    
?>