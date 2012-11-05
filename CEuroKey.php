<?php

include_once 'CExtractor.php';

class CEuroKey {
	
	const NN = 5;
	const NS = 2;
	const MINN = 1;
	const MINS = 1;
	const MAXN = 50;
	const MAXS = 11;
	
	private $_nn;
	private $_ns;
	private $_minn;
	private $_mins;
	private $_maxn;
	private $_maxs;
	
	public $numbers = array();
	public $stars   = array();
	
	private $extn;
	private $exts;
	
		
	
	
	public function __construct(
			$nn 	= CEuroKey::NN,
			$ns 	= CEuroKey::NS,
			$minn 	= CEuroKey::MINN,
			$maxn	= CEuroKey::MAXN,
			$mins	= CEuroKey::MINS,
			$maxs	= CEuroKey::MAXS) {
				$this->_nn = $nn;
				$this->_ns = $ns;
				$this->_minn = $minn;
				$this->_maxn = $maxn;
				$this->_mins = $mins;
				$this->_maxs = $maxs;
				
				$this->extn = new CExtractor($this->_nn, $this->_minn, $this->_maxn);
				$this->exts = new CExtractor($this->_ns, $this->_mins, $this->_maxs);
				
				$this->numbers 	= $this->extn->extract();
				$this->stars	= $this->exts->extract();
			}
			
			
	public function generateEuroKey() {
		$this->numbers 	= $this->extn->extract();
		$this->stars	= $this->exts->extract();
	}
}

?>