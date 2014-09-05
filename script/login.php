<?php
  //echo $_POST['user_mail'] . ':' . $_POST['pwd'];
  $user_data['email'] = $_POST['user_mail'];
  $user_data['pwd'] = $_POST['pwd'];
 //This is just a mockup for a real DB check 
  $valid_users = array (
	'admin' => 'agustinrecalde128@gmail.com',
	'user' => 'user@sender.com'
  );
  if (!in_array($user_data['email'],$valid_users,true))
  {
	header("Location: ../html/login_error");
  }
?>
