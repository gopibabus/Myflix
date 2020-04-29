<?php
if (isset($_POST['submitButton'])) {
    echo "Submitted";
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
                <input type="text" name="username" placeholder="username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="submitButton" value="Submit">
            </form>
            <a href="./register.php" class="signInMessage">Need an account? Sing up here!!</a>
        </div>
    </div>

</body>

</html>