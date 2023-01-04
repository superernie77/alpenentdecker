<!DOCTYPE html>
<html lang="de">
<?php include ('head.php'); ?>
<body>
    <header>
        <?php include ('header.php'); ?>
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

         function test_input($data) {
           $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
       return $data;
           }
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

    <?php include ('footer.php'); ?>

    <?php include ('includes.php'); ?>


</body>
</html>