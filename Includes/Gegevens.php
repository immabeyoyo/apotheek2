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

<footer class="footer">
  <div class="contact">
      <h2 class="contact-heading">CONTACT</h2>
      <address>
          <p class="contact-address">
              <img src="HomeFotos/Marker Icon2.jpg" height="38" width="39">
              <span>Hofstraat 13<br>Schagen</span>
          </p>
          <p class="contact-phone">
              <img src="HomeFotos/Telephone Icon.jpg" height="38" width="39">
              <span>Telefoon:<br>0031 (0) 3 41 23 03 60 </span>
          </p>
          <p class="contact-email">
              <img src="HomeFotos/Mail Icon.jpg" height="38" width="39">
              <span>Mail ons op:<br>Schutapotheker@gmail.com</span>
          </p>
          <p class="contact-hours">
              <img src="HomeFotos/Marker Icon.jpg" height="38" width="39">
              <span>Ma t/m vrij 8 - 17 uur<br> Za 9 - 16 uur</span>
          </p>
      </address>
  </div>


  <div class="google-map">
    <!-- Google Maps Embed -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.7498620249646!2d4.789842714399079!3d52.790848724594425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c7d05d0c4cbe15%3A0x1e5874796de42b84!2sHofstraat%2013%2C%201747%20EV%20Schagen%2C%20Netherlands!5e0!3m2!1sen!2suk!4v1648058298305!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

  <div class="menu">
    <h2>MENU</h2> <br></br>
    <ul>
        <li><a href="home.html">Home</a></li> <br></br>
        <li><a href="herhaalservice.html">Herhaalservice</a></li> <br></br>
        <li><a href="medicijnoverzicht.html">Medicijnoverzicht</a></li> <br></br>
        <li><a href="voorlichting.html">Voorlichting</a></li> <br></br>
        <li><a href="privacy_en_cookies.html">Privacy en Cookies</a></li> <br></br>
        <li><a href="algemene_voorwaarden.html">Algemene voorwaarden</a></li> <br></br>
    </ul>
</div>



  <div class="newsletter-container">
      <h2>NIEUWSBRIEF</h2><br><br>
      <div class="search-bar">
          <input type="text" placeholder="Email @example.com" id="search-input">
          <button onclick="stuurEmail()">Verstuur</button>
      </div>
      <div class="follow-container">
          <h2>VOLG ONS!</h2>
      </div>


      <div>
        <img src="HomeFotos/1298747_instagram_brand_logo_social media_icon.png">
        <img src="HomeFotos/3225183_app_logo_media_popular_social_icon.png">
        <img src="HomeFotos/5296499_fb_facebook_facebook logo_icon.png">

      </div>
  </div>
</footer>
  </body>
</html>
