<?php

require_once './php/group.php';
/** @var $dbCon ./../php/dbConnection.php */
$groups = getAllGroups($dbCon);
?>
<script src="./js/group.js"></script>

<div class="container">
    <section class="info-text">
        <h2>Groups - Tempus Fugit</h2>
        <p>In this view, all existing Groups are shown. Just for information purposes.</p>
    </section>

    <section>
        <button id="btn-create" class="btn btn-create btn-success" type="button" title="Create New Group">
            <i class="fas fa-plus"></i>
            <span>Create Group</span>
        </button>
    </section>

    <section>
        <table>
            <thead>
            <tr>
                <th>Group-Name</th>
                <th>Description</th>
                <th>Admin Rights</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($groups as $group):
                $groupJson = prepareInput(
                    json_encode([
                        'groupId' => $group['id'],
                        'name' => $group['name'],
                        'description' => $group['description'],
                        'isAdmin' => $group['is_admin'],
                        'createdAt' => $group['created_at'],
                        'updatedAt' => $group['updated_at'] ?? '',
                    ])
                ); ?>
                <tr class="group-tr group-tr-table" data-group="<?= $groupJson; ?>">
                    <td><?= $group['name']; ?></td>
                    <td><?= $group['description']; ?></td>
                    <td><?= $group['is_admin'] ? 'Yes' : 'No'; ?></td>
                    <td>
                        <button id="btn-detail" class="btn btn-detail btn-info" type="button"
                                title="Open Group Detail">
                            <i class="fas fa-info"></i>
                            <span>Open Detail</span>
                        </button>
                    </td>
                    <?php
                    if ($group['id'] > 2): ?>
                        <td>
                            <button id="btn-update" class="btn btn-update btn-primary" type="button"
                                    title="Update Group">
                                <i class="fas fa-edit"></i>
                                <span>Update</span>
                            </button>
                        </td>
                        <td>
                            <button id="btn-delete" class="btn btn-delete btn-danger" type="button"
                                    title="Delete Group">
                                <i class="fas fa-trash-alt"></i>
                                <span>Delete</span>
                            </button>
                        </td>
                    <?php
                    endif; ?>
                </tr>
            <?php
            endforeach ?>
            </tbody>
        </table>
    </section>
</div>