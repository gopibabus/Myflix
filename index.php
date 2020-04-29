<?php
require_once './includes/config.php';

if (!isset($_SESSION['userLoggedIn'])) {
    header("Location: register.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyFlix Homepage</title>
</head>

<body>
    <img src="./assets/images/logo.png" alt="Logo" title="MyFlix Logo">
</body>

</html>