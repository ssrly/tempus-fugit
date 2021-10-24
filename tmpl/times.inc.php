<?php

require_once './php/time.php';

/** @var $dbCon ./../php/dbConnection.php */
$uid = (isset($_GET['uid']) && isAdmin()) ? $_GET['uid'] : $_SESSION['user_id'];
$times = getAllTimesByUser($dbCon, $uid);
?>

<section class="info-text">
    <h2>Times</h2>
    <p>This view, shows all existing times tracking records.</p>
</section>

<section class="">
    <button id="btn-create" class="btn btn-create" type="button" title="Create New Group">
        <i class="fas fa-plus"></i>
        <span>Add Time</span>
    </button>
</section>

<section class="table-container">
    <table class="table">
        <thead>
        <tr>
            <th>Start</th>
            <th>End</th>
            <th>Duration</th>
            <th>Description</th>
            <th>Controls</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($times as $time):
            $dbRecordJson = getTimeJson($time); ?>
            <tr class="" data-dbrecord="<?= $dbRecordJson; ?>">
                <td data-label="Start"><?= formatDate($time['start_at']); ?></td>
                <td data-label="End"><?= formatDate($time['end_at']); ?></td>
                <td data-label="Duration"><?= getDurationString($time['duration']); ?></td>
                <td data-label="<?= $time['description'] ? 'Description' : ''; ?>"><?= $time['description']; ?></td>
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
        <?php
        endforeach ?>
        </tbody>
    </table>
</section>