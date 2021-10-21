<?php

require_once './php/user.php';

/** @var $dbCon ./../php/dbConnection.php */
$user = getUser($dbCon, $_SESSION['user_id']);
?>

<section class="info-text">
    <h2>Setup - Tempus Fugit</h2>
    <p>This view shows your saved user informations.</p>
</section>

<section class="table-container">
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Firstname</th>
            <th>E-Mail</th>
            <th>User Number</th>
            <th>Is Admin</th>
            <th>Controls</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $dbRecordJson = getUserJson($user); ?>
        <tr class="" data-dbrecord="<?= $dbRecordJson; ?>">
            <td data-label="Name"><?= $user['name']; ?></td>
            <td data-label="Firstname"><?= $user['firstname']; ?></td>
            <td data-label="E-Mail"><?= $user['email']; ?></td>
            <td data-label="User Number"><?= $user['user_number']; ?></td>
            <td data-label="Is Admin"><?= $user['is_admin'] ? 'Yes' : 'No'; ?></td>
            <td data-label="Controls">
                <button class="btn btn-detail" type="button" title="Open Group Detail">
                    <i class="fas fa-info"></i>
                    <span>Detail</span>
                </button>
                <button class="btn btn-update" type="button" title="Update Group">
                    <i class="fas fa-edit"></i>
                    <span>Update</span>
                </button>
                <button class="btn btn-delete" type="button" title="Delete Group">
                    <i class="fas fa-trash-alt"></i>
                    <span>Delete</span>
                </button>
            </td>
        </tr>
        </tbody>
    </table>
</section>