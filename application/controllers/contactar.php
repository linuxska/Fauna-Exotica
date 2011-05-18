<?php
/*
 * CONTACTAR
 * Permite al usuario mandar un email con un mensaje corto.
 * Se envia a través de gmail por SMTP, con la cuenta lauscar.sl@gmail
 * El email del usuario se manda también a lauscar.sl@gmail
 * 
 */
class Contactar extends CI_Controller {

       public function __construct()
       {
            parent::__construct();

			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->load->helper('email');
		    $this->load->library('email');
       }
       
       public function Index(){
       		// Reglas de validacion del formulario
			$this->establecer_reglas();
			
       		// Datos para la vista 
       		$head['titulo'] = "Inicio";
       		$menu['menu'] = $this->menu_model->obtener_menu();

            // Carga de las vistas 
			$this->load->view('header', $head);
    		$this->load->view('menu', $menu);
    		
    		if($this->form_validation->run()==FALSE){
    			// Si no se ha enviado el formulario 
    			$this->load->view('contactar_view'); 
    			  			
    		} else {
    			// Formulario enviado correctamente
    			$nombre = $this->input->post('nombre');
    			$email = $this->input->post('email');
    			$asunto = $this->input->post('asunto');
    			$msg = $this->input->post('mensaje');
    			
    			// Datos del mensaje email
				$this->email->from($email, $nombre);
				$this->email->to('lauscar.sl@gmail.com');
				$this->email->subject($asunto);				
				$this->email->message($msg);
				$this->email->set_alt_message(strip_tags($msg)); 
				
				// Enviando email
				$this->load->view('email_enviado_view');
					
    		}
    		
    		$this->load->view('footer');
       }
       

       	// Reglas Form Validation
		private function establecer_reglas(){
       		$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[3]');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');
			$this->form_validation->set_rules('asunto', 'asunto', 'required|trim|min_length[3]');
			$this->form_validation->set_rules('mensaje', 'mensaje', 'required|min_length[5]|max_length[200]');
			
			$this->form_validation->set_message('required', 'Debe introducir el campo %s');
			$this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s caracteres');
			$this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres');
			$this->form_validation->set_message('valid_email', 'Debe escribir una dirección de email correcta');			
		}
}
?>
