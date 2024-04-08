<?php
require_once "dbh.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
  
      // Wachtwoord hashen
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
      // Prepared statement voor de registratie
  
      $stmt = $conn->prepare("INSERT INTO gebruiker (email, pwd) VALUES(?, ?)");
      $stmt->bind_param("ss", $email, $hashed_password);
  
      // Voer de query uit
      if ($stmt->execute()) {
        header ("Location: ../Aangemeld/aangemeld.html");
          } else {
            echo "Error: " . $sql . "<br>" . $conn_error;
          }
        } else {
          echo "<p>Vul een naam en wachtwoord in</p>";
      }
  }
// $table = "gebruiker";
// if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["email"])) {
//     $message = '<label>Vul alle velden in.</label>';
// } else {
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $email = $_POST['email'];

//     // Prepareert de statement en preventeerd sql injectie
//     $stmt = $conn->prepare("INSERT INTO $table (username, pwd, email) VALUES (?, ?, ?)");
//     $stmt->bind_param("sss", $username, $password, $email);

//     // Voert de statement uit
//     if ($stmt->execute()) {
//       header("Location: ../Aangemeld/aangemeld.html");
//       die();
//     } else {
//         echo "Fout bij het toevoegen van nieuw record: " . $stmt->error;
//     }

//     // Sluit de statement
//     $stmt->close();
// }

// Sluit database connectie
$conn->close();
?>