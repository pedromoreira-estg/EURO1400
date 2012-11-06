<?php

// consultar pedir uma chave a um serviço externo

$a = file_get_contents("http://localhost/SIR1213/EURO1400/EuroKeyWS.php?nn=12&ns=3");
$objectoPHP = json_decode($a);



function keyAsHTML($n,$s) {
	$html = "";
	$html .= "\n<div class=\"key\">";
	// numeros
	$html .= "\n\t<ul class=\"numbers\">";
	foreach($n as $number) {
		$html.= "\n\t\t<li> $number </li>";
	}
	$html .= "\n\t</ul>";
	$html .= "\n\t<ul class=\"stars\">";
	foreach($s as $star) {
		$html.= "\n\t\t<li> $star </li>";
	}
	$html .= "\n\t</ul>";
	$html .= "\n</div>";
	return $html;
}

function keyAsXML($n,$s) {
	$xml = new SimpleXMLElement("<div/>");
	$ln  = $xml->addChild("ul");
	$ls  = $xml->addChild("ul");
	
	$xml->addAttribute("class","key");
	$ln->addAttribute("class","numbers");
	$ls->addAttribute("class","stars");
	
	foreach($n as $number) {
		$ln->addChild("li",$number);
	}
	foreach($s as $star) {
		$ls->addChild("li",$star);
	}
	return $xml->asXML();

}


?>

<html>
	<head>
	<title>
		Chave do Euromilhões
	</title>
	<link rel="stylesheet" href="css/euro.css" />
	</head>
	<body>
		<h1>A Chave Vencedora</h1>
		<?php echo keyAsHTML($objectoPHP->data->numbers,$objectoPHP->data->stars);?>
		<!--?php echo keyAsXML($numbers,$stars);?-->
	</body>
</html>
