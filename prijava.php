<?php
	session_start();
	if(!empty($_SESSION['administrator'])){
		
		header("Location: http://localhost/sajtovi/Projekat/dokumenta/naslovnaadm.php");
	
	}elseif(!empty($_SESSION['ime_korisnika'])){
		
		header("Location: http://localhost/sajtovi/Projekat/dokumenta/naslovna.php");
	}
	
	
	//include('C:\wamp64novi\www\sajtovi\Projekat\dokumenta\redirekcija_stranica.php');
?>

<!-- Forma za prijavljivanje-->
<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF8'/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  
  background-color:white;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
	/*position: relative;*/
	margin: auto;
	max-width:480px;
  padding: 16px;
  background-color: white;
  //margin-left: 250px;
 
  margin-bottom:20px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: black;
  padding: 16px 20px;
  /*margin: 8px 0;*/
  border: none;
  cursor: pointer;
  width: 70%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
/* Style the content */
			.content {
			  background-color: #ddd;
			  padding: 10px;
			  min-height: 500px;*/ /* Should be removed. Only for demonstration */
			}
.naslov{
	text-align:center;
	background-color: white;
	color: #555;
}
.zelena{
			  overflow: hidden;
			  background-color: #4CAF50;
			  min-height: 5px;
			}
			
/* Style the footer */
			.footer {
			  background-color: #f1f1f1;
			  padding: 10px;
			}

</style>
</head>
<body>

	<h2 class ="naslov" >Prijava za učestvovanje u anketi</h2>
	
	<div class ="zelena">
	
	</div>

		
		
			<!--<form method = "post" action = "include\provera_prijave.php" class = "content">-->
				<form method = "post" action = "include\provera_prijave_PrekoHeaderFje.php" class = "content">
				<div class = "container">
				<fieldset>
							<legend align = "center"> Podaci za prijavu</legend>
								<p><label>Email: <input type = 'text' name = 'email' size = "20" maxlength = '40' required></label></p>
								<p><label>Sifra: <input type = 'password' name = 'sifra'  maxlength = '40' required></label></p>
								<p><label><input type = 'submit' value= 'Prijavite se'></label></p>
				</fieldset>
				</div>
			</form>
		
	<div class="footer">
			<p align = "center">Admin tim</p>
		</div>
		
	</body>
</html>