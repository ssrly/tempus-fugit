<?php

$sql = "SELECT u.*, g.name AS group_names FROM users u
            JOIN user_group ON u.id = user_group.user_id
            JOIN groups g   ON user_group.group_id = g.id";

/** @var $dbCon ./../dbConnection.php */
$statement = $dbCon->query($sql);
$users = $statement->fetchAll();
$count = $statement->rowCount();

for ($i = 0; $i < $count; $i++) {
    for ($j = 0; $j < $count; $j++) {
        $hasGroup = !is_bool(strpos($users[$i]['group_names'], $users[$j]['group_names']));
        if ($users[$i]['id'] === $users[$j]['id'] && !$hasGroup) {
            $users[$i]['group_names'] .= ', ' . $users[$j]['group_names'];
            array_splice($users, $j);
            $count--;
        }
    }
}

// debugIterations($users);
?>

<div class="container">
    <section class="info-text">
        <h2>Users - Tempus Fugit</h2>
        <p>This view shows saved user information.</p>
        <p>As an admin all existing users are shown. As an user only your data will be provided.</p>
        <p>As an admin you can select an user an go to his / her times. Please be careful!</p>
    </section>

    <section>
        <button id="btn-add-user" class="btn btn-success">
            Add User
        </button>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Firstname</th>
                <th>Mail</th>
                <th>User-Number</th>
                <th>Groups</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['firstname']; ?></td>
                    <td><?= $user['mail']; ?></td>
                    <td><?= $user['user_number']; ?></td>
                    <td><?= $user['group_names']; ?></td>
                    <td><?= formatDate($user['created_at']); ?></td>
                    <td><?= formatDate($user['updated_at']); ?></td>
                </tr>
            <?php
            endforeach ?>
            </tbody>
        </table>
    </section>

</div>