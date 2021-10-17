<?php

session_start();
require_once 'dbConnection.php';
require_once 'functions.php';

//$mail = convertString($_POST['mail']);
//$pwd = convertString($_POST['pwd']);
////----------------------------------
//
//if ($_SESSION['code'] !== $_POST['cap']) {
//    $_SESSION['msg'] = 'Zeichen sind falsch';
//    redirect('../index.php');
//} else {
//    if (!empty($_POST) && $_POST['csrf_token'] === $_SESSION['token']) {
//        $sql = 'SELECT * FROM users WHERE mail = ?';
//        /**@var $dbCon ./dbConnection.php * */
//        $statement = $dbCon->prepare($sql);
//        $statement->execute([$mail]);
//        $user = $statement->fetch();
//        if ($user && password_verify($pwd, $user['pwd'])) {
//            //$_SESSION['meldung'] = 'Alles gut';
//            /*
//              function loggeEin($mail, $benutzername, $id) {
//                $_SESSION['eingeloggt'] = $mail;
//                $_SESSION['eingeloggt_user'] = $benutzername;
//                $_SESSION['id'] = $id;
//              }
//            */
//            // Wenn ja (wenn die Daten übereinstimmen), logge den Benutzer ein
//            //daten in session speichern
//            login($user['mail'], $user['id']);
//        } else {
//            $_SESSION['msg'] = 'Wrong login. Try again. Did you forget your password? Please contact an admin.';
//        }
//        //---------------
//    }
//    redirect('../index.php');
//}