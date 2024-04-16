<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="CV, Maak CV, Solliciteren, Maker">
    <meta name ="Description" content="Dit is een website over de plaatstelijke apotheek.">
    <link rel="stylesheet" href="../MijnAPO/mijnApo.css">
    <title>Apotheek</title>
    <link rel="icon" type="image/x-icon" href="Logo.png">
  </head>
  <body>
    <header>
      <nav>
        <div class="logo">
          <a href="../Home/home.html">
              <img src="../Home/HomeFotos/Logo.png" alt="Logo">
          </a>
      </div>
  
        <div class="nav-item">
            <a href="../Service/service.html">Herhaalservice</a>
        </div>
  
        <div class="nav-item">
            <a href="../Medicijnen/medicijnen.html">Medicijnoverzicht</a>
        </div>
  
        <div class="nav-item">
            <a href="../Voorlichting/voorlichting.html">Voorlichting</a>
        </div>
  
        <div class="separator"></div>
  
        <div class="right-buttons">
            <a href="../MijnAPO/mijnApo.php" class="login-button">Mijn APO</a>
            <a href="../Inschrijven/inschrijven.html" class="signup-button">Aanmelden</a>
        </div>
      </nav>
    </header>
    <div class="mijnApo">
      <form action="../Includes/Gegevensphp.php" method="post">
      <h2>Pas hier je gegevens aan.</h2>
      <input type="text" name="woonplaats" placeholder ="Woonplaats..."><br>
      <input type="text" name="telnmr" placeholder ="Telefoonnummer...">
      <button type="submit">Aanpassen</button>
    </form>
    </div>

    <form action="../Includes/Logout.php" method="post">
    <button type="submit">Logout</button>
    </form>
    <form action="../Includes/Gegevens.php" method="post">
    <button type="submit">Pas gegevens aan</button>

    <?php
    session_start();
    require_once "dbh.inc.php";
    // Checkt of de gebruiker wel ingelogd is. Anders wordt hij doorgestuurd naar inloggen.html
    if (!isset($_SESSION['email'])) {
      header("Location:../Inloggen/inloggen.html");
      exit;
    }
    ?>

  </body>
</html>
