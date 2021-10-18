<form id="form login-form" action="./php/login.php" method="POST">
    <div class="modal-header">
        <h3>Login Form</h3>
        <span class="close">X</span>
    </div>
    <div class="form-group">
        <label for="form-email"></label>
        <input id="form-email" class="form-text-input required" type="email" name="email"
               placeholder="Your E-Mail" required>
    </div>
    <div class="form-group">
        <label for="form-pwd"></label>
        <input id="form-pwd" class="form-text-input required" type="password" name="pwd"
               placeholder="Your Password" required>
    </div>
    <div class="form-group">
        <p id="form-required-info">Required</p>
    </div>
    <div class="form-group">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['token'] ?>"/>
        <input id="form-register" class="btn btn-default" type="submit" name="register" value="Register">
        <input id="form-reset" class="btn btn-danger" type="reset" name="reset" value="Reset">
        <input id="form-login" class="btn btn-success" type="submit" name="login" value="Login">
    </div>
</form>