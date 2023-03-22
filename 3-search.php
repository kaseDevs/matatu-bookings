<?php
// (A) DATABASE CONFIG - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "matatubookingsdb");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "");
 
// (B) CONNECT TO DATABASE
$pdo = new PDO(
  "mysql:host=".DB_HOST.";charset=".DB_CHARSET.";dbname=".DB_NAME,
  DB_USER, DB_PASSWORD, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

// (C) SEARCH
$stmt = $pdo->prepare("SELECT * FROM `schedules` JOIN matatus ON schedules.mat_id=matatus.matatu_id WHERE `travel_from` LIKE ? AND `travel_to` LIKE ?");
// $stmt = $pdo->prepare("SELECT * FROM `schedules` WHERE `travel_date` LIKE ?");
$stmt->execute(["%".$_POST["travel_from"]."%", "%".$_POST["travel_to"]."%"]);
// $stmt->execute(["%".$_POST["travel_date"]."%"]);
$results = $stmt->fetchAll();
if (isset($_POST["ajax"])) { echo json_encode($results); }