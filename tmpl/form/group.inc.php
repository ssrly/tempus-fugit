<form id="form" action="./php/group.php" method="POST" class="modal-form hidden">
    <div class="modal-header">
        <h3>Group Form</h3>
        <span class="close">X</span>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="form-name"></label>
            <input id="form-name" class="form-text-input required" type="text" name="name"
                   placeholder="Group Name" required>
        </div>
        <div class="form-group">
            <label for="form-description">Description</label>
            <textarea id="form-description" cols="50" rows="3" wrap="soft" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="form-is-admin">Has admin rights</label>
            <input id="form-is-admin" class="form-text-input required" type="checkbox" name="is_admin">
        </div>
        <div class="form-group">
            <p id="form-required-info">Required</p>
        </div>
        <div class="form-group">
            <input type="hidden" id="form-do" name="do" value="create">
            <input type="hidden" id="form-id" name="id" value="">
            <input id="form-reset" class="btn btn-danger" type="reset" name="reset" value="Reset">
            <input id="form-submit" class="btn btn-success" type="submit" name="submit" value="Submit">
        </div>
    </div>
</form>