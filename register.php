<?php

declare(strict_types=1);

require_once './includes/config.php';
require_once './includes/classes/Constants.php';
require_once './includes/classes/FormSanitizer.php';
require_once './includes/classes/Account.php';

$account = new Account($con);

if (isset($_POST['submitButton'])) {
    $firstName = FormSanitizer::sanitizeFormString($_POST['firstName']);
    $lastName = FormSanitizer::sanitizeFormString($_POST['lastName']);
    $username = FormSanitizer::sanitizeFormUsername($_POST['username']);
    $email = FormSanitizer::sanitizeFormEmail($_POST['email']);
    $email2 = FormSanitizer::sanitizeFormEmail($_POST['email2']);
    $password = FormSanitizer::sanitizeFormPassword($_POST['password']);
    $password2 = FormSanitizer::sanitizeFormPassword($_POST['password2']);

    $success = $account->register(
        $firstName,
        $lastName,
        $username,
        $email,
        $email2,
        $password,
        $password2
    );

    if ($success) {
        header("Location: index.php");
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
                <h3>Sign Up</h3>
                <span>to continue to MyFlix</span>
            </div>
            <form action="#" method="POST">

                <?= $account->getError(Constants::$firstNameCharacters) ?>
                <input type="text" name="firstName" placeholder="First Name" required>
                <?= $account->getError(Constants::$lastNameCharacters) ?>
                <input type="text" name="lastName" placeholder="Last Name" required>
                <?= $account->getError(Constants::$userNameCharacters) ?>
                <?= $account->getError(Constants::$userNameTaken) ?>
                <input type="text" name="username" placeholder="username" required>
                <?= $account->getError(Constants::$emailsDonotMatch) ?>
                <?= $account->getError(Constants::$emailInvalid) ?>
                <?= $account->getError(Constants::$emailTaken) ?>
                <input type="email" name="email" placeholder="Email" required>
                <input type="email" name="email2" placeholder="Confirm Email" required>
                <?= $account->getError(Constants::$passwordsDonotMatch) ?>
                <?= $account->getError(Constants::$passwordLength) ?>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password2" placeholder="Confirm Password" required>
                <input type="submit" name="submitButton" value="Submit">
            </form>
            <a href="./login.php" class="signInMessage">Already have an account? Sing in here!!</a>
        </div>
    </div>

</body>

</html>