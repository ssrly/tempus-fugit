<?php

require_once './var/debug.php';
require_once './php/dbConnection.php';

$page = $_GET["page"] ?? '';
$tmpl = './tmpl/error.inc.php';


switch($page) {
    case '':
    case 'home': $tmpl = './tmpl/home.inc.php'; break;
    case 'docu': $tmpl = './tmpl/docu.inc.php'; break;
    default: break;
}

require_once './tmpl/base.inc.php';