<?php

	include_once 'CEuroKey.php';
    
    class CEuroKeyWS {
    	
    	public $status;
    	public $data;
		
		public function __construct() {
			
		$this->data = new CEuroKey();
		if ($this->data) {
				$this->status = "ok";
		} else {
			$this->status = "error";
			$this->data = "erro";
			}
		}
		
		public function asJSON() {
			return json_encode($this);
		}
    }
	
	$tmp = new CEuroKeyWS();
	echo $tmp->asJSON();
	
?>