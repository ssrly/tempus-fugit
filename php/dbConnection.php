<?php

$optionen = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
];
$db = new PDO('mysql:host=localhost;dbname=tempus_fugit','root','',$optionen);

$db->query('SET NAMES utf8');