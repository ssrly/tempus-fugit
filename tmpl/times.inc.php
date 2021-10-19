<?php

require_once './php/time.php';

/** @var $dbCon ./../php/dbConnection.php */
$uid = (isset($_GET['uid']) && $_SESSION['is_admin']) ? $_GET['uid'] : $_SESSION['user_id'];
$times = getAllTimesByUser($dbCon, $uid);
?>

<div class="container">
    <section class="info-text">
        <h2>Times - Tempus Fugit</h2>
        <p>In this view, all existing times by your time tracking are shown in form of a list.</p>
        <p>New times can be created and existing ones can be reviewed, updated or deleted by the you.</p>
        <p>As admin you can reach this view by selecting an user in the users view and administrate his or her times. As
            an user only your own times are shown.</p>
        <!--TODO: error msg-->
        <?= $msg ?? '' ?>
    </section>

    <section>
        <button id="btn-create" class="btn btn-create btn-success" type="button" title="Create New Group">
            <i class="fas fa-plus"></i>
            <span>Add Time</span>
        </button>
    </section>

    <section>
        <table>
            <thead>
            <tr>
                <th>Start</th>
                <th>End</th>
                <th>Duration</th>
                <th>Description</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($times as $time):
                $dbRecordJson = getTimeJson($time); ?>
                <tr class="tr-table time-tr-table" data-dbrecord="<?= $dbRecordJson; ?>">
                    <td><?= formatDate($time['start_at']); ?></td>
                    <td><?= formatDate($time['end_at']); ?></td>
                    <td><?= getDurationString($time['duration']); ?></td>
                    <td><?= $time['description']; ?></td>
                    <td>
                        <button class="btn btn-detail btn-info" type="button"
                                title="Open Group Detail">
                            <i class="fas fa-info"></i>
                            <span>Open Detail</span>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-update btn-primary" type="button"
                                title="Update Group">
                            <i class="fas fa-edit"></i>
                            <span>Update</span>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-delete btn-danger" type="button"
                                title="Delete Group">
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