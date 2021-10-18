<form id="time-form" action="./php/time.php" method="POST">
    <div class="modal-header">
        <h3>Time Form</h3>
        <span class="close">X</span>
    </div>
    <div class="form-group">
        <label for="form-start-date">Start</label>
        <input id="form-start-date" class="form-date-input" type="date" name="start_date">
        <label for="form-start-time"></label>
        <input id="form-start-time" class="form-time-input" type="time" name="start_time">
    </div>
    <div class="form-group">
        <label for="form-end-date" aria-label="">End</label>
        <input id="form-end-date" class="form-date-input" type="date" name="end_date">
        <label for="form-end-time"></label>
        <input id="form-end-time" class="form-time-input" type="time" name="end_time">
    </div>
    <div class="form-group">
        <label for="form-description">Description</label>
        <textarea id="form-description" cols="50" rows="3" wrap="soft" name="description"></textarea>
    </div>
    <div class="form-group">
        <p id="form-required-info">Required</p>
    </div>
    <div class="form-group">
        <input type="hidden" id="form-do" name="do" value="create">
        <input type="hidden" id="form-id" name="id" value="">
        <input type="hidden" id="form-user-id" name="user_id" value="<?= $_SESSION['user_id'] ?>">
        <input id="form-reset" class="btn btn-danger" type="reset" name="Reset" value="Reset">
        <input id="form-submit" class="btn btn-success" type="submit" name="submit" value="Submit">
    </div>
</form>