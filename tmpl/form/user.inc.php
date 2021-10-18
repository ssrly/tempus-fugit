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
        <label for="form-usernumber"></label>
        <input id="form-usernumber" class="form-text-input required" type="text" name="usernumber"
               placeholder="Your User Number" required>
    </div>
    <div class="form-group">
        <label for="form-email"></label>
        <input id="form-email" class="form-mail-input required" type="email" name="email" placeholder="Your E-Mail"
               required>
    </div>
    <div class="form-group">
        <label for="form-pwd"></label>
        <input id="form-pwd" class="form-text-input required" type="password" name="pwd"
               placeholder="Your Password" required>
        <label for="form-pwd-repeat"></label>
        <input id="form-pwd-repeat" class="form-text-input required" type="password" name="pwdrepeat"
               placeholder="Repeat Your Password" required>
    </div>
    <div class="form-group">
        <label for="form-description">Description</label>
        <textarea id="form-description" cols="50" rows="3" wrap="soft" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="form-roles">Role(s):</label>
        <select name="roles" id="form-roles" class="form-multi-select required" multiple required>
            <option value="2">User</option>
            <option value="1">Admin</option>
        </select>
    </div>
    <div class="form-group">
        <p id="form-required-info">Required</p>
    </div>
    <div class="form-group">
        <input id="form-reset" class="btn btn-danger" type="reset" name="reset" value="Reset">
        <input id="form-submit" class="btn btn-success" type="submit" name="submit" value="Submit">
    </div>
</form>