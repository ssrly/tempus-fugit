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
            updateTime($dbCon, (int)convertString($_POST['id']));
            break;
        case 'delete' :
            deleteTime($dbCon, (int)convertString($_POST['id']));
            break;
    }
    redirect('/index.php?page=times&uid=' . $_POST['user_id']);
}

/**
 * @param array $time
 * @return string (JSON)
 */
function getTimeJson(array $time): string
{
    $json = json_encode([
        'id' => $time['id'] ?? '',
        'startDate' => getDateString($time['start_at']),
        'startTime' => getTimeString($time['start_at']),
        'endDate' => getDateString($time['end_at']),
        'endTime' => getTimeString($time['end_at']),
        'duration' => getDurationString($time['duration']),
        'description' => convertString($time['description']),
        'userId' => convertString($time['user_id']),
        'createdAt' => formatDate($time['created_at'] ?? ''),
        'updatedAt' => formatDate($time['updated_at'] ?? ''),
    ]);

    return convertString($json);
}

/**
 * @param string $datetime
 * @return string
 */
function getDateString(string $datetime): string
{
    return explode(' ', $datetime)[0];
}

/**
 * @param string $datetime
 * @return string
 */
function getTimeString(string $datetime): string
{
    return explode(' ', $datetime)[1];
}

/**
 * @param string $date
 * @param string $time
 * @return string
 */
function getFormDatetimeString(string $date, string $time): string
{
    if (count(explode(':', $time)) > 2) {
        $tmp = explode(':', $time);
        $time = $tmp[0] . ':' . $tmp[1];
    }
    $datetime = DateTime::createFromFormat('Y-m-d H:i', $date . ' ' . $time);
    return $datetime->format('Y-m-d H:i');
}

/**
 * @param string $start
 * @param string $end
 * @return int
 */
function getDurationInSeconds(string $start, string $end): int
{
    $start = new DateTime($start);
    $end = new DateTime($end);

    return $end->getTimestamp() - $start->getTimestamp();
}

/**
 * @param int $duration
 * @return string
 */
function getDurationString(int $duration): string
{
    return gmdate('H:i', $duration);
}

/**
 * @return array
 * @throws Exception
 */
function getTimeFormData(): array
{
    $startAt = getFormDatetimeString($_POST['start_date'], $_POST['start_time']);
    $endAt = getFormDatetimeString($_POST['end_date'], $_POST['end_time']);

    return [
        'startAt' => $startAt,
        'endAt' => $endAt,
        'duration' => getDurationInSeconds($startAt, $endAt),
        'description' => convertString($_POST['description']),
        'userId' => (int)convertString($_POST['user_id'])
    ];
}

/**
 * @param PDO $dbCon
 */
function createTime(PDO $dbCon)
{
    $values = getTimeFormData();
    $sql = 'INSERT INTO `times`(start_at,end_at,duration,description,user_id,created_at)
            VALUES(?,?,?,?,?,NOW())';
    $statement = $dbCon->prepare($sql);
    $statement->execute(
        [$values['startAt'], $values['endAt'], $values['duration'], $values['description'], $values['userId']]
    );
}

/**
 * @param PDO $dbCon
 * @param int $id
 */
function updateTime(PDO $dbCon, int $id)
{
    $values = getTimeFormData();
    $sql = 'UPDATE `times` 
                SET start_at = ?,end_at = ?,duration = ?,description = ?,user_id = ?,updated_at = NOW() 
                WHERE `id` = ?';
    $statement = $dbCon->prepare($sql);
    $statement->execute(
        [$values['startAt'], $values['endAt'], $values['duration'], $values['description'], $values['userId'], $id]
    );
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