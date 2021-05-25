<?php

session_start();

require_once('model/user.php');

/****************************
 * ----- LOAD LOGIN PAGE -----
 ****************************/

function loginPage()
{
    $user = new stdClass();
    $user->id = $_SESSION['user_id'] ?? false;
    require('view/loginView.php');
}

/***************************
 * ----- LOGIN FUNCTION -----
 ***************************/

function login($post)
{

    $email = $post['email'];
    $password = $post['password'];
    $user_data = User::getUserByCredentials($email, $password);

    if ($user_data == null) {
        $error_msg = "Email ou mot de passe incorrect";
        require('view/loginView.php');
        return;
    }

    // Set session
    $_SESSION['user_id'] = $user_data['id'];
    $user_id = $_SESSION['user_id'] ?? false;
    header('location: index.php ');
}

/****************************
 * ----- LOGOUT FUNCTION -----
 ****************************/

function logout()
{
    $_SESSION = array();
    session_destroy();

    header('location: index.php');
}
