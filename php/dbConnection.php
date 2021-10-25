<?php

$dbCon = createDbConnection();

/**
 * @param array $options
 * @return PDO
 */
function createDbConnection(array $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]): PDO
{
    $dbConnection = new PDO('mysql:host=localhost;dbname=wbsprojekt', 'root', '', $options);
    $dbConnection->query('SET NAMES utf8');

    return $dbConnection;
}