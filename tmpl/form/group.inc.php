<form id="group-form" action="./php/group.php" method="POST">
    <div class="modal-header">
        <h3>Group Form</h3>
        <span class="close">X</span>
    </div>
    <div class="form-group">
        <label for="form-name"></label>
        <input id="form-name" class="form-text-input required" type="text" name="name"
               placeholder="Group Name" required>
    </div>
    <div class="form-group">
        <label for="form-description"></label>
        <textarea id="form-description" cols="50" rows="3" wrap="soft" name="description">Description...</textarea>
    </div>
    <div class="form-group">
        <label for="form-isadmin">Has admin rights</label>
        <input id="form-isadmin" class="form-text-input required" type="checkbox" name="isadmin">
    </div>
    <div class="form-group">
        <p id="form-required-info">Required</p>
    </div>
    <div class="form-group">
        <input id="form-reset" class="btn btn-danger" type="reset" name="reset" value="Reset">
        <input id="form-login" class="btn btn-success" type="submit" name="login" value="Submit">
    </div>
</form>