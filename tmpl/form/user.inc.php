<form id="user-form" action="./php/user.php" method="POST">
    <div class="modal-header">
        <h3>User Form</h3>
        <span class="close">X</span>
    </div>
    <div class="form-group">
        <label for="form-name"></label>
        <input id="form-name" class="form-text-input required" type="text" name="name" placeholder="Your Lastname"
               required>
        <label for="form-firstname"></label>
        <input id="form-firstname" class="form-text-input required" type="text" name="firstname"
               placeholder="Your Firstname" required>
    </div>
    <div class="form-group">
        <label for="form-user-number"></label>
        <input id="form-user-number" class="form-text-input required" type="text" name="user_number"
               placeholder="Your User Number" required>
    </div>
    <div class="form-group">
        <label for="form-email"></label>
        <input id="form-email" class="form-mail-input required" type="email" name="email" placeholder="Your E-Mail"
               required>
    </div>
    <div class="form-group">
        <label for="form-pwd"></label>
        <input id="form-pwd" class="form-text-input required" type="password" name="pwd" placeholder="Your Password">
        <label for="form-pwd-repeat"></label>
        <input id="form-pwd-repeat" class="form-text-input required" type="password" name="pwd_repeat"
               placeholder="Repeat Your Password">
    </div>
    <div class="form-group">
        <label for="form-description">Description</label>
        <textarea id="form-description" cols="50" rows="3" wrap="soft" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="form-is-admin">Has admin rights</label>
        <input id="form-is-admin" class="form-text-input" type="checkbox" name="is_admin">
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