<form id="login-form" action="./php/login.php" method="POST">
    <div class="form-group">
        <h3>Login</h3>
        <span class="close">X</span>
    </div>
    <div class="form-group">
        <input id="login-form-email" class="form-text-input required" type="mail" name="email" placeholder="Your E-Mail"
            required>
    </div>
    <div class="form-group">
        <input id="login-form-pwd" class="form-text-input required" type="password" name="pwd"
            placeholder="Your Password" required>
    </div>
    <div class="form-group">
        <p id="form-required-info">Required</p>
    </div>
    <div class="form-group">
        <input id="form-register" class="btn btn-default" type="submit" name="register" value="Register">
        <input id="form-reset" class="btn btn-danger" type="reset" name="reset" value="Reset">
        <input id="form-login" class="btn btn-success" type="submit" name="login" value="Login">
    </div>
</form>