<?php
			//padajuci meni sa godinom mesecom i danom
			echo'Datum rodjenaja:   ';
			
			//mesec 
			$mesec = array(1=>'Januar', 'Februar','Mart', 'April', 'Maj','Jun','Jul','Septembar','Oktobar','Novembar', 'Decembar');
			echo'  Mesec:  ';
			echo '<select name = "mesec">';
			
			foreach($mesec as $a => $b){
				echo"<option value = \"$a\">$b</option>";
				
			}
			echo'</select>';
			//mesec kraj
			
			//dan rodjenja
			
			
			
			$dani = range(1,31);
			
			echo'  Dan:  ';
			
			echo '<select name = "dani">';
			for ($dani = 1; $dani <= 31; $dani++){
				echo"<option value = \"$dani\">$dani</option>";
				
			}
			echo'</select>';
			//kraj dan rodjenja
			
			echo' Godina: ';
				
				$godina = range(1940,2002);
				echo '<select name = "godina">';
				for($godina = 1940;$godina <=2002; $godina++ ){
					echo"<option value = \"$godina\">$godina</option>";
					
				}
				
			echo'</select>';
			
			
			
			
			
			
			echo "<br>";
			?>