<?php
require_once './includes/config.php';
require_once './includes/classes/PreviewProvider.php';
require_once './includes/classes/CategoryContainers.php';
require_once './includes/classes/Entity.php';
require_once './includes/classes/EntityProvider.php';


if (!isset($_SESSION['userLoggedIn'])) {
    header("Location: register.php");
}

$userLoggedIn = $_SESSION['userLoggedIn'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyFlix</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/078c5ccadb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/style/style.css">
    <script src="./assets/js/script.js"></script>
</head>

<body>
    <div class="wrapper">