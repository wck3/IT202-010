<?php
require(__DIR__ . "/../../partials/nav.php");
reset_session();
?>
<form onsubmit="return validate(this)" method="POST">
    <div class="container-fluid">
        <h1>Register</h1>
        <div class="col-2">
            <div class="mb-3">
                <label for="email">Email</label>
                <input  class="form-control" type="text" name="email" />
            </div>
            <div class="mb-3">
                <label for="username">Username</label>
                <input  class="form-control" type="text" name="username"/>
            </div>
            <div class="mb-3">
                <label for="pw">Password</label>
                <input  class="form-control" type="password" id="pw" name="password" />
            </div>
            <div class="mb-3">
                <label for="confirm">Confirm</label>
                <input class="form-control" type="password" name="confirm"  />
            </div>
          
            <!-- WCK3 4/28/2022 make visibility a radio option-->
            <label>make profile public?</label>
            <br>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" id="visYes"  value="1" name="visibility" checked >
                <label class="form-check-label" >Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input  type="radio" class="form-check-input" id="visNo"value="0" name="visibility">
                <label class="form-check-label">No</label>
            </div>
               
            <br>
            <input class="btn btn-secondary" type="submit" value="Register" />
        </div>
    </div>
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        let email=form.email.value;
        let username=form.username.value;
        let pw = form.password.value;
        let con = form.confirm.value;
        let isValid = true;
        //TODO add other client side validation....
        
        var emailPattern = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
        var usernamePattern = /[a-zA-Z0-9_-]{3,16}$/;
        
        if(!emailPattern.test(email)){
            isValid=false;
            flash("Invalid email address", "danger");
        }
        if((username.length < 3 || username.length > 16) || !usernamePattern.test(username)){
            isValid=false;
            flash("Invalid username. Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
        }
       if(pw.length < 8){
            flash("Password is too short. Must be 8 characters or more", "danger");
            isValid=false;
        }  
        
        if (pw !== con) {
            flash("Password and Confirm password must match", "warning");
            isValid = false;
        }
        return isValid;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"]) && isset($_POST["username"]) && isset($_POST["visibility"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se($_POST, "confirm", "", false);
    $username = se($_POST, "username", "", false);
    $visibility = se($_POST, "visibility", "", false);
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty", "danger");
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!is_valid_username($username)) {
        flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
        $hasError = true;
    }
    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }
    if (empty($confirm)) {
        flash("Confirm password must not be empty", "danger");
        $hasError = true;
    }
    if (!is_valid_password($password)) {
        flash("Password too short", "danger");
        $hasError = true;
    }
    if (
        strlen($password) > 0 && $password !== $confirm
    ) {
        flash("Passwords must match", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users (email, password, username, visibility) VALUES(:email, :password, :username, :visibility)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username, ":visibility"=> $visibility]);
            flash("Successfully registered!", "success");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
    }
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>