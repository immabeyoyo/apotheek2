<?php
    session_start();
    require_once "dbh.inc.php";
    // Checkt of de gebruiker wel ingelogd is. Anders wordt hij doorgestuurd naar inloggen.html
    if (!isset($_SESSION['email'])) {
      header("Location:../Inloggen/inloggen.html");
      exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // New values for woonplaats and telnmr
      $new_woonplaats = $_POST['woonplaats'];
      $new_telnmr = $_POST['telnmr'];
      $user_email = $_SESSION['email'];

      // Prepared statement for updating woonplaats and telnmr
      $stmt = $conn->prepare("UPDATE gebruiker SET woonplaats = ?, telnmr = ? WHERE email = ?");
      $stmt->bind_param("sss", $new_woonplaats, $new_telnmr, $user_email);
      $stmt->execute();

      if ($stmt->affected_rows > 0) {
          echo "Gegevens aangepast!";
      } else {
          echo "Failed to update values.";
      }
    } 
    ?>