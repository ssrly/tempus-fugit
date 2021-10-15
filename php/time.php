<?php

session_start();
require_once 'bdConnection.inc.php';
require_once 'functions.inc.php';

if (isset($_POST['login'])) {
//login
} else if (isset($_POST['register'])) {
//register
}

//auf die Werte der Felder in form zugreifen
// name="nn", name="mail", usw...
$nn = bereinige($_POST['nn']);
$mail = bereinige($_POST['mail']);
$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);


$motto = bereinige($_POST['motto']) ?? '';
$ueber = bereinige($_POST['ueber']) ?? '';

//++++++++++++++++++++++++++++++++++++++++++++++++++++
//erstmal prüfen, ob die E-Mail schon in der DB existiert?
$mailEindeutig = 'SELECT * FROM users WHERE email = ?';
$statement = $db->prepare($mailEindeutig);
$statement->execute([$mail]);
$user = $statement->fetch();

if(!($user))
{
  //E-Mail ist eindeutig, insert soll gehen
  //E-Mail existiert nicht ei 2. mal
  $sql = 'INSERT INTO users(name,email,passwort,motto,ueber_mich,created_at) 
                      VALUES(?,?,?,?,?, NOW())';
  $statement = $db->prepare($sql);
  $statement->execute([$nn,$mail,$pwd,$motto,$ueber]);
  

  $_SESSION['meldung'] = 'Registrierung erfolgreich, Bitte sich einloggen.';
  //header('Location: ../index.php');
  redirect('../index.php');
} 
else {
  //E-Mail existiert schon, kein insert
  $_SESSION['meldung'] = 'Die E-Mail existiert!<br />Bitte andere E-Mail eingeben';
  //header('Location: ../index.php?page=neu');
  redirect('../index.php?page=neu');
}