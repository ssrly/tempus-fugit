<?php

$sql = "SELECT * FROM `groups`";

/** @var $dbCon ./../dbConnection.php */
$statement = $dbCon->query($sql);
$groups = $statement->fetchAll();
?>

<div class="container">
    <section class="info-text">
        <h2>Groups - Tempus Fugit</h2>
        <p>In this view, all existing Groups are shown. Just for information purposes.</p>
    </section>

    <section>
        <table>
            <thead>
            <tr>
                <th>Group-Name</th>
                <th>Description</th>
                <th>Admin Rights</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($groups as $group): ?>
                <tr>
                    <td><?= $group['name']; ?></td>
                    <td><?= $group['description']; ?></td>
                    <td><?= $group['is_admin'] ? 'Yes' : 'No'; ?></td>
                </tr>
            <?php
            endforeach ?>
            </tbody>
        </table>
    </section>
</div>