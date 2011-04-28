<?php
/*
 * INFORMACION
 */
class Informacion extends CI_Controller {

       public function __construct()
       {
            parent::__construct();   
       }
       
       public function Index(){
    		$this->load->view('informacion_view'); // Contenido
       }
       
}
?>