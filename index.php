<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once './php/functions.php';
require_once './php/dbConnection.php';

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
}

if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

$page = $_GET["page"] ?? '';

setcookie('logged_in', false);

switch ($page) {
    case '':
    case 'home':
        $tmpl = './tmpl/home.inc.php';
        break;
    case 'impressum':
        $tmpl = './tmpl/impressum.inc.php';
        break;
//    case 'docu':
//        $tmpl = './tmpl/docu.inc.php';
//        break;
    case 'registration':
        $tmpl = './tmpl/registration.inc.php';
        break;
    default:
        $tmpl = './tmpl/error.inc.php';
        break;
}
if (isLoggedIn()) {
    setcookie('logged_in', true);
    switch ($page) {
        case 'times':
            $tmpl = './tmpl/times.inc.php';
            break;
        case 'settings':
            $tmpl = './tmpl/settings.inc.php';
            break;
        default:
            break;
    }
    if (isAdmin()) {
        switch ($page) {
            case 'users':
                $tmpl = './tmpl/users.inc.php';
                break;
            default:
                break;
        }
    }
}


require_once './tmpl/base.inc.php';
