<?php
    require 'sanitization.php';
    //validation Functions
    function validate_input_email(String $email)
    {
        if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $email)){
            throw new Exception("Email invalido", 001);
        }
    }
    function validate_input_name(String $name)
    {
        if (!preg_match('/^[a-z0-9_-]{3,16}$/', $name)){
            throw new Exception("El nombre de usuario solo puede contener de 3 a 16 caracteres entre A-Z, a-z, 0 al 9, _y -", 002);
        }
        return sanitize($name);
    }
    function validate_input_password(String $pass)
    {
        if (!preg_match('/^[a-z0-9_-]{6,18}$/', $pass)){
            throw new Exception("El password debe tener una longitud de entre 6 a 18 caracteres y puede estar compuesto por caracteres de A-Z, a-z, 0 al 9 y -", 003);
        }
    }
    function validate_input_class(String $class)
    {
        if (!in_array($class, array('admin','user', 'guest'),true)){
            throw new Exception("Clase Invalida", 004);
        }
    }
?>