<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $pwd = $_POST["pwd"];
  $email = $_POST["email"];

  try {
      require_once "dbh.inc.php";

      $query = "INSERT INTO gebruiker (username, pwd, email) VALUES (:username, :pwd, :email);";

      $stmt = $pdo->prepare($query);

      $stmt->bindParam(":username", $username);
      $stmt->bindParam(":pwd", $pwd);
      $stmt->bindParam(":email", $email);

      $stmt->execute();

      $pdo = null;
      $stmt = null;

      header("Location: ../Inschrijven/inschrijven.html");
      die();
  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }
} else {
  header("Location: ../Inschrijven/inschrijven.html");
}