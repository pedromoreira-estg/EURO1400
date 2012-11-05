<?php

include_once 'CExtractor.php';

$en = new CExtractor(5,1,50);
$es = new CExtractor(2,1,11);

$numbers = $en->extract();
$stars   = $es->extract();

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
		<?php echo keyAsHTML($numbers,$stars);?>
		<?php echo keyAsXML($numbers,$stars);?>
	</body>
</html>

?>