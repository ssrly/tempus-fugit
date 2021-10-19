<?php

require_once './php/user.php';
/** @var $dbCon ./../php/dbConnection.php */
$uid = (isset($_GET['uid']) && $_SESSION['is_admin']) ? $_GET['uid'] : $_SESSION['user_id'];
$users = getAllUsers($dbCon);

?>

<div class="container">
    <section class="info-text">
        <h2>Users - Tempus Fugit</h2>
        <p>This view shows saved user information.</p>
        <p>As an admin all existing users are shown. As an user only your data will be provided.</p>
        <p>As an admin you can select an user an go to his / her times. Please be careful!</p>
        <!--TODO: error msg-->
        <?= $msg ?? '' ?>
    </section>

    <section>
        <button id="btn-create" class="btn btn-create btn-success" type="button" title="Create New Group">
            <i class="fas fa-plus"></i>
            <span>Add User</span>
        </button>
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
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users as $user):
                $dbRecordJson = getUserJson($user); ?>
                <tr class="tr-table time-tr-table" data-dbrecord="<?= $dbRecordJson; ?>">
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['firstname']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['user_number']; ?></td>
                    <td><?= $user['is_admin'] ? 'Yes' : 'No'; ?></td>
                    <td>
                        <button class="btn btn-time btn-info" type="button" title="Open Group Detail"
                                data-uid="<?= $user['id'] ?>">
                            <i class="fa fa-solid fa-stopwatch"></i>
                            <span>Open Times</span>
                        </button>
                    </td>
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
            <?php
            endforeach ?>
            </tbody>
        </table>
    </section>

</div>