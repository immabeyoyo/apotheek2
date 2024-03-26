<?php
require_once "dbh.inc.php";

$table = "gebruiker";
if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["email"])) {
    $message = '<label>Vul alle velden in.</label>';
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Prepareert de statement en preventeerd sql injectie
    $stmt = $conn->prepare("INSERT INTO $table (username, pwd, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);

    // Voert de statement uit
    if ($stmt->execute()) {
      header("Location: ../Voorlichting/voorlichting.html");
      die();
    } else {
        echo "Fout bij het toevoegen van nieuw record: " . $stmt->error;
    }

    // Sluit de statement
    $stmt->close();
}

// Sluit database connectie
$conn->close();
?>