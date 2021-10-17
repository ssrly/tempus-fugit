<?php

require_once 'dbConnection.php';
require_once 'functions.php';

/** @var $dbCon ./dbConnection.php */

if (isset($_POST['submit'])) {
    switch (prepareInput($_POST['do'])) {
        case 'create':
            createGroup($dbCon);
            break;
        case 'update' :
            updateGroup($dbCon, prepareInput($_POST['id']));
            break;
        case 'delete' :
            deleteGroup($dbCon, prepareInput($_POST['id']));
            break;
    }
    redirect('/index.php?page=groups');
} else {
    // get group data by id
}

/**
 * @param array $group
 * @return string (JSON)
 */
function getGroupJson(array $group): string
{
    $json = json_encode([
        'groupId' => $group['id'],
        'name' => $group['name'],
        'description' => $group['description'],
        'isAdmin' => $group['is_admin'],
        'createdAt' => formatDate($group['created_at'] ?? ''),
        'updatedAt' => formatDate($group['updated_at'] ?? ''),
    ]);

    return prepareInput($json);
}

/**
 * @return array
 */
function getGroupFormData(): array
{
    return [
        'name' => prepareInput($_POST['name']),
        'description' => prepareInput($_POST['description']),
        'isAdmin' => !empty($_POST['is_admin']) ? 1 : 0
    ];
}

/**
 * @param PDO $dbCon
 */
function createGroup(PDO $dbCon)
{
    $sql = 'INSERT INTO `groups`(name,description,is_admin,created_at) 
            VALUES(?,?,?,NOW())';
    $statement = $dbCon->prepare($sql);
    $values = getGroupFormData();
    $statement->execute([$values['name'], $values['description'], $values['isAdmin']]);
}

/**
 * @param PDO $dbCon
 * @param int $id
 */
function updateGroup(PDO $dbCon, int $id)
{
    $sql = 'UPDATE `groups` SET name = ?,description = ?,is_admin = ?, created_at = NOW()
            WHERE id = ?';
    $statement = $dbCon->prepare($sql);
    $values = getGroupFormData();
    $statement->execute([$values['name'], $values['description'], $values['isAdmin'], $id]);
}

/**
 * @param PDO $dbCon
 * @param int $id
 */
function deleteGroup(PDO $dbCon, int $id)
{
    $sql = "DELETE FROM `groups` WHERE id = $id";
    $statement = $dbCon->prepare($sql);
    $statement->execute();
}

/**
 * @param PDO $dbCon
 * @param int $id
 * @return array
 */
function getGroup(PDO $dbCon, int $id): array
{
    $sql = "SELECT * FROM `groups` WHERE id = ?";
    $statement = $dbCon->query($sql);
    $statement->execute([$id]);

    return $statement->fetch();
}

/**
 * @param PDO $dbCon
 * @return array
 */
function getAllGroups(PDO $dbCon): array
{
    $sql = "SELECT * FROM `groups`";
    $statement = $dbCon->query($sql);

    return $statement->fetchAll();
}