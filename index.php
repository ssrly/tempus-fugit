<?php

session_start();
require_once './php/functions.php';
require_once './php/dbConnection.php';

$page = $_GET["page"] ?? '';
$tmpl = './tmpl/error.inc.php';

//TODO: set dynamic
$_SESSION['user_id'] = 4;

if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

switch ($page) {
    case '':
    case 'home':
        $tmpl = './tmpl/home.inc.php';
        break;
    case 'users':
        $tmpl = './tmpl/users.inc.php';
        break;
    case 'times':
        $tmpl = './tmpl/times.inc.php';
        break;
    case 'groups':
        $tmpl = './tmpl/groups.inc.php';
        break;
    case 'impressum':
        $tmpl = './tmpl/impressum.inc.php';
        break;
    case 'setup':
        $tmpl = './tmpl/settings.inc.php';
        break;
    case 'docu':
        $tmpl = './tmpl/docu.inc.php';
        break;
    default:
        break;
}

require_once './tmpl/base.inc.php';
