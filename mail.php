<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
	  
		// Defining variables
		$name = $email = $text = "";

		// Checking for a POST request
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		    $name = test_input($_POST["name"]);
		    $email = test_input($_POST["email"]);
		    $text = test_input($_POST["review"]);
   
            $to = "superernie77@gmail.com";
			$subject = "Anfrage über Alpenentdecker";
         
			$message = "<b>Neue Kontaktanfrage von Alpenentdecker</b>";
         
			$message .= "<b>Email</p>";
			$message .= $email;
			$message .= "<br>";
		 
			$message .= "<p>Name</p>";
			$message .= $name;
			$message .= "<br>";
		 
			$message .= "<p>Nachricht</p>";
			$message .= $text;
			$message .= "<br>";
		 
			$header = "From:kontakt@alpenentdecker.com \r\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= "Content-type: text/html\r\n";
         
			$retval = mail ($to,$subject,$message,$header);
         
			if( $retval == true ) {
				echo "Message sent successfully...";
			}else {
				echo "Message could not be sent...";
			}
		}
		
		// Removing the redundant HTML characters if any exist.
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
		return $data;
		}
	  
      ?>
	  
	  <h2>Alpenentdecker Kontakt</h2>
		<form method="post" 
			action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		 Name:
			<input type="text" name="name">
			<br>
			<br>
			E-mail:
			<input type="text" name="email">
			<br>
			<br>
			Text
			<textarea name="review"
					rows="5" cols="40">
			</textarea>
			<br>

			<br>
			<input type="submit" name="submit"
				value="Submit">
		</form>
		
		
		<?php
			echo "<h2>Your Input:</h2>";
			echo $name;
			echo "<br>";
			echo $email;
			echo "<br>";
			echo $text;
		?>
   </body>
</html>