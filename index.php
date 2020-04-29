<?php
require_once './includes/header.php';

$preview = new PreviewProvider($con, $userLoggedIn);
$preview->createPreviewVideo();