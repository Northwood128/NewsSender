<?php

    require 'sanitization.php';
    //validation Functions
    function validate_input_email($email)
    {
        if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $email)){
            throw new Exception("Email invalido", 100);
        }
    }
    function validate_input_name($name)
    {
        if (!preg_match('/^[A-Za-z0-9_-]{3,16}$/', $name)){
            throw new Exception("El nombre de usuario solo puede contener de 3 a 16 caracteres entre A-Z, a-z, 0 al 9, _y -", 101);
        }
    }
    function validate_input_password($pass)
    {
        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(.{8,})$/', $pass)){
            throw new Exception("El password debe tener una longitud minima de 6 caracteres
                     y puede estar compuesto por caracteres de A-Z, a-z, 0 al 9 y simbolos(!\"#$%&/()=?¡)::$pass", 102);
        }
    }
    function validate_input_class($class)
    {
        if (!in_array($class, array('admin','user', 'guest'),true)){
            throw new Exception("Clase Invalida", 103);
        }
    }
   set_exception_handler('handle_exception');
   function handle_exception(Exception $e)
   {
	if ($e->getCode() == 100) {
   	   echo 'Exception Caught: ' . $e->getCode() .':'.$e->getMessage();
	}
	
	if ($e->getCode() == 101){
   	   echo 'Exception Caught: ' . $e->getCode() .': '.$e->getMessage();
	}
	if ($e->getCode() == 102){
   	   echo 'Exception Caught: ' . $e->getCode() .': '. $e->getMessage();
	}
	if ($e->getCode() == 103){
   	   echo 'Exception Caught: ' . $e->getCode() .': '.$e->getMessage();
	}
   }
?>
