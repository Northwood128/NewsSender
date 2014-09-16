<?php
    require 'passwordHash.php';
    require 'validation.php';
    //This must be extracted safely from config file. This is just a mock
    $db_settings['dns'] = 'mysql:host=localhost;dbname=NS_users';
    $db_settings['db_user'] = 'root';
    $db_settings['db_pwd'] = '//*praga800dc*';
    
    //This data comes from nuevo_usuario.html
    $new_user_data['new_user_email'] = 'agustinrecalde128@gmail.com';//$_POST['new_user_email'];
    $new_user_data['new_user_name'] = 'Agustin'; //4_POST['new_user_name'];
    $new_user_data['new_user_password'] = 'admin'; //$_POST['new_user_password'];
    $new_user_data['new_user_class'] = 'admin'; //$_POST['new_user_class'];
    
    //This functions validate the inputs matching the value against RegExp and other logical rules
    validate_input_email($new_user_data['new_user_email']);
    validate_input_name($new_user_data['new_user_name']);
    validate_input_password($new_user_data['new_user_password']);
    validate_input_class($new_user_data['new_user_class']);
    
    $correct_hash = explode(':', create_hash($new_user_data['new_user_password']));
    
    try {
        $DB_Handle = new PDO($db_settings['dns'],$db_settings['db_user'],$db_settings['db_pwd'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    } catch (PDOException $e) {
        echo 'Error: ' , $e->getMessage(), '\n';
    }
    
    $sql_users = "INSERT INTO users (username, name, class) VALUES (\"" . $new_user_data['new_user_email'] . "\",\"" . $new_user_data['new_user_name'] . "\",\"" . $new_user_data['new_user_class'] . "\")";
    //echo $sql_users;
    @$affected_rows = $DB_Handle->exec($sql_users);
    //I'll add a redirect to a nice error page eventually

    if ($affected_rows === 0) {
        header('location: ../html/fail.html');
    } else {
        $uid = $DB_Handle->query("SELECT uid FROM users WHERE username=\"" . $new_user_data['new_user_email'] . "\"");
        $result = $uid->fetchObject();
        $sql_hash = "INSERT INTO hashes (uid, hash) VALUES (\"" . $result->uid . "\",\"" . $correct_hash[HASH_PBKDF2_INDEX] . "\")";
        $affected_rows = $DB_Handle->exec($sql_hash);
        $sql_salt = "INSERT INTO salt (uid, salt) VALUES (\"" . $result->uid . "\",\"" . $correct_hash[HASH_SALT_INDEX] . "\")";
        $affected_rows = $DB_Handle->exec($sql_salt);
    }
?>