<?php

require_once("main.php");

// almacenando datos
$user_name = clean_string($_POST['user_name']);
$user_surname = clean_string($_POST['user_surname']);

$user_username = clean_string($_POST['user_username']);
$user_email = clean_string($_POST['user_email']);

$user_password = clean_string($_POST['user_password']);
$user_password_confirm = clean_string($_POST['user_password_confirm']);

// verificando datos obligatorios (2da verificacion, la otra es del frontend, que se puede editar)
if($user_name=="" || $user_surname="" || $user_username=="" || $user_email=="" || $user_password=="" || $user_password_confirm==""){
    echo '
        <div class="notification is-danger is-light">
            <strong> There was an error.</strong><br>
            You had not completed the required information.
        </div>
    ';
    exit();
}

?>