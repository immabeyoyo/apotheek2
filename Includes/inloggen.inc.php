<?php
session_start();
require_once "dbh.inc.php";

// Controleer of de gebruiker al is ingelogd, zo ja, stuur deze dan door naar de welkomstpagina
// if (isset($_SESSION['email'])) {
//   header("Location:../MijnAPO/mijnApo.html");
//   exit;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepared statement voor inloggen.
    $stmt = $conn->prepare("SELECT email, pwd FROM gebruiker WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows == 1) {
      $stmt->bind_result($db_email, $db_password);
      $stmt->fetch();

      // Controleer of het ingevoerde wachtwoord overeenkomt met het gehaste wachtwoord.
      if (password_verify($password, $db_password)) {
        // Inloggen succesvol, start sessie en sla gebruikersgegevens op in $_SESSION.
        $_SESSION['email'] = $email;
        // Stuur door naar de welkomstpagina
        header("Location: ../MijnAPO/mijnApo.php");
        echo "Succesvol ingelogd";
        exit;
      } else {
        echo ("<p>Ongeldig email of wachtwoord. Probeer het opnieuw</p>");
      }
    }
  } else {
    echo ("<p>Vul naam en wachtwoord in.</p>");
  }
}
?>
