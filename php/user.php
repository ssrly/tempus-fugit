<?php

require_once 'dbConnection.php';
require_once 'functions.php';

/** @var $dbCon ./dbConnection.php */

if (isset($_POST['submit'])) {
    switch (convertString($_POST['do'])) {
        case 'register':
            if (createUser($dbCon)) {
                redirect();
            }
            break;
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

    redirect('/index.php?page=' . $_GET['page'] ?? '');
}

/**
 * @param bool $success
 * @return string
 */
function getSuccessParam(bool $success): string
{
    return $success ? '&success=1' : '';
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
    $pwdChange = (!empty($_POST['pwd']) && $_POST['pwd'] === $_POST['pwd_repeat']);

    return [
        'id' => convertString($_POST['id']),
        'name' => convertString($_POST['name']),
        'firstname' => convertString($_POST['firstname']),
        'description' => convertString($_POST['description']),
        'email' => convertString($_POST['email']),
        'user_number' => convertString($_POST['user_number']),
        'pwd' => $pwdChange ? password_hash($_POST['pwd'], PASSWORD_DEFAULT) : '',
        'is_admin' => !isset($_POST['is_admin']) || empty($_POST['is_admin']) ? 0 : 1
    ];
}

/**
 * @param PDO $dbCon
 * @param array $values
 * @return bool
 */
function emailNotTaken(PDO $dbCon, array $values): bool
{
    $sql = "SELECT * FROM `users` WHERE email = ?";
    $statement = $dbCon->prepare($sql);
    $statement->execute([$values['email']]);
    $user = $statement->fetch();
    if (($user)) {
        $_SESSION['msg'] = 'A record "' . $values['email'] . '" already exists.';
        return false;
    }

    return true;
}

/**
 * @param PDO $dbCon
 * @param array $values
 * @return bool
 */
function userNumberNotTaken(PDO $dbCon, array $values): bool
{
    $sql = "SELECT * FROM `users` WHERE user_number = ?";
    $statement = $dbCon->prepare($sql);
    $statement->execute([$values['user_number']]);
    $user = $statement->fetch();
    if (($user)) {
        $_SESSION['msg'] = 'A record "' . $values['user_number'] . '" already exists.';
        return false;
    }

    return true;
}

/**
 * @param PDO $dbCon
 * @return bool
 */
function createUser(PDO $dbCon): bool
{
    $values = getUserFormData();
    if (emailNotTaken($dbCon, $values) && userNumberNotTaken($dbCon, $values)) {
        $sql = "INSERT INTO `users`(name,firstname,description,email,user_number,pwd,is_admin,created_at) 
            VALUES(?,?,?,?,?,?,?,NOW())";
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

        return true;
    }

    return false;
}

/**
 * @param PDO $dbCon
 * @param int $id
 */
function updateUser(PDO $dbCon, int $id)
{
    //I hate PDO
    //If I had more time, I would have written a shorter letter - Marcus Tullius Cicero, philosopher and statesman.
    $values = getUserFormData();
    if (!empty($values['pwd'])) {
        $sql = "UPDATE `users`
                SET name = ?,firstname = ?,description = ?,email = ?,user_number = ?,pwd = ?,is_admin = ?, updated_at = NOW()
                WHERE id = ?";
        $statement = $dbCon->prepare($sql);
        $statement->execute([
            $values['name'],
            $values['firstname'],
            $values['description'],
            $values['email'],
            $values['user_number'],
            $values['pwd'],
            $values['is_admin'],
            $id
        ]);
    } else {
        $sql = "UPDATE `users`
                SET name = ?,firstname = ?,description = ?,email = ?,user_number = ?,is_admin = ?, updated_at = NOW()
                WHERE id = ?";
        $statement = $dbCon->prepare($sql);
        $statement->execute([
            $values['name'],
            $values['firstname'],
            $values['description'],
            $values['email'],
            $values['user_number'],
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
    $sql = "DELETE FROM `users` WHERE id = ?";
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
    $sql = "SELECT * FROM `users`";
    $statement = $dbCon->query($sql);

    return $statement->fetchAll();
}

