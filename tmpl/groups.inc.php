<?php

$sql = "SELECT * FROM groups";

$statement = $db->query($sql);
$groups = $statement->fetchAll();
$count = $statement->rowCount();
?>

<div class="container">
    <section class="info-text">
        <h2>Groups - Tempus Fugit</h2>
        <p>In this view, all existing Groups are shown. Just for information puroses.</p>
    </section>

    <section>
        <table>
            <thead>
                <tr>
                    <th>Groupname</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($groups as $group): ?>
                <tr>
                    <td><?= $group['name']; ?></td>
                    <td><?= $group['description']; ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>
</div>