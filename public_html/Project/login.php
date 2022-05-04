<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<form onsubmit="return validate(this)" method="POST">
    <div class="container-fluid">
        <h1>Login</h1>
        <div class="col-2"> 
            <div class="mb-3">
                <label for="email">Email/Username</label>
                <input class="form-control" type="text" name="email"/>
            </div>
            <div class="mb-3">
                <label for="pw">Password</label>
                <input class="form-control" type="password" id="pw" name="password"/>
            </div>
    
        </div>
   
        <input class="btn btn-secondary" type="submit" value="Login" />
    </div> 
</form>
<script>
     function validate(form) {

        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        let login=form.email.value;
        let password=form.password.value;
    
        let isValid=true;
        var loginPattern = /^[a-z0-9_-]+@*[a-z]*\.*[a-z]*$/;
         //TODO update clientside validation to check if it should
        //valid email or username
        if(!loginPattern.test(login) || (login.length < 3 || login.length > 16)){
            isValid=false;
            flash("Invalid username/email address", "danger");
        }
        if(password.length < 8){
            isValid=false;
            flash("Password must be 8 characters long", "danger");
        }
        return isValid;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);

    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty");
        $hasError = true;
    }
    if (str_contains($email, "@")) {
        //sanitize
        //$email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $email = sanitize_email($email);
        //validate
        /*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            flash("Invalid email address");
            $hasError = true;
        }*/
        if (!is_valid_email($email)) {
            flash("Invalid email address");
            $hasError = true;
        }
    } else {
        if (!is_valid_username($email)) {
            flash("Invalid username");
            $hasError = true;
        }
    }
    if (empty($password)) {
        flash("password must not be empty");
        $hasError = true;
    }
   /* if (!is_valid_password($password)) {
        flash("Password too short");
        $hasError = true;
    } */
    if (!$hasError) {
        //flash("Welcome, $email");
        //TODO 4
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, username, password from Users where email = :email or username = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["password"];
                    unset($user["password"]);
                    if (password_verify($password, $hash)) {
                        //flash("Weclome $email");
                        $_SESSION["user"] = $user; //sets our session data from db
                        //lookup potential roles
                        $stmt = $db->prepare("SELECT Roles.name FROM Roles 
                        JOIN UserRoles on Roles.id = UserRoles.role_id 
                        where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");
                        $stmt->execute([":user_id" => $user["id"]]);
                        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we'll want multiple
                        //save roles or empty array
                        if ($roles) {
                            $_SESSION["user"]["roles"] = $roles; //at least 1 role
                        } else {
                            $_SESSION["user"]["roles"] = []; //no roles
                        }
                        flash("Welcome, " . get_username(), "success");
                        redirect("home.php");
                      
                    } else {
                        flash("Invalid password");
                    }
                } else {
                    flash("Email/Username not found");
                }
            }
        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");