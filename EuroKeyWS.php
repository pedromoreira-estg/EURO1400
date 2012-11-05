<?php
	include_once 'CEuroKeyWS.php';
	// validar 
	// verificar se existem
	
	if (isset($_GET['nn'])) {
		$nn = $_GET['nn'];
	} else {
		$nn = CEuroKey::NN;
	}
	
	// se nao for numerico
	if (!is_numeric($nn)) {
		$nn = CEuroKey::NN;
	}
	

	// se é numerico
	
	if (isset($_GET['ns'])) {
		$ns = $_GET['ns'];
	} else {
		$ns = CEuroKey::NS;
	}
	
		// se nao for numerico
	if (!is_numeric($ns)) {
		$ns = CEuroKey::NS;
	}
	

	$chave = new CEuroKeyWS($nn,$ns);
	echo $chave->asJSON();
?>