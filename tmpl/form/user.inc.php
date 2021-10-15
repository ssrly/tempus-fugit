<form id="user-form" action="#" method="POST">
    <div class="form-group">
        <h3>User Form</h3>
        <span class="close">X</span>
    </div>
    <div class="form-group">
        <input id="user-form-name" class="form-text-input required" type="text" name="name" placeholder="Your Lastname"
            required>
        <input id="user-form-firstname" class="form-text-input required" type="text" name="firstname"
            placeholder="Your Firstname" required>
    </div>
    <div class="form-group">
        <input id="user-form-usernumber" class="form-text-input required" type="text" name="usernumber"
            placeholder="Your Usernumber" required>
    </div>
    <div class="form-group">
        <input id="user-form-email" class="form-mail-input required" type="mail" name="email" placeholder="Your E-Mail"
            required>
    </div>
    <div class="form-group">
        <input id="user-form-pwd" class="form-text-input required" type="password" name="pwd"
            placeholder="Your Password" required>
        <input id="user-form-pwd-repeat" class="form-text-input required" type="password" name="pwdrepeat"
            placeholder="Repeat Your Password" required>
    </div>
    <div class="form-group">
        <textarea cols="50" rows="3" wrap="soft" name="description">Description...</textarea>
    </div>
    <div class="form-group">
        <p id="form-required-info">Required</p>
    </div>
    <div class="form-group">
        <input id="form-reset" class="btn btn-danger" type="reset" name="reset" value="Reset">
        <input id="form-submit" class="btn btn-success" type="submit" name="submit" value="Submit">
    </div>
</form>