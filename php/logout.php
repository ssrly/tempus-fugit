<?php

session_start();
require_once 'functions.php';

logout();
$_SESSION['msg'] = 'Logged out.';

//Weiterleitung zu index.php
session_destroy();
redirect('../index.php');