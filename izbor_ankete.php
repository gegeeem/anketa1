<?php
	SESSION_START();
	
	if($_POST['anketa'] == 1){
		$_SESSION['idanketa'] = 1;
		
		
		
		
		header("Location: http://localhost/sajtovi/Projekat/dokumenta/ispis_uceniciodgovri.php");
		
		
	}elseif($_POST['anketa'] == 2){
		
		$_SESSION['idanketa'] = 2;
	
		header("Location: http://localhost/sajtovi/Projekat/dokumenta/pitanje2.1.php");
		
	}elseif($_POST['anketa'] == 3){
		
		$_SESSION['idanketa'] = 3;
	
		header("Location: http://localhost/sajtovi/Projekat/dokumenta/pitanje3.1.php");
	}

?>