<?php

session_start();
require_once 'dbConnection.php';
require_once 'functions.php';

$name = prepareInput($_POST['name']);
$firstName = prepareInput($_POST['firstname']);
$description = prepareInput($_POST['description']);
$mail = prepareInput($_POST['mail']);
$userNumber = prepareInput($_POST['usernumber']);
$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

$sql = 'SELECT * FROM users WHERE mail = ?';
/**@var $dbCon ./dbConnection.php * */
$statement = $dbCon->prepare($sql);
$statement->execute([$mail]);
$user = $statement->fetch();

if (!$user) {
    $sql = 'INSERT INTO users(name,firstname,description,mail,user_number,pwd,created_at) 
            VALUES(?,?,?,?,?,?,`NOW`())';
    /**@var $dbCon ./dbConnection.php * */
    $statement = $dbCon->prepare($sql);
    $statement->execute([$name, $firstName, $description, $mail, $userNumber, $pwd]);
    $_SESSION['msg'] = 'Successfully saved.';
} else {
    $_SESSION['msg'] = 'Your E-Mail is already taken. Try again. Did you forget your password? Please contact an admin.';
}

redirect('../index.php');