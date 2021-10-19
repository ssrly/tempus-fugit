<?php

require_once 'dbConnection.php';
require_once 'functions.php';

/** @var $dbCon ./dbConnection.php */

if (isset($_POST['submit'])) {
    switch (convertString($_POST['do'])) {
        case 'create':
            createUser($dbCon);
            break;
        case 'update' :
            updateUser($dbCon, (int)convertString($_POST['id']));
            break;
        case 'delete' :
            deleteUser($dbCon, (int)convertString($_POST['id']));
            break;
    }
    redirect('/index.php?page=users');
}

/**
 * @param array $user
 * @return string (JSON)
 */
function getUserJson(array $user): string
{
    $json = json_encode([
        'id' => $user['id'],
        'name' => $user['name'],
        'firstname' => $user['firstname'],
        'description' => $user['description'],
        'email' => $user['email'],
        'userNumber' => $user['user_number'],
        'isAdmin' => $user['is_admin'],
        'createdAt' => formatDate($user['created_at'] ?? ''),
        'updatedAt' => formatDate($user['updated_at'] ?? ''),
    ]);

    return convertString($json);
}

/**
 * @return array
 */
function getUserFormData(): array
{
    return [
        'name' => convertString($_POST['name']),
        'firstname' => convertString($_POST['firstname']),
        'description' => convertString($_POST['description']),
        'email' => convertString($_POST['email']),
        'user_number' => convertString($_POST['user_number']),
        'pwd' => password_hash($_POST['pwd'], PASSWORD_DEFAULT),
        'is_admin' => !empty($_POST['is_admin']) ? 1 : 0
    ];
}

/**
 * @param PDO $dbCon
 * @param array|string[] $rowWithValue
 * @return bool
 */
function userRecordCreatable(PDO $dbCon, array $rowWithValue = ['email' => '']): bool
{
    foreach ($rowWithValue as $row => $value) {
        $sql = "SELECT * FROM `users` WHERE $row = $value";
        $statement = $dbCon->prepare($sql);
        $statement->execute();
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
function createUser(PDO $dbCon)
{
    $values = getUserFormData();
    if (userRecordCreatable($dbCon, ['email' => $values['email']])) {
        $sql = 'INSERT INTO `users`(name,firstname,description,email,user_number,pwd,is_admin,created_at) 
            VALUES(?,?,?,?,?,?,?,NOW())';
        $statement = $dbCon->prepare($sql);
        $statement->execute(
            [
                $values['name'],
                $values['firstname'],
                $values['description'],
                $values['email'],
                $values['user_number'],
                $values['pwd'],
                $values['is_admin']
            ]
        );
    }
}

/**
 * @param PDO $dbCon
 * @param int $id
 */
function updateUser(PDO $dbCon, int $id)
{
    //TODO: password function
    $values = getUserFormData();
    if (userRecordCreatable($dbCon, ['email' => $values['email']])) {
        $sql = 'UPDATE `users` 
                SET name = ?,firstname = ?,description = ?,email = ?,user_number = ?,/**pwd = ?,**/is_admin = ?, updated_at = NOW()
                WHERE id = ?';
        $statement = $dbCon->prepare($sql);
        $statement->execute([
            $values['name'],
            $values['firstname'],
            $values['description'],
            $values['email'],
            $values['user_number'],
//            $values['pwd'],
            $values['is_admin'],
            $id
        ]);
    }
}

/**
 * @param PDO $dbCon
 * @param int $id
 */
function deleteUser(PDO $dbCon, int $id)
{
    $sql = 'DELETE FROM `users` WHERE id = ?';
    $statement = $dbCon->prepare($sql);
    $statement->execute([$id]);
}

/**
 * @param PDO $dbCon
 * @param int $id
 * @return array
 */
function getUser(PDO $dbCon, int $id): array
{
    $sql = "SELECT * FROM `users` WHERE id = $id";
    $statement = $dbCon->query($sql);
    $statement->execute();

    return $statement->fetch();
}

/**
 * @param PDO $dbCon
 * @return array
 */
function getAllUsers(PDO $dbCon): array
{
    $sql = 'SELECT * FROM `users`';
    $statement = $dbCon->query($sql);

    return $statement->fetchAll();
}

