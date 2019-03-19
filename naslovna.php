<?php
		include('C:\wamp64novi\www\sajtovi\Projekat\dokumenta\include\ime_kor_preko_sesije.php');
		
		//include('C:\wamp64novi\www\sajtovi\Projekat\dokumenta\redirekcija_stranica2.php');
		/*if(!empty($_SESSION['administrator'])){
		
		header("Location: http://localhost/sajtovi/Projekat/dokumenta/naslovnaadm.php");
	
	}elseif(!empty($_SESSION['ime_korisnika'])){
		
		header("Locatio: http://localhost/sajtovi/Projekat/dokumenta/naslovna.php");
	}*/
	
	
	//redirekcija stranica
	
	
	//include('C:\wamp64novi\www\sajtovi\Projekat\dokumenta\redirekcija_stranica.php');
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
	
			<style>
			* {
			  box-sizing: border-box;
			  font-family: Arial, Helvetica, sans-serif;
			}
			.zaglavlje {
			  color: black;
			 
			  padding: 10px;
			  text-align: center;
			}

			body {
			  margin: 0;
			  font-family: Arial, Helvetica, sans-serif;
			}

			/* Style the top navigation bar */
			.topnav {
			  overflow: hidden;
			  background-color: #4CAF50;
			}

			/* Style the topnav links */
			.topnav a {
			  float: left;
			  display: block;
			  color: #f2f2f2;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;
			}
			
			
			
			.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
			
			
			
			.prija {
				 float: left;
			  display: block;
			  color: #f2f2f2;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;
			}

			/* Change color on hover */
			.topnav a:hover {
			  background-color: #ddd;
			  color: black;
			}

			/* Style the content */
			.content {
			  background-color: #ddd;
			  padding: 10px;
			  min-height: 300px; /* Should be removed. Only for demonstration */
			}
			.pitanje{
				 float: left;
				min-width: 50%;
				padding: 10px;
			}
			.slika{
				width:50%;
			}
			.paragraf{
				color: red;
			}

			/* Style the footer */
			.footer {
			  background-color: #f1f1f1;
			  padding: 10px;
			}
			</style>
</head>

<body>
<div class = "zaglavlje">
	<h2> Učestvujte u jednoj ili više anketa i osvojite jednu od nagrada</h2>
</div>
<div class="topnav" id="myTopnav">

  
  <a href="naslovna.php">Naslovna</a>
  

  <a href = "spisak_pozvanih_ucesnika.php">Spisak pozvanih ucesnika</a>
 <?php echo'<a href = "#">Prijavljeni kao: '.$_SESSION['ime_korisnika'].'  '.$_SESSION['prezime_korisnika'].'</a>';?>
 <?php
