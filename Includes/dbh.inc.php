<?php
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
