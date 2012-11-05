<?php
class CExtractor {
// properties
private $_n;
private $_set;
private $_ext;

private $_min;
private $_max;

// methods

public function __construct($n,$min,$max) {
	if ($min>$max) {
		$this->_min = $max;
		$this->_max = $min;
	} else {
		$this->_min = $min;
		$this->_max = $max;
	}
	
	$this->_n = $n;
}

public function extract() {
	$this->init_set();
	$this->init_ext();
	
	for($i=0;$i<$this->_n; $i++) {
		$idx = rand(0,count($this->_set)-1);
		$this->_ext[] = $this->_set[$idx];
		array_splice($this->_set,$idx,1); 
	}
	sort($this->_ext);
	return $this->_ext;
}

private function init_set() {
	$this->_set = array();
	for($i=0; $i< $this->_max - $this->_min + 1; $i++) {
		$this->_set[$i] = $this->_min + $i;
	} 
}
private function init_ext() {
	$this->_ext = array();
}
	
}


?>