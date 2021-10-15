<?php

$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
];
$db = new PDO('mysql:host=localhost;dbname=tempus_fugit','root','',$options);

$db->query('SET NAMES utf8');


#TODO: remove
// $sql = 'SELECT * FROM times INNER JOIN users
//           ON times.user_id = users.id';

// $statement = $db->query($sql);
// $daten = $statement->fetchAll();
// $count = $statement->rowCount();

// debugIterations($daten);
// debug($count);