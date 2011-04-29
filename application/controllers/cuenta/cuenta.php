<?php
/*
 * CUENTA
 * Se encarga de todo el control del usuario y las sesiones.
 * - Si la sesión no se ha iniciado carga el login
 * - Con la sesión iniciada muestra el panel del usuario
 * 
 */
class Cuenta extends CI_Controller {

       public function __construct()
       {
            parent::__construct();

			$this->load->helper('form');			
			$this->load->library('form_validation');
			
			$this->load->model('cuenta_model');
       }
       
       public function Index(){
			if( $this->session->userdata('logged_in') !==  TRUE){
				// Si no ha iniciado sesión se abre la pagina login
				redirect('login/index');
				
			} else {
				// Datos para la vista 
	       		$head['titulo'] = "Cuenta";
				$menu['menu'] = $this->menu_model->obtener_menu();
	
	            // Carga de las vistas 
				$this->load->view('header', $head);    	
				$this->load->view('menu', $menu);
						   			
    			// Datos del usuario para el formulario
    			$cuenta= $this->cuenta_model->obtener_todo($this->session->userdata('id'));
    			
    			// Contenido principal
				$this->load->view('cuenta/tab_cuenta_view', $cuenta);
				
				$this->load->view('footer');
			}
       }
       
      public function tab(){
			if( $this->session->userdata('logged_in') !==  TRUE){
				// Si no ha iniciado sesión se abre la pagina login
				redirect('login/index');
				
			} else {
				// Datos del usuario para el formulario
    			$cuenta= $this->cuenta_model->obtener_todo($this->session->userdata('id'));
    			// Contenido principal
				$this->load->view('cuenta/cuenta_view', $cuenta);			

			}
       }
       

       // Termina la sesión. Estado logged => Falso
       public function logout (){
       		$this->session->set_userdata('logged_in', 'FALSE');
       		
       		redirect('inicio/index/');
       }
       
       
       // Modifica datos de perfil: Nombre, apellidos...
       public function perfil(){
			if( $this->session->userdata('logged_in') ===  FALSE) redirect('cuenta/index');
    		
			// Reglas de validacion del formulario
			$this->establecer_reglas_perfil();
			
			/* Datos para la vista */
       		$head['titulo'] = "Cuenta";
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
			
			$cuenta = $this->cuenta_model->obtener_todo($this->session->userdata('id'));
			
			if($this->form_validation->run()==FALSE){
				// Si no se ha enviado el formulario, devuelve a la vista de cuenta
				$this->load->view('menu', $menu);
				$this->load->view('cuenta/tab_cuenta_view', $cuenta);
				
			} else {
				// Formulario enviado
				$datos_perfil = array(
				               'nombre' => $this->input->post('nombre'),
				               'apellido1' => $this->input->post('apellido1'),
				               'apellido2' => $this->input->post('apellido2'),
							   'direccion' => $this->input->post('direccion')
           					   );
			    
			    // Update BD
			    $cod_usuario = $this->session->userdata('id');
				$reg = $this->cuenta_model->actualizar_usuario($datos_perfil, $cod_usuario);	
				
				if ($reg) {
					$this->load->view('menu', $menu);
					$this->load->view('cuenta/tab_cuenta_view', $cuenta);
				} else echo "Error Update Cuenta/perfil";			
			} 
			$this->load->view('footer');

       }
       
       
		// Modifica el email del usuario       
		public function email(){
			if( $this->session->userdata('logged_in') ===  FALSE) redirect('cuenta/index');
    		
			// Reglas de validacion del formulario
			$this->establecer_reglas_email();
			
			/* Datos para la vista */
       		$head['titulo'] = "Cuenta";
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
			
			$cuenta = $this->cuenta_model->obtener_todo($this->session->userdata('id'));
			
			if($this->form_validation->run()==FALSE){
				// Si no se ha enviado el formulario, devuelve a la vista de cuenta
				$this->load->view('menu', $menu);
				$this->load->view('cuenta/tab_cuenta_view', $cuenta);
			
			} else {
				// Formulario enviado			    
				$email = array('email' => $this->input->post('email'));
				            
			    //Update BD
			    $cod_usuario = $this->session->userdata('id');
				$reg = $this->cuenta_model->actualizar_usuario($email, $cod_usuario);	
				
				if ($reg) {
					$this->load->view('menu', $menu);
					$this->load->view('cuenta/cuenta_view', $cuenta);
				} else echo "Error Update Cuenta/email";			
			}
			$this->load->view('footer');
       }
       
       
		// Cambia la contraseña del usuario       
		public function password(){
			if( $this->session->userdata('logged_in') ===  FALSE) redirect('cuenta/index');
    		
			// Reglas de validacion del formulario
			$this->establecer_reglas_password();
			
			/* Datos para la vista */
       		$head['titulo'] = "Cuenta";
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
			
			$cuenta = $this->cuenta_model->obtener_todo($this->session->userdata('id'));
			
			if($this->form_validation->run()==FALSE){
				// Si no se ha enviado el formulario, devuelve a la vista de cuenta
				$this->load->view('menu', $menu);
				$this->load->view('cuenta/tab_cuenta_view', $cuenta);
			
			} else {
				// Formulario enviado			    
				$password = array('password' => $this->input->post('password_nueva'));
			    
			    //Update BD
			    $cod_usuario = $this->session->userdata('id');
				$reg = $this->cuenta_model->actualizar_usuario($password, $cod_usuario);	
				
				if ($reg) {
					$this->load->view('menu', $menu);
					$this->load->view('cuenta/tab_cuenta_view', $cuenta);
				} else echo "Error Update Cuenta/password";				
			}
			$this->load->view('footer');
       }
       
