<?php
	include_once 'CEuroKey.php';
    
    class CEuroKeyWS {
    	
    	public $status;
    	public $data;
		
		public function __construct($nn = CEuroKey::NN,$ns = CEuroKey::NS) {
			
		$this->data = new CEuroKey($nn,$ns);
		
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
	
?>