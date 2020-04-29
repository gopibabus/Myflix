<?php

declare(strict_types=1);

require_once './includes/config.php';
require_once './includes/classes/Constants.php';
require_once './includes/classes/FormSanitizer.php';
require_once './includes/classes/Account.php';

$account = new Account($con);

if (isset($_POST['submitButton'])) {

    if (isset($_POST['submitButton'])) {
        $username = FormSanitizer::sanitizeFormUsername($_POST['username']);
        $password = FormSanitizer::sanitizeFormPassword($_POST['password']);

        $success = $account->login(
            $username,
            $password
        );

        if ($success) {
            header("Location: index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MyFlix</title>
    <link rel="stylesheet" href="./assets/style/style.css">
</head>

<body>

    <div class="signInContainer">
        <div class="column">
            <div class="header">
                <img src="./assets/images/logo.png" alt="logo" title="Site logo">
                <h3>Sign In</h3>
                <span>to continue to MyFlix</span>
            </div>
            <form action="#" method="post">
                <?= $account->getError(Constants::$loginFailed) ?>
                <input type="text" name="username" placeholder="username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="submitButton" value="Submit">
            </form>
            <a href="./register.php" class="signInMessage">Need an account? Sing up here!!</a>
        </div>
    </div>

</body>

</html>