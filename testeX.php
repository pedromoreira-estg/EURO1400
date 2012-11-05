<?php
    $a = file_get_contents("http://localhost/SIR1213/EURO1400/EuroKeyWS.php");
	
	print_r($a);
	
	echo "<br/>";
	$objectoPHP = json_decode($a);
	
	print_r($objectoPHP);
?>