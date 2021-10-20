<?php

session_start();
require_once 'dbConnection.php';
require_once 'functions.php';

$email = convertString($_POST['email']);
$pwd = convertString($_POST['pwd']);

if (!empty($_POST) && $_POST['csrf_token'] === $_SESSION['token']) {
    $sql = 'SELECT * FROM users WHERE email = ?';

    /** @var $dbCon ./dbConnection.php * */
    $statement = $dbCon->prepare($sql);
    $statement->execute([$email]);
    $user = $statement->fetch();

    if ($user && password_verify($pwd, $user['pwd'])) {
        login($user['id'], $user['is_admin']);
    } else {
        $_SESSION['msg'] = 'Wrong login. Try again. Did you forget your password? Please contact an admin.';
    }
    //---------------
}
redirect('/index.php');