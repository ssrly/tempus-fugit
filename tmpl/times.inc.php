<?php

$sql = "SELECT * FROM times
        ORDER BY start_at";

/** @var $dbCon ./../dbConnection.php */
$statement = $dbCon->query($sql);
$times = $statement->fetchAll();
?>

<div class="container">
    <section class="info-text">
        <h2>Times - Tempus Fugit</h2>
        <p>In this view, all existing times by your time tracking are shown in form of a list.</p>
        <p>New times can be created and existing ones can be reviewed, updated or deleted by the you.</p>
        <p>As admin you can reach this view by selecting an user in the users view and administrate his or her times. As
            an user
            only your own times are shown.</p>
    </section>

    <section>
        <table>
            <thead>
            <tr>
                <th>Start</th>
                <th>End</th>
                <th>Duration</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($times as $time): ?>
                <tr>
                    <td><?= formatDate($time['start_at']); ?></td>
                    <td><?= formatDate($time['end_at']); ?></td>
                    <td><?= $time['duration']; ?></td>
                    <td><?= $time['description']; ?></td>
                </tr>
            <?php
            endforeach ?>
            </tbody>
        </table>
    </section>
</div>