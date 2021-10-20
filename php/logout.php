<?php

session_start();
require_once 'functions.php';

logout();
$_SESSION['msg'] = 'Logged out.';

session_destroy();
redirect();