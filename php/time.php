<?php

require_once 'dbConnection.php';
require_once 'functions.php';

/** @var $dbCon ./dbConnection.php */

if (isset($_POST['submit'])) {
    switch (convertString($_POST['do'])) {
        case 'create':
            createTime($dbCon);
            break;
        case 'update' :
            updateTime($dbCon, convertString($_POST['id']));
            break;
        case 'delete' :
            deleteTime($dbCon, convertString($_POST['id']));
            break;
    }
    redirect('/index.php?page=times');
}

/**
 * @param array $group
 * @return string (JSON)
 */
function getTimeJson(array $time): string
{
    $json = json_encode([
        'time' => $time['id'],
        'startAt' => formatDate($time['start_at'] ?? ''),
        'endAt' => formatDate($time['end_at'] ?? ''),
        'duration' => $time['duration'],
        'description' => $time['description'],
        'userId' => $time['user_id'],
        'createdAt' => formatDate($time['created_at'] ?? ''),
        'updatedAt' => formatDate($time['updated_at'] ?? ''),
    ]);

    return convertString($json);
}

/**
 * @return array
 */
function getTimeFormData(): array
{
    return [
        'name' => convertString($_POST['name']),
        'description' => convertString($_POST['description']),
        'isAdmin' => !empty($_POST['is_admin']) ? 1 : 0
    ];
}

/**
 * @param PDO $dbCon
 * @param array|string[] $rowWithValue
 * @return bool
 */
function groupRecordCreatable(PDO $dbCon, array $rowWithValue = ['name' => 'admin']): bool
{
    foreach ($rowWithValue as $row => $value) {
        $sql = 'SELECT * FROM `times` WHERE ? = ?';
        $statement = $dbCon->prepare($sql);
        $statement->execute([$row, $value]);
        if ($statement->fetch()) {
            $_SESSION['msg'] = 'A record "' . $value . '" already exists.';
            return false;
        }
    }

    return true;
}

/**
 * @param PDO $dbCon
 */
function createTime(PDO $dbCon)
{
    $values = getTimeFormData();
    if (groupRecordCreatable($dbCon, ['name' => $values['name']])) {
        $sql = 'INSERT INTO `times`(name,description,is_admin,created_at)
            VALUES(?,?,?,NOW())';
        $statement = $dbCon->prepare($sql);
        $statement->execute([$values['name'], $values['description'], $values['isAdmin']]);
    }
}

/**
 * @param PDO $dbCon
 * @param int $id
 */
function updateTime(PDO $dbCon, int $id)
{
    $values = getTimeFormData();
    if (groupRecordCreatable($dbCon, ['name' => $values['name']])) {
        $sql = 'UPDATE `times` SET name = ?,description = ?,is_admin = ?, updated_at = NOW()
            WHERE id = ?';
        $statement = $dbCon->prepare($sql);
        $statement->execute([$values['name'], $values['description'], $values['isAdmin'], $id]);
    }
}

/**
 * @param PDO $dbCon
 * @param int $id
 */
function deleteTime(PDO $dbCon, int $id)
{
    $sql = 'DELETE FROM `times` WHERE id = ?';
    $statement = $dbCon->prepare($sql);
    $statement->execute([$id]);
}

/**
 * @param PDO $dbCon
 * @param int $id
 * @return array
 */
function getTime(PDO $dbCon, int $id): array
{
    $sql = 'SELECT * FROM `times` WHERE id = ?';
    $statement = $dbCon->query($sql);
    $statement->execute([$id]);

    return $statement->fetch();
}

/**
 * @param PDO $dbCon
 * @return array
 */
function getAllTimes(PDO $dbCon): array
{
    $sql = 'SELECT * FROM `times`';
    $statement = $dbCon->query($sql);

    return $statement->fetchAll();
}

/**
 * @param PDO $dbCon
 * @param int $userId
 * @return array
 */
function getAllTimesByUser(PDO $dbCon, int $userId): array
{
    $sql = "SELECT * FROM times WHERE user_id = $userId";
    $statement = $dbCon->query($sql);
    $statement->execute();

    return $statement->fetchAll();
}