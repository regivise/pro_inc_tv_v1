<?php

require_once("includes/classes/FormSanitizer.php");
require_once("includes/config.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");


$account = new Account($conn);

    if(isset($_POST["submitButton"])) {
        $firstName = FormSanitizer::sanitizeFormString($_POST['firstName']);
        $lastName = FormSanitizer::sanitizeFormString($_POST['lastName']);
        $username = FormSanitizer::sanitizeFormUserName($_POST['username']);
        $email = FormSanitizer::sanitizeFormEmail($_POST['email']);
        $email2 = FormSanitizer::sanitizeFormEmail2($_POST['email2']);
        $password = FormSanitizer::sanitizeFormPassword($_POST['password']);
        $password2 = FormSanitizer::sanitizeFormPassword2($_POST['password2']);

     $account ->register($firstName,$lastName,$username,$email,$email2,$password,$password2);
        
    }

    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Pro Inc TV </title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css" />
    </head>
    <body>
        
        <div class="signInContainer">

            <div class="column">

                <div class="header">
                    <img src="assets/images/logo.png" title="Logo" alt="Site logo" style="width:300px;height:59px;"/>
                    <h3>Sign Up</h3>
                    <span>to continue to Pro Inc TV </span>
                </div>

                <form method="POST">
                    <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                    <input type="text" name="firstName" placeholder="First name" required>
                    <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                    <input type="text" name="lastName" placeholder="Last name" required>
                    <?php echo $account->getError(Constants::$userNameCharacters); ?>
                    <input type="text" name="username" placeholder="Username" required>

                    <input type="email" name="email" placeholder="Email" required>

                    <input type="email" name="email2" placeholder="Confirm email" required>

                    <input type="password" name="password" placeholder="Password" required>

                    <input type="password" name="password2" placeholder="Confirm password" required>

                    <input type="submit" name="submitButton" value="SUBMIT">

                </form>

                <a href="login.php" class="signInMessage">Already have an account? Sign in here!</a>

            </div>

        </div>

    </body>
</html>