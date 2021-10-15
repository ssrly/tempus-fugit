<form id="time-form" action="./php/time.php" method="POST">
    <div class="form-group">
        <h3>Time Form</h3>
        <span class="close">X</span>
    </div>
    <div class="form-group">
        <label for="startdate">Start</label>
        <input id="time-form-startdate" class="form-date-input" type="date" name="startdate">
        <!-- <label for="starttime">Start Time</label> -->
        <input id="time-form-starttime" class="form-time-input" type="time" name="starttime">
    </div>
    <div class="form-group">
        <label for="enddate">End</label>
        <input id="time-form-enddate" class="form-date-input" type="date" name="enddate">
        <!-- <label for="endtime">End Time</label> -->
        <input id="time-form-endtime" class="form-time-input" type="time" name="endtime">
    </div>
    <div class="form-group">
        <textarea cols="50" rows="3" wrap="soft" name="description">Description...</textarea>
    </div>
    <div class="form-group">
        <p id="form-required-info">Required</p>
    </div>
    <div class="form-group">
        <input id="time-form-reset" class="btn btn-danger" type="reset" name="Reset" value="Reset">
        <input id="form-submit" class="btn btn-success" type="submit" name="Submit" value="Submit">
    </div>
</form>