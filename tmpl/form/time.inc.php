<form id="form time-form" action="./php/time.php" method="POST">
    <div class="modal-header">
        <h3>Time Form</h3>
        <span class="close">X</span>
    </div>
    <div class="form-group">
        <label for="form-startdate">Start</label>
        <input id="form-startdate" class="form-date-input" type="date" name="startdate">
        <label for="form-starttime"></label>
        <input id="form-starttime" class="form-time-input" type="time" name="starttime">
    </div>
    <div class="form-group">
        <label for="form-enddate" aria-label="">End</label>
        <input id="form-enddate" class="form-date-input" type="date" name="enddate">
        <label for="form-endtime"></label>
        <input id="form-endtime" class="form-time-input" type="time" name="endtime">
    </div>
    <div class="form-group">
        <label for="form-description">Description</label>
        <textarea id="form-description" cols="50" rows="3" wrap="soft" name="description"></textarea>
    </div>
    <div class="form-group">
        <p id="form-required-info">Required</p>
    </div>
    <div class="form-group">
        <input id="time-form-reset" class="btn btn-danger" type="reset" name="Reset" value="Reset">
        <input id="form-submit" class="btn btn-success" type="submit" name="submit" value="Submit">
    </div>
</form>