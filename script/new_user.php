<?php
    require 'passwordHash.php';
    require 'validation.php';
	require 'Config.class.php';
	require 'sanitization.php';
    
	$loader = new ConfigLoader("amazon");
	$settings = $loader->getDbSettings();
	$dns = "mysql:host=" . $settings['RDS']['endpoint'] . ";dbname=NS";
    
    //This data comes from config.html
    $new_user_data['new_user_mail'] = sanitize($_POST['new_user_mail']);
    $new_user_data['new_user_name'] = sanitize($_POST['new_user_name']);
    $new_user_data['new_user_password'] = sanitize($_POST['new_user_password']);
    $new_user_data['new_user_class'] = sanitize($_POST['new_user_class']);
	
	validate_input_email($new_user_data['new_user_mail']);
	validate_input_name($new_user_data['new_user_name']);
	validate_input_password($new_user_data['new_user_password']);
	validate_input_class($new_user_data['new_user_class']);
	
    $created_hash = create_hash($new_user_data['new_user_password']);
    $correct_hash = explode(':', $created_hash);
    
    try {
        $DB_Handle = new PDO($dns,$settings['RDS']['username'], $settings['RDS']['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    } catch (PDOException $e) {
        echo 'Error: ' , $e->getMessage(), '\n';//*******************This needs to be changed
    }
    
    $sql_users = "INSERT INTO users (username, name, class) VALUES (\"" . $new_user_data['new_user_mail'] . "\",\"" . $new_user_data['new_user_name'] . "\",\"" . $new_user_data['new_user_class'] . "\")";
    //echo $sql_users;
    $affected_rows = $DB_Handle->exec($sql_users);
    //I'll add a redirect to a nice error page eventually

    if ($affected_rows === 0) {
        header('Location: ../html/success.html');
    } else {
        $uid = $DB_Handle->query("SELECT uid FROM users WHERE username=\"" . $new_user_data['new_user_mail'] . "\"");
        $result = $uid->fetchObject();
        $sql_hash = "INSERT INTO hashes (uid, hash) VALUES (\"" . $result->uid . "\",\"" . $correct_hash[HASH_PBKDF2_INDEX] . "\")";
        $affected_rows = $DB_Handle->exec($sql_hash);
        $sql_salt = "INSERT INTO salt (uid, salt) VALUES (\"" . $result->uid . "\",\"" . $correct_hash[HASH_SALT_INDEX] . "\")";
        $affected_rows = $DB_Handle->exec($sql_salt);
        header('Location: ../html/success.html');
    }
?>