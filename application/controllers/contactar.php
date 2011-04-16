<?php

class Contactar extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
            
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('email');
		    $this->load->library('email');
		    
			// Configuracion email
			$config['protocol'] = "smtp";
			$config['smtp_host'] = "ssl://smtp.gmail.com";
			$config['smtp_port'] = "465";
			$config['smtp_timeout'] = "7"; 
			$config['smtp_user'] = "lauscar.sl@gmail.com";
			$config['smtp_pass'] = "faunaexotica";
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";
			$config['_smtp_auth']  = TRUE;
			
			$this->email->initialize($config);   
   
       }
       
       public function Index(){
       		/* Datos para la vista */
       		$head['titulo'] = "Inicio";
       		$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
    		$this->load->view('menu', $menu);
    		
    		// Contenido principal
    		if($this->form_validation->run()==FALSE){
    			$this->load->view('contactar_view');
    		} else {
    			
    		} 
    		
    		$this->load->view('footer');
       }

}
?>
