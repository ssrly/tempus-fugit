<?php

$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
];
$db = new PDO('mysql:host=localhost;dbname=tempus_fugit','root','',$options);

$db->query('SET NAMES utf8');