if(isset($_SESSION['administrator'])){
	 
	 echo'<a href = "naslovnaadm.php">Admin naslovna</a>';
	echo'<a href = "admin_odjava.php">Odjava</a>';
 }else{
	 
 
  echo'<a href="logout.php">Odjava</a>';
 }
 ?>
 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="content">
	
	<div class = "pitanje">
	<?php
		
		
		include('C:\wamp64novi\www\sajtovi\Projekat\konekcija_sa_bazom.php'); // konekcija sa bazom
		
		// Da li su dodljene nagrada ako jesu onda je kraj ankete ako ne prikazi izbor ucestvovanja u nekoj od anketa
		$da_li_je_dodeljena_nagrada = "SELECT * FROM nagrada WHERE nagrada.iducesnici IS NOT NULL";
		$pokreni_da_li_je_dodeljena_nagrada = @mysqli_query($dbc, $da_li_je_dodeljena_nagrada);
			
		$da_li_postoji_vrsta = mysqli_num_rows($pokreni_da_li_je_dodeljena_nagrada);
	
		if($da_li_postoji_vrsta >= 1){
			
			
			include('spisak_nagradjenih.php');
			
		
		}else{//posto nagrade nisu dodeljene, anketa jos traje prikazi izbor anketa
		
				/*//broj ucesnika ankete
					$upit_za_br_korisnika1 = "SELECT * FROM ucesnici_has_anketa WHERE anketa_idankete  = '1'"; // pronadji ucesnike
					$provera = @mysqli_query($dbc, $upit_za_br_korisnika1); //izvrsi upit
					$brvrsta_anketiranih = mysqli_num_rows($provera);
				
				//kraj broj ucesnika ankete*/
				
				
				$iducesnika = $_SESSION['iducesnika'];
				//da li zavrsena pametni transport
				$upit_anketa1 = "SELECT * FROM ucesnici_pitanja_text_odgovori WHERE idankete = '1' AND iducesnici = '$iducesnika' AND idpitanja = '6'";
				$pokreni_upit_anketa1 = @mysqli_query($dbc, $upit_anketa1);
				$broj_vrsta_anketa1 = mysqli_num_rows($pokreni_upit_anketa1);
				include('C:\wamp64novi\www\sajtovi\Projekat\dokumenta\nedovrsena_anketa.php');
				//kraj provere da li je zavrsena pametni transport
				
				//da li zavrsena pametno zdrastvo
				$upit_anketa2 = "SELECT * FROM ucesnici_pitanja_text_odgovori WHERE idankete = '2' AND iducesnici = '$iducesnika' AND idpitanja = '11'";
				$pokreni_upit_anketa2 = @mysqli_query($dbc, $upit_anketa2);
				$broj_vrsta_anketa2 = mysqli_num_rows($pokreni_upit_anketa2);
				//kraj provere da li je zavrsena pametno zdrastvo
				
				//da li ocuvanje zivotne sredine
				$upit_anketa3 = "SELECT * FROM ucesnici_pitanja_text_odgovori WHERE idankete = '3' AND iducesnici = '$iducesnika' AND idpitanja = '20'";
				$pokreni_upit_anketa3 = @mysqli_query($dbc, $upit_anketa3);
				$broj_vrsta_anketa3 = mysqli_num_rows($pokreni_upit_anketa3);
				//kraj provere da li je zivotne sredine
				
				echo'<form action = "include\izbor_ankete.php" method = "POST">';
						
								echo'<p> Izaberite anketu</p>';
				
											if($broj_vrsta_anketa1 > 0 /*|| $brvrsta_anketiranih == 20*/) {//ukoliko je ucesnik uradio anketu AND ako je broj ucesnika ankete 20
												echo'<label><p class = "paragraf"> <input type = "radio" name = "anketa" value ="1" disabled>Pametni transport anketa je zavrsena</p></label>';
											}elseif($broj_vrsta_anketa1 == 0){
												
											
											$upit1 = "DELETE FROM ucesnici_has_odgovor_jeddan WHERE idankete = '1' AND ucesnici_iducesnici = '$iducesnika'";
											$pokreni_upit1 = @mysqli_query($dbc, $upit1);
											$upit1text = "DELETE FROM ucesnici_pitanja_text_odgovori WHERE idankete = '1' AND iducesnici = '$iducesnika'";
											$pokreni_upit1text = @mysqli_query($dbc, $upit1text);
											
											echo'<label><p> <input type = "radio" name = "anketa" value ="1" required>Pametni transport</p></label>';

											}
				
					
								
											if($broj_vrsta_anketa2 > 0){
												echo'<label><p class = "paragraf"> <input type = "radio" name = "anketa" value ="2" disabled>Pametno zdravlje anketa je zavrsena</p></label>';
											}elseif($broj_vrsta_anketa2 == 0){
												$upit2 = "DELETE FROM ucesnici_has_odgovor_jeddan WHERE idankete = '2' AND ucesnici_iducesnici = '$iducesnika'";
												$pokreni_upit2 = @mysqli_query($dbc, $upit2);
												
												$upit2text = "DELETE FROM ucesnici_pitanja_text_odgovori WHERE idankete = '2' AND iducesnici = '$iducesnika'";
												$pokreni_upit2text = @mysqli_query($dbc, $upit2text);
												
												echo'<label><p><input type = "radio" name = "anketa" value ="2" required>Pametno zdravlje</p></label>';
											}
											
											if($broj_vrsta_anketa3 > 0){
												echo'<label><p class = "paragraf"> <input type = "radio" name = "anketa" value ="3" disabled>Očuvanje zivotne sredine anketa je završena</p></label>';
											}elseif($broj_vrsta_anketa3 == 0){
												$upit3 = "DELETE FROM ucesnici_has_odgovor_jeddan WHERE idankete = '3' AND ucesnici_iducesnici = '$iducesnika'";
												$pokreni_upit3 = @mysqli_query($dbc, $upit3);
												
												$upit3text = "DELETE FROM ucesnici_pitanja_text_odgovori WHERE idankete = '3' AND iducesnici = '$iducesnika'";
												$pokreni_upit3text = @mysqli_query($dbc, $upit3text);
												
												echo'<label><p> <input type = "radio" name = "anketa" value ="3" required>Očuvanje zivotne sredine </p></label>';
											}
											
										echo'<label><p><input type = "submit" value= "Pocnite anketu"></p></label>';
						
					echo'</form>';
			}
		?>
		</div>
	<script>	
		function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
		
  
</div>

<div class="footer">
  <p align = "center">Admin tim</p>
</div>
		
</body>
</html>