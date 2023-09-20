<?php
require_once(__DIR__ . "/../../partials/nav.php");
require_once(__DIR__ . "/../../lib/functions.php");
is_logged_in(true);

$user_id = (int)se($_GET, "id", get_user_id(), false);
$isMe = $user_id == get_user_id();
$isEdit = isset($_GET["edit"]);

?>

<?php
if (isset($_POST["save"]) && $isMe && $isEdit) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
    $visibility = se($_POST, "visibility", null, false);
    $hasError = false;
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
    if (!$hasError) {
        $params = [":email" => $email, ":username" => $username, ":id" => get_user_id(),":visibility"=> $visibility];
        $db = getDB();
        $stmt = $db->prepare("UPDATE Users set visibility = :visibility, email = :email, username = :username where id = :id");
        try {
            $stmt->execute($params);
            flash("Profile saved", "success");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
        //select fresh data from table
        $stmt = $db->prepare("SELECT id, email, username from Users where id = :id LIMIT 1");
        try {
            $stmt->execute([":id" => get_user_id()]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                //$_SESSION["user"] = $user;
                $_SESSION["user"]["email"] = $user["email"];
                $_SESSION["user"]["username"] = $user["username"];
            }
          
        } catch (Exception $e) {
            flash("An unexpected error occurred, please try again", "danger");
            //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
        }
    }


    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        $hasError = false;
        if (!is_valid_password($current_password)) {
            flash("Password too short", "danger");
            $hasError = true;
        }
        if (!is_valid_password($new_password)) {
            flash("New password too short", "danger");
            $hasError = true;
        }
        if (!$hasError) {
            if ($new_password === $confirm_password) {
                //TODO validate current
                $stmt = $db->prepare("SELECT password from Users where id = :id");
                try {
                    $stmt->execute([":id" => get_user_id()]);
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (isset($result["password"])) {
                        if (password_verify($current_password, $result["password"])) {
                            $query = "UPDATE Users set password = :password where id = :id";
                            $stmt = $db->prepare($query);
                            $stmt->execute([
                                ":id" => get_user_id(),
                                ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                            ]);

                            flash("Password reset", "success");
                        } else {
                            flash("Current password is invalid", "warning");
                        }
                    }
                } catch (Exception $e) {
                    echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
                }
            } else {
                flash("New passwords don't match", "warning");
            }
        }
    }
}
$db = getDB();
$stmt = $db->prepare("SELECT visibility from Users where id = :id");
try {
    $stmt->execute([":id" => get_user_id()]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
} catch (Exception $e) {
    echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
}

//select fresh data from table
$stmt = $db->prepare("SELECT id, email, username,visibility, created from Users where id = :id LIMIT 1");
$isVisible = false;
try {
    $stmt->execute([":id" => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if ($isMe) {
            $_SESSION["user"]["email"] = $user["email"];
            $_SESSION["user"]["username"] = $user["username"];
        }
        if (se($user, "visibility", 0, false) > 0) {

            $isVisible = true;
        }
        $email = se($user, "email", "", false);
        $username = se($user, "username", "", false);
        $joined = se($user, "created", "", false);
    }
} catch (Exception $e) {
    flash("An unexpected error occurred, please try again", "danger");
    //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
}

?>


<link rel="stylesheet" href="<?php echo get_url('profile.css'); ?>">

<form method="POST" onsubmit="return validate(this);">
  
<div class="container-fluid edit-body">
    <!-- Edit Profile -->
    <?php if ($isMe && $isEdit) : ?>
        <div id="title">
            <h1>Edit Your Profile</h1>
        </div>
        <form method="POST" onsubmit="return validate(this);">
            <div class="col-2">
                <div><h4>Email/Username</h4></div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" value="<?php se($email); ?>" />
                </div>
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username" value="<?php se($username); ?>" />
                </div>
                <!-- DO NOT PRELOAD PASSWORD -->
                <div><h4>Password Reset</h4></div>
                <div class="mb-3">
                    <label for="cp">Current Password</label>
                    <input class="form-control" type="password" name="currentPassword" id="cp" />
                </div>
                <div class="mb-3">
                    <label for="np">New Password</label>
                    <input class="form-control" type="password" name="newPassword" id="np" />
                </div>
                <div class="mb-3">
                    <label for="conp">Confirm Password</label>
                    <input class="form-control" type="password" name="confirmPassword" id="conp" />
                </div>
            </div>
            <?php foreach ($result as $column => $value) : ?>
                <!-- WCK3 4/28/2022 make visibility a radio option-->
                <?php if( $column =="visibility" &&  se($value, "", "" ,false)==1) :  ?>
                    <label>make profile public?</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="<?php se($column); ?>"  value="1" name="<?php se($column); ?>" checked >
                        <label class="form-check-label" for="<?php se($column); ?>">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input  type="radio" class="form-check-input" id="<?php se($column); ?>"value="0" name="<?php se($column); ?>">
                        <label class="form-check-label" for="<?php se($column); ?>">No</label>
                    </div>
            
                <?php elseif($column =="visibility" &&  se($value, "", "" ,false)==0) : ?>
                    <label>make profile public?</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="<?php se($column); ?>" type="radio"  value="<?php se(1)?>" name="<?php se($column); ?>" >
                        <label class="form-check-label" for="<?php se($column); ?>">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" id="<?php se($column); ?>" type="radio"  value="<?php se(0)?>" name="<?php se($column); ?>" checked>
                        <label class="form-check-label" for="<?php se($column); ?>">No</label>
                    </div>
                <?php endif ?>
            <?php endforeach; ?>
            <br>
            <input type="submit" class="btn btn-secondary" value="Update Profile" name="save" />
        </form>
        <?php if ($isMe) : ?>
            <a class="btn btn-secondary" href="<?php echo get_url('profile.php?id='); se(get_user_id()); ?>">View Profile</a>
        <?php endif?>
        <!--Public/Private Profile-->
    <?php else:  ?>
        <?php if ($isVisible || $isMe) : ?>
            <br>
            <?php $_POST["id"]=$user; ?>
            <div class="col-3" >
                <div class="card bg-dark">
                    <div class="card-header">
                        <?php if($isMe) : ?> 
                            <h3>Your Profile</h3>
                        <?php else: ?>
                            <h3>Profile</h3>
                        <?php endif;?>
                    </div>
                    <div class="card-body">
                        Username: <?php se($username); ?>
                        <br>
                        Joined: <?php se($joined); ?>
                    </div>
                    <div class="card-footer">
                        <?php if ($isMe) : ?>
                            <div class="col-5">
                                <a class="btn btn-secondary" href="?edit">Edit Profile</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <?php 
            flash("Profile is private", "warning");
            redirect("shop.php");
            ?>
        <?php endif; ?>
    <?php endif;?>
</div>

<script>
    function validate(form) {
        let email=form.email.value;
        let username=form.username.value;
        let pw = form.newPassword.value;
        let currPassword=form.currentPassword.value;
        let con = form.confirmPassword.value;
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
       if(currPassword && currPassword.length < 8){
            flash("Current password is too short", "danger");
            isValid=false;
        }  
        if(pw && pw.length < 8){
            flash("New password is too short", "danger");
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
require_once(__DIR__ . "/../../partials/flash.php");
?>
