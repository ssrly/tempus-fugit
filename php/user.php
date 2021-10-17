<?php

session_start();
require_once 'dbConnection.php';
require_once 'functions.php';

$name = convertString($_POST['name']);
$firstName = convertString($_POST['firstname']);
$description = convertString($_POST['description']);
$mail = convertString($_POST['mail']);
$userNumber = convertString($_POST['usernumber']);
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