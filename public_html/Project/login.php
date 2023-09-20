<?php
require(__DIR__ . "/../../partials/nav.php");
?>

<link rel="stylesheet" href="<?php echo get_url('login.css'); ?>">
<form onsubmit="return validate(event)" method="POST">
    <div class="container-fluid login-body" >
        <div id="title"> 
            <h1>Welcome! Please Login</h1>
        </div>
        <div class="col-2 form"> 
            <div class="mb-3">
                <label for="email">Email/Username</label>
                <input class="form-control" type="text" name="email"/>
            </div>
            <div class="mb-3">
                <label for="pw">Password</label>
                <input class="form-control" type="password" id="pw" name="password"/>
            </div>

        </div>

        <input class="btn btn-secondary"  type="submit" value="Login" />

    </div> 
</form>

<script>
    function validate(form) {
        let login = form.target.email.value;
        let password = form.target.password.value;
        var loginPattern = /^[a-z0-9_-]+@*[a-z]*\.*[a-z]*$/;
        
        if(!login || !password){
            flash("Both Fields Are Required", "Warning");
            form.preventDefault();
            return;
        }

        if( !loginPattern.test(login) || login.length < 3 || login.length > 16 || password.length < 8){
            form.target.reset();
            flash("Invalid Credentials", "danger");
            form.preventDefault();
            return;
        }
    }
</script>

<?php
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $hasError = false;
    
    if (str_contains($email, "@")) {
       $email = sanitize_email($email);
    } 
    if (empty($email) || empty($password)) {
        flash("Both fields are required", "warning");
        $hasError = true;
    }
    
    if (!$hasError) {
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, username, password from Users where email = :email or username = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if($r){
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if($user){
                    $hash = $user["password"];
                    unset($user["password"]);
                    if(password_verify($password, $hash)){
                        $_SESSION["user"] = $user; //sets our session data from db
                        //lookup potential roles
                        $stmt = $db->prepare(
                            "SELECT Roles.name FROM Roles 
                            JOIN UserRoles on Roles.id = UserRoles.role_id 
                            where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1"
                            );
                        $stmt->execute([":user_id" => $user["id"]]);
                        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we want multiple
                        //save roles or empty array
                        if ($roles) {
                            $_SESSION["user"]["roles"] = $roles; //at least 1 role
                        } else {
                            $_SESSION["user"]["roles"] = []; //no roles
                        }
                        flash("Welcome, " . get_username(), "success");
                        redirect("shop.php");
                    } 
                    else {
                        flash("Invalid Credentials", "danger");
                        redirect("$BASE_PATH/login.php");
                    }
                } 
                else {
                    flash("Invalid Credentials", "danger");
                    redirect("$BASE_PATH/login.php");
                }
            }
        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
    else{
        redirect("$BASE_PATH/login.php");
    }
}

require(__DIR__ . "/../../partials/flash.php");
?>
