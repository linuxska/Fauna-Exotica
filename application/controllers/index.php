<?php

class Index extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
   
       }
       
       public function Index(){
       	  $this->load->model('usuario_model');
			$this->load->helper('url');

          $this->load->view('index_view');
       }
       
}
?>