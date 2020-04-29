<?php

declare(strict_types=1);

# Turns on Output Buffering
ob_start();
session_start();

date_default_timezone_set('America/Chicago');

try {
  $host = '165.227.204.253';
  $db = 'gopiflix';
  $charset = 'utf8mb4';
  $user = 'harika_ammu';
  $pass = 'harika_ammu';

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

  $options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ];
  $con = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $ex) {
  exit('Connection Failed: ' . $ex->getMessage());
}
