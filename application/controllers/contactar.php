<?php

class Contactar extends CI_Controller {

       public function __construct()
       {
            parent::__construct();

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
			$config['mailtype'] = "text";
			$config['newline'] = "\r\n";
			$config['_smtp_auth']  = TRUE;
			
			$this->email->initialize($config);    
       }
       
       public function Index(){
       	    if( $this->session->userdata('logged_in') ===  TRUE) redirect('cuenta/index');
       			
       		// Reglas de validacion del formulario
			$this->establecer_reglas();
			
       		/* Datos para la vista */
       		$head['titulo'] = "Inicio";
       		$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
    		$this->load->view('menu', $menu);
    		
    		if($this->form_validation->run()==FALSE){
    			$this->load->view('contactar_view');
    		} else {
    			$nombre = $this->input->post('nombre');
    			$email = $this->input->post('email');
    			$asunto = $this->input->post('asunto');
    			$msg = $this->input->post('mensaje');
    			
    			// Datos del mensaje
				$this->email->from($email, $nombre);
				$this->email->to('lauscar.sl@gmail.com');
				$this->email->subject($asunto);				
				$this->email->message($msg);
				$this->email->set_alt_message(strip_tags($msg)); 
				
				// Enviando email
		       	if ($this->email->send()){
		       		$this->load->view('menu', $menu);
					$this->load->view('cuenta/email_enviado_view');
					
		       	} else show_error($this->email->print_debugger());	
    		} 
    		
    		$this->load->view('footer');
       }

       	// Reglas Form Validation
		private function establecer_reglas(){
       		$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[3]');
			$this->form_validation->set_rules('email', 'email', 'valid_email');
			$this->form_validation->set_rules('asunto', 'nombre', 'required|trim|min_length[5]');
			$this->form_validation->set_rules('mensaje', 'nombre', 'required|min_length[5]|max_length[150]');
			
			$this->form_validation->set_message('required', 'Debe introducir el campo %s');
			$this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s caracteres');
			$this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres');
			$this->form_validation->set_message('valid_email', 'Debe escribir una dirección de email correcta');			
		}
}
?>
