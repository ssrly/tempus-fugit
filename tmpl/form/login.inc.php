<form id="login-form" action="./php/login.php" method="POST" class="hidden">
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
        <input id="form-register" class="btn btn-register" type="submit" name="register" value="Register">
        <input id="form-reset" class="btn btn-reset" type="reset" name="reset" value="Reset">
        <input id="form-login" class="btn btn-login" type="submit" name="login" value="Login">
    </div>
</form>