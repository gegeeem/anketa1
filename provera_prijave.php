<?php
	session_start();
?>
<!DOCTYPE>
<html>
	<head>
		<meta charset = 'UTF8'/>
	</head>
	
	<body>
	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		
			
			
		
						$email = $_POST['email'];
						
						
						require('C:\wamp64novi\www\sajtovi\Projekat\konekcija_sa_bazom.php');
						//provera postojece mail adrese
						$upit_za_mail = "SELECT * FROM ucesnici WHERE email ='$email'"; // pronadji upit sa unetom email adresom
						$provera_za_mail = @mysqli_query($dbc, $upit_za_mail); //izvrsi upit
						$brkolona_mail = mysqli_num_rows($provera_za_mail);
						
						if($brkolona_mail == 0){
							echo'Ne postoji registrovan korisnik sa email adresom:  '.$email.' Pokusajte ponovo<br>';
							$email = NULL;
							$sifra = NULL;
							
						}else{
							echo'Vasa email adresa je tacna<br>';
							
								
								//kraj provere maila
								//provera lozinke
								$sifra = $_POST['sifra'];
								$upit_za_lozinku = "SELECT * FROM ucesnici WHERE sifra ='$sifra' AND email ='$email'";
								$provera_za_lozinku = @mysqli_query($dbc, $upit_za_lozinku);
								$brkolona_sifra = mysqli_num_rows($provera_za_lozinku);
								
								if($brkolona_sifra == 0){
									echo'Netacna lozinka!';
								}else{
									
									echo'PRijava  lozinke uspesna';
									
								}
						}
						if($brkolona_mail == 0 || $brkolona_sifra == 0){ //ako je email netacan ili sifra netacna prikazi dugme
																		// za povratak na prijavu opet
							
												
							echo '<form action = "/sajtovi/Projekat/dokumenta/prijava.php">';
								echo'<input type = "submit" value = "Povratak na prijavu">';
							echo'</form>';
						}
						
						if(($brkolona_mail > 0) && ($brkolona_sifra > 0)){
							
							
							$row = mysqli_fetch_array ($provera_za_mail, MYSQLI_ASSOC);
									
									
									
									session_start();
							$_SESSION['ime_korisnika']= $row['ime'];
							$_SESSION['prezime_korisnika'] = $row['prezime'];
							$_SESSION['iducesnika'] = $row['iducesnici'];
							$_SESSION['idanketa'] = '';
							$_SESSION['pitanje'] = '';
							$_SESSION['kraj_1ankete']='';
							
							
							
							mysqli_close($dbc);
							header("Location: http://localhost/sajtovi/Projekat/dokumenta/naslovna.php");
							
						}
		}else{
		echo'Unesite podatke ponovo';
		//require('C:\wamp64novi\www\sajtovi\Projekat\dokumenta\prijava.php');
	}
			
	?>
		
		
		
	</body>
</html>