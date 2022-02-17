<?php  require(__DIR__ . "/../../functions.php"); ?>

<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" required />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <div>
        <label for="confirm">Confirm</label>
        <input type="password" name="confirm" required minlength="8" />
    </div>
    <input type="submit" value="Register" />
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        return true;
    }
</script>

<?php
 //TODO 2: add PHP Code
 //check if forms are filled out
 if(isset($POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"])){
     $email = se($_POST,"email", "", false);       //create variables to make referencing easier
     $password = se($_POST,"password", "", false); //use safe echo to prevent malicious javascript injections     
     $confirm = se($_POST,"confirm", "", false);      
     //TODO 3: validate/use
     $hasError = false;
     if(empty($email)){
         echo "Email must not be empty";
         $hasError = true;
     }
     if(empty($password)){
         echo "Password must not be empty";
         $hasError = true;
     }
     if(empty($confirm)){
         echo "Confirm password must not be empty";
         $hasError = true;
     }
     if(strlen($password) > 0 && $password !== $confirm){
        echo "Passwords must match";
        $hasError = true;
     }
     if(!$hasError){
         echo "Welcome, $email";
     }
     //TODO 4
     //hash password, we do not want to store plain text password
     //reverse table lookup can be used to hack passwords
     $hash = password_hash($password, PASSWORD_BCRYPT);
     $db = getDB();
     $stmt = $db->prepare("INSERT INTO Users (email, password) VALUES(:email, :password)");
     try {
         $stmt->execute([":email" => $email, ":password" => $hash]);
         echo "Successfully registered!";
     } catch (Exception $e){
         echo "There was a problem registering";
         "<pre?>" . var_export($e,true) . "</pre>";
     }

     //sanitize
     $email = filter_var($email, FILTER_SANITIZE_EMAIL);
     //validate
     if(filter_var($email, FILTER_SANITIZE_EMAIL)){
         echo "Invalid email address";
         $hasError = true;
     }
 }
?>