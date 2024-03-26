<?php
/*

$dsn = "mysql:host=localhost;dbname=apotheek";
$dbusername = "root";
$dbpassword = "";

try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
*/

// Gegevens van database.
$servername = "localhost";
$username = "root";
$password = "";
$database = "apotheek";

// Maakt connectie met database.
$conn = new mysqli($servername, $username, $password, $database);
  if($conn->connect_error) {
    die("Kan geen verbinding maken met de database. " .$conn->connect_error);
  };
