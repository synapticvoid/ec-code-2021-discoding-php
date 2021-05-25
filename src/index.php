<?php

date_default_timezone_set('Europe/Paris');

require_once('controller/conversationController.php');
require_once('controller/friendController.php');
require_once('controller/loginController.php');

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'login':
            if (!empty($_POST)) {
                login($_POST);
            } else {
                loginPage();
            }
            break;

        case 'logout':
            logout();
            break;

        case 'conversation':
            conversationPage();
            break;

        case 'friend':
            friendPage();
            break;
    }
} else {
    $user_id = $_SESSION['user_id'] ?? false;

    if ($user_id) {
        friendPage();
    } else {
        loginPage();
    }
}
