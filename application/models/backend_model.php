<?php

class Backend_model extends CI_Model {

		/* Constructor */
		public function __construct(){
            parent::__construct();
            // Your own constructor code
        	$this->load->database();
		}
       
}
?>
