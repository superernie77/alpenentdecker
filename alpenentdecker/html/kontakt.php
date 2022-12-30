<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alpenentdecker</title>
    <link rel="shortcut icon" type="image/png" href="../img/logo.png"/>

    <link href="https://fonts.googleapis.com/css?family=Rajdhani:300,500,600|Source+Sans+Pro:400,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">

    <!-- Mein CSS -->
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <header>
        <div id="head">
            <nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
                <!--Logo rechts-->
                <a  class="navbar-brand" href="../index.html"><img src="../img/logo.png"></a>

                <!--Navbar Button für kleine Screens -->
                <button class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarNavDropdown">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Inhalt Menü-->
                <div class="collapse navbar-collapse justify-content-end bg-navbar" id="navbarNavDropdown">
                    <ul class="navbar-nav align-self-end flex-wrap" id="nav">
                        <li class="nav-item"><a class="nav-link" href="../index.html">Start</a></li>
                        <!--Submenü Veranstaltungen-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown">Veranstaltungen</a>
                            <ul class="dropdown-menu dropdown-menu-right bg-navbar">
                                <li><a class="dropdown-item" href="kinder.html">Kinder & Jugendliche </a></li>
                                <li><a class="dropdown-item" href="familien.html">Familien</a></li>
                                <li><a class="dropdown-item" href="frauen.html">Frauen</a></li>
                                <li><a class="dropdown-item" href="firmen.html">Firmen</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="termine.html">Termine</a></li>
                        <!--Submenü Über-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Über</a>
                            <ul class="dropdown-menu dropdown-menu-right bg-navbar">
                                <li><a class="dropdown-item" href="uns.html">Über uns</a></li>
                                <li><a class="dropdown-item" href="alpen.html">Die Alpen</a></li>
                                <li><a class="dropdown-item" href="infos.html">Praktische Infos</a>  </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="kontakt.html">Kontakt</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div>
            <img class="banner" src="../img/ueber_alpen.jpeg" />
        </div>  
        <div class="banner-caption">
            <h1>Kontakt</h1>
        </div>   
    </header>

    <div class="container">
        <div class="content">
    
            <div class="row">
                <div class="col-md-6">
                <?php
	  
      $name = $email = $text = $phone = "";

      // Bei Formsubmission
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $name = test_input($_POST["name"]);
          $email = test_input($_POST["email"]);
          $text = test_input($_POST["review"]);
          $phone = test_input($_POST["phone"]);
 
          $to = "info@alpenentdecker.de";
          $subject = "Anfrage über Alpenentdecker";
       
          $message = "<b>Neue Kontaktanfrage von Alpenentdecker</b>";
       
          $message .= "<p><b>Email</b></p>";
          $message .= $email;
          $message .= "<br>";
       
          $message .= "<p><b>Name</b></p>";
          $message .= $name;
          $message .= "<br>";

          $message .= "<p><b>Telefon</b></p>";
          $message .= $phone;
          $message .= "<br>";
       
          $message .= "<p><b>Nachricht</b></p>";
          $message .= $text;
          $message .= "<br>";
       
          $header = "From:kontakt@alpenentdecker.com \r\n";
          $header .= "MIME-Version: 1.0\r\n";
          $header .= "Content-type: text/html\r\n";
       
          $retval = mail ($to,$subject,$message,$header);
       
          if( $retval == true ) {
              echo "<div class='alert alert-success' role='alert'>Kontaktanfrage wurde gesendet.</div>";
          }else {
            echo "<div class='alert alert-danger' role='alert'>Fehler beim Senden der Anfrage.</div>";
          }
      }
      
      function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
      return $data;
      }
    
    ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Vor- und Nachname</label>
                            <input type="text" class="form-control" id="name" name="name" required="true" placeholder="Vor- und Nachname">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">E-Mail Adresse</label>
                            <input type="email" class="form-control" id="email" name="email" required="true" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput3">Telefon</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required="true" placeholder="Telefon">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Nachricht</label>
                            <textarea class="form-control" id="review" name="review" required="true" placeholder="Nachricht" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-teaser submit">Absenden</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<footer>
    <a  href="#"><img src="../img/logo.png"></a>
    <p>  
        <a  href="impressum.html">Impressum</a>
        <a  href="datenschutz.html">Datenschutz</a>
        <a  href="agbs.html">AGBs</a>
    </p>
    <div class="copyright">
        <p>&copy; 2023 all rights reserved</p>
    </div>
</footer>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>