        // Form Validation: Si la password coincide con el usuario
		public function comprobar_password($password){
	    	$usuario = $this->session->userdata('usuario');
	       	return $this->cuenta_model->comprobar_password($usuario, $password);
	    }
     
        // Form Validation: Si el email ya existe
		public function existe_email($email){
       		// Devuelve verdadero si NO existe en la BD 
       		// o es igual al que ya esta registrado
       		$email_bd = $this->cuenta_model->obtener('email', $this->session->userdata('id'));
       		if ($email==$email_bd) return true;
        	return !($this->cuenta_model->existe_email($email));
		}
       
		// Reglas Form Validation perfil
		private function establecer_reglas_perfil(){
       	    $this->form_validation->set_rules('nombre', 'nombre', 'trim|min_length[3]|max_length[25]|');
       	    $this->form_validation->set_rules('apellido1', '1º Apellido', 'trim|min_length[3]|max_length[40]|');
       	    $this->form_validation->set_rules('apellido2', '2º Apellido', 'trim|min_length[3]|max_length[40]|');
			$this->form_validation->set_rules('direccion', 'dirección', 'trim|min_length[3]|max_length[50]|');

			$this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s caracteres');
			$this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres');
       }

       // Reglas Form Validation email
       private function establecer_reglas_email(){
			$this->form_validation->set_rules('email', 'email', 'required|valid_email|trim|callback_existe_email');
			$this->form_validation->set_rules('password_email_actual', 'contraseña actual', 'required|trim|md5|callback_comprobar_password');
			
			$this->form_validation->set_message('valid_email', 'Debe escribir una dirección de email correcta');
			$this->form_validation->set_message('required', 'Debe introducir el campo %s');
			
			$this->form_validation->set_message('comprobar_password', 'La %s no es correcta');
			$this->form_validation->set_message('existe_email', 'El email ya existe en nuestra base de datos. Elija otro correo');
       }
       
       // Reglas Form Validation password
       private function establecer_reglas_password(){
			$this->form_validation->set_rules('password_actual', 'contraseña actual', 'required|trim|md5|callback_comprobar_password');
			$this->form_validation->set_rules('password_nueva', 'nueva contraseña', 'required|trim|md5');
			$this->form_validation->set_rules('repassword', 'reescribir nueva contraseña', 'required|matches[password_nueva]|trim|md5');
			

			$this->form_validation->set_message('matches', 'Los campos %s y %s no coinciden');
			$this->form_validation->set_message('required', 'Debe introducir el campo %s');
			
			$this->form_validation->set_message('comprobar_password', 'La %s no es correcta');
       }
       
}
?>