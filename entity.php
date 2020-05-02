<?php

require_once './includes/header.php';

if (!isset($_GET['id'])) {
    ErrorMessage::show('Not id passed into page');
}

$entityId = $_GET['id'];
$entity = new Entity($con, $entityId);

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createPreviewVideo($entity);

$seasonProvider = new SeasonProvider($con, $entityId);
echo $seasonProvider->create($entity);

$categoryContainers = new CategoryContainers($con, $entityId);
echo $categoryContainers->showCategory($entity->getCategoryId(), 'You might also like');