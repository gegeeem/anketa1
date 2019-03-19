<!--ovo je  forma za registraciju korisnika-->


<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF8'/>
<!DOCTYPE html>
<html>
<head>
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
	max-width:800px;
  padding: 16px;
  background-color: white;
  
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
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
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
			  /*height: 200px;*/ /* Should be removed. Only for demonstration */
			}
.naslov{
	text-align:center;
	color:#555;
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
	
	<h2 class ="naslov" >Registracija za učestvovanje u anketi</h2>
	
	
	
	<div class ="zelena">

	</div>
	
	<form action='validacijaforme.php' method = 'post'  class = "content">
	
		<div class = "container">
		<fieldset>
			<legend align = "center">Unesite vaše podatke u formu </legend>
			<p><label>Ime:     <input  type='text' name='ime' max-size='30' maxlength="40" required></label></p>
			<p><label>Prezime: <input  type='text' name='prezime' max-size='30' maxlength="40" required></label></p>
			<p><label>E-mail:  <input  type='text' name='email' max-size='30' maxlength="40" required></label></p>
			<p><label>Sifra:  <input  type='password' name='sifra' max-size='30' maxlength="40" required></label></p>
			<p>
				<label for='pol'>Pol: <input  type='radio' name='pol' value='muski' required>Muški</label>
				<label for='pol'><input  type='radio' name='pol' value='zenski' required>Ženski</label>
				<label for='pol'><input  type='radio' name='pol' value='drugo' required>Drugo</label>
			</p>
			<?php require('include\datum.php'); ?>
			
			
			<p><input type='submit' value='Registrujte se'></p>
		</fieldset>
		</div>
		
	
	
	</form>
	
	<div class="footer">
		<p align = "center">Admin tim</p>
	</div>
</body>
</html>