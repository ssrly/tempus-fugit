<form id="time-form" action="#" method="POST">
    <div class="form-group">
        <label for="startdate">Start Date</label>
        <input id="time-form-startdate" class="form-date-input" type="date" name="startdate">
        <label for="starttime">Start Time</label>
        <input id="time-form-starttime" class="form-time-input" type="time" name="starttime">
    </div>
    <div class="form-group">
        <label for="enddate">End Date</label>
        <input id="time-form-enddate" class="form-date-input" type="date" name="enddate">
        <label for="endtime">End Time</label>
        <input id="time-form-endtime" class="form-time-input" type="time" name="endtime">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea cols="50" rows="3" name="description">Es war dunkel, feucht und neblig …</textarea>
    </div>
    <div class="form-group">
        <p id="form-required-info">Required</p>
    </div>
    <div class="form-group">
        <input id="form-reset" class="btn btn-danger" type="reset" name="Reset" value="Reset">
        <input id="form-login" class="btn btn-success" type="submit" name="Login" value="Login">
    </div>
</form>