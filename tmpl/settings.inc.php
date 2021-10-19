<?php

require_once './php/user.php';

/** @var $dbCon ./../php/dbConnection.php */
$user = getUser($dbCon, $_SESSION['user_id']);
?>

<div class="container">
    <section class="info-text">
        <h2>Setup - Tempus Fugit</h2>
        <p>This view shows your saved user informations.</p>
    </section>

    <section>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Firstname</th>
                <th>E-Mail</th>
                <th>User-Number</th>
                <th>Is Admin</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $dbRecordJson = getUserJson($user); ?>
            <tr class="tr-table time-tr-table" data-dbrecord="<?= $dbRecordJson; ?>">
                <td><?= $user['name']; ?></td>
                <td><?= $user['firstname']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['user_number']; ?></td>
                <td><?= $user['is_admin'] ? 'Yes' : 'No'; ?></td>
                <td>
                    <button class="btn btn-detail btn-info" type="button" title="Open Group Detail">
                        <i class="fas fa-info"></i>
                        <span>Open Detail</span>
                    </button>
                </td>
                <td>
                    <button class="btn btn-update btn-primary" type="button" title="Update Group">
                        <i class="fas fa-edit"></i>
                        <span>Update</span>
                    </button>
                </td>
                <td>
                    <button class="btn btn-delete btn-danger" type="button" title="Delete Group">
                        <i class="fas fa-trash-alt"></i>
                        <span>Delete</span>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </section>

</div>