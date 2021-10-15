<?php

$dbCon = getDbConnection();

/**
 * @param array $options
 * @return PDO
 */
function getDbConnection(array $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]): PDO
{
    $dbConnection = new PDO('mysql:host=localhost;dbname=tempus_fugit', 'root', '', $options);
    $dbConnection->query('SET NAMES utf8');

    return $dbConnection;
}