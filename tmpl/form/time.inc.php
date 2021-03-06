<?php
/** @var $page /index.php */ ?>
<form id="time-form" action="./php/time.php?page=<?= $page ?>" method="POST" class="hidden">
    <div class="modal-header">
        <span>Time Form</span>
        <i class="fas fa-times close"></i>
    </div>
    <div class="modal-body form-body">
        <div class="form-group">
            <label for="form-start-date">Start</label>
            <input id="form-start-date" class="form-date-input required" type="date" name="start_date">
            <label for="form-start-time" class="hidden"></label>
            <input id="form-start-time" class="form-time-input required" type="time" name="start_time">
        </div>
        <div class="form-group">
            <label for="form-end-date" aria-label="">End</label>
            <input id="form-end-date" class="form-date-input required" type="date" name="end_date">
            <label for="form-end-time" class="hidden"></label>
            <input id="form-end-time" class="form-time-input required" type="time" name="end_time">
        </div>
        <div class="form-group flex-wrap">
            <label for="form-description" class="label-textarea">Description</label>
            <textarea id="form-description" cols="50" rows="3" wrap="soft" name="description"></textarea>
        </div>
        <div class="form-group">
            <p id="form-required-info">Required</p>
        </div>
        <div class="form-group btn-group">
            <input type="hidden" id="form-do" name="do" value="create">
            <input type="hidden" id="form-id" name="id" value="">
            <?php
            /** @var $uid /tmpl/times.inc.php */ ?>
            <input type="hidden" id="form-user-id" name="user_id" value="<?= $uid ?>">
            <input id="form-reset" class="btn btn-reset" type="reset" name="Reset" value="Reset">
            <input id="form-submit" class="btn btn-submit" type="submit" name="submit" value="Submit">
        </div>
    </div>
</form>