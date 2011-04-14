<?php

class Cuenta extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
            
			$this->load->helper('url');
			$this->load->helper('form');
			
			$this->load->library('form_validation');
			
			$this->load->model('cuenta_model');
       }
       
       public function Index(){
       		
       		/* Datos para la vista */
       		$head['titulo'] = "Cuenta";
			$menu['menu'] = $this->menu_model->obtener_menu();

			if( $this->session->userdata('logged_in') !==  TRUE){
				// Si no ha iniciado sesión se abre la pagina login
				redirect('login/index');
			} else {
			
           		 /* Carga de las vistas */
				$this->load->view('header', $head);
    			$this->load->view('menu', $menu);
    			
    			// Datos del usuario para el formulario
    			$cuenta= $this->cuenta_model->obtener($this->session->userdata('id'));
    			
    			// Contenido principal
				$this->load->view('cuenta_view', $cuenta);
				
				$this->load->view('footer');
			}
       }
       
       
       public function logout (){
       		$this->session->set_userdata('logged_in', 'FALSE');
       		
       		redirect('inicio/index/');
       }
       
       public function perfil(){
       	    if( $this->session->userdata('logged_in') ===  TRUE) redirect('cuenta/index');      		
       
    		// Reglas de validaciÃ³n del formulario
			$this->establecer_reglas();
			
			if($this->form_validation->run()==FALSE){
				$this->load->view('menu', $menu);
				// Si no se ha realizado el formulario de registro
				$this->load->view('registro_view');	
			} else {
				// Formulario enviado
				$usuario = $this->input->post('usuario');
			    $password = $this->input->post('password');
			    $email = $this->input->post('email');

			    //Registro BD
				$reg = $this->registro_model->registrar($usuario, $password, $email);				
				if ($reg === TRUE) {
					// Tras registrarse con Ã©xito:
					$this->session->sess_destroy();
					$this->cuenta_model->login($usuario, $password);
					$this->load->view('menu', $menu);
					$this->load->view('cuenta_view');
				} else echo "ERROR REGISTRO";
			
			}
						
    		
    		 redirect('cuenta/index');
       	
       }
       
       public function establecer_reglas(){
       	    $this->form_validation->set_rules('usuario', 'usuario', 'required|trim|min_length[5]|max_length[25]|callback_existe_usuario');
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|trim|callback_existe_email');
			$this->form_validation->set_rules('password', 'contraseña', 'required|trim|md5');
			$this->form_validation->set_rules('repassword', 'reescribir contraseña', 'required|matches[password]|trim|md5');
			
			$this->form_validation->set_message('required', 'Debe introducir el campo %s');
			$this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s caracteres');
			$this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres');
			$this->form_validation->set_message('valid_email', 'Debe escribir una dirección de email correcta');
			$this->form_validation->set_message('matches', 'Los campos %s y %s no coinciden');
			
			$this->form_validation->set_message('existe_usuario', 'El usuario ya existe. Elija otro nombre');
			$this->form_validation->set_message('existe_email', 'El email ya existe. Elija otro correo');
       }

       
}
?>