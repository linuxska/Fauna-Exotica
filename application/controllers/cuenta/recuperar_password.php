<?php

class Recuperar_password extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('cuenta_model');
			
			$this->load->helper('email');
		    $this->load->library('email');
		    $this->load->library('encrypt');  

       }
       
       public function Index(){
       		if( $this->session->userdata('logged_in') ===  TRUE) redirect('cuenta/index');
       			
       		// Reglas de validacion del formulario
			$this->establecer_reglas();
			
       		/* Datos para la vista */
       		$head['titulo'] = "Recuperar Contraseña";
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);   		
    		
       		if($this->form_validation->run()==FALSE){
       			// Si no se ha enviado el formulario
       			$this->load->view('menu', $menu);
				$this->load->view('cuenta/recuperar_password_view');	
			
       		}else{
				// Dato recibido: Email o Usuario...
				$user_email = $this->input->post('user_email');
				
				// Obtenemos los datos de la cuenta
				// Comprobamos si es un usuario o el email
				if (valid_email($user_email)) {
		       	  	// Es un email
		       	  	$datos = $this->cuenta_model->recuperar_por_email($user_email);
					
		       	} else {
		       	  	// Es un usuario
		       	  	$datos = $this->cuenta_model->recuperar_por_usuario($user_email);		       	  	
		       	}
		       	
		       	// Creamos nueva contraseña aleatoria
		       	$password = random_string('alnum', 8, 'nozero');
		       	$password_md5 =  md5($password);
				$this->cuenta_model->registrar_password_recuperacion($password_md5);

				// Datos del mensaje
				$this->email->from('lauscar.sl@gmail.com', 'Lauscar');
				$this->email->to($datos['email']);
				$this->email->subject('FaunaExotica: Recuperar contraseña');
				$msg= "<h2>Sus nuevos datos de acceso</h2>".
				"<p>Usuario: ".$datos['usuario']."</p><p>Contraseña: ".$password."</p> <p>Por favor, cambie su contaseña. Saludos ;)</p>";
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
       

		// Valida si existe el usuario o email en la BD
		public function comprobar_datos($user_email){
			if (valid_email($user_email))  // Es un email			
				return $this->cuenta_model->existe_email($user_email);
			else  // Es un usuario				
				return $this->cuenta_model->existe_usuario($user_email);			
       	}
       
       	// Reglas Form Validation
		private function establecer_reglas(){
       		$this->form_validation->set_rules('user_email', 'usuario_email', 'trim|min_length[5]|callback_comprobar_datos');
			
			$this->form_validation->set_message('required', 'Debe introducir el campo');
			$this->form_validation->set_message('min_length', 'El campo debe ser de al menos 5 caracteres');
			
			$this->form_validation->set_message('comprobar_datos', 'El usuario o email no es correcto');			
		}

}
?>
