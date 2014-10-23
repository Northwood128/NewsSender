<?php
    require 'passwordHash.php';
    require 'validation.php';
	require 'Config.class.php';
    
	$loader = new ConfigLoader();
	$settings = $loader->getDbSettings();
	$dns = "mysql:host=" . $settings['db']['host'] . ";dbname=NS_users";
    
    //This data comes from config.html
    $new_user_data['new_user_mail'] = $_POST['new_user_mail'];
    $new_user_data['new_user_name'] = $_POST['new_user_name'];
    $new_user_data['new_user_password'] = $_POST['new_user_password'];
    echo $new_user_data['new_user_password']."<br>";
    $new_user_data['new_user_class'] = $_POST['new_user_class'];
    
    //This functions validate the inputs matching the value against RegExp and other logical rules
    validate_input_email($new_user_data['new_user_mail']);
    validate_input_name($new_user_data['new_user_name']);
    validate_input_password($new_user_data['new_user_password']);
    validate_input_class($new_user_data['new_user_class']);
    
    $correct_hash = explode(':', create_hash($new_user_data['new_user_password']));
    
    try {
        $DB_Handle = new PDO($dns,$$settings['db']['user'],$$settings['db']['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    } catch (PDOException $e) {
        echo 'Error: ' , $e->getMessage(), '\n';
    }
    
    $sql_users = "INSERT INTO users (username, name, class) VALUES (\"" . $new_user_data['new_user_mail'] . "\",\"" . $new_user_data['new_user_name'] . "\",\"" . $new_user_data['new_user_class'] . "\")";
    //echo $sql_users;
    $affected_rows = $DB_Handle->exec($sql_users);
    //I'll add a redirect to a nice error page eventually

    if ($affected_rows === 0) {
        header('location: ../html/fail.html');
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