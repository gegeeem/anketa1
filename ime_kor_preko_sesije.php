<?php
	session_start();
	if(!empty($_SESSION['ime_korisnika'])){
		
		//echo 'Prijavljeni ste kao '.$_SESSION['ime_korisnika'].'  '.$_SESSION['prezime_korisnika'].'  ID: '.$_SESSION['iducesnika'].'   '.$_SESSION['idanketa'];
		//echo'<br>';
		//echo'<p><a href = "logout.php">Odjava</a></p>';
	
		
		
	}else{
		
		
		header("Location: http://localhost/sajtovi/Projekat/dokumenta/prijava.php");
		
	}
?>