<?php
/* ***********************
 * 
 * FALTA SOLUCIONAR ACTUALIZAR CONTRASEÑA
 * 
 */
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
    			$cuenta= $this->cuenta_model->obtener_todo($this->session->userdata('id'));
    			
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
				$this->load->view('menu', $menu);
				$this->load->view('cuenta_view', $cuenta);
			} else {
				// Formulario enviado
				$datos_perfil['nombre']=  $this->input->post('nombre');
				$datos_perfil['apellido1']=  $this->input->post('apellido1');
				$datos_perfil['apellido2']=  $this->input->post('apellido2');
			    $datos_perfil['direccion'] = $this->input->post('direccion');

			    //Update BD
			    $cod_usuario = $this->session->userdata('id');
				$reg = $this->cuenta_model->actualizar_perfil($datos_perfil, $cod_usuario);	
				if ($reg) {
					$this->load->view('menu', $menu);
					$this->load->view('cuenta_view', $cuenta);
				}				
			}
			$this->load->view('footer');

       }
       
       public function datos(){
			if( $this->session->userdata('logged_in') ===  FALSE) redirect('cuenta/index');
    		// Reglas de validacion del formulario
			$this->establecer_reglas_datos();
			
			/* Datos para la vista */
       		$head['titulo'] = "Cuenta";
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
			
			$cuenta = $this->cuenta_model->obtener_todo($this->session->userdata('id'));
			
			if($this->form_validation->run()==FALSE){
				$this->load->view('menu', $menu);
				$this->load->view('cuenta_view', $cuenta);
			} else {
				// Formulario enviado			    
			    $datos['password']=  $this->input->post('password_nueva');
			    $datos['email'] = $this->input->post('email');

			    //Update BD
			    $cod_usuario = $this->session->userdata('id');
				$reg = $this->cuenta_model->actualizar_datos($datos, $cod_usuario);	
				if ($reg) {
					$this->load->view('menu', $menu);
					$this->load->view('cuenta_view', $cuenta);
				}				
			}
			$this->load->view('footer');
       }
       
     public function comprobar_password($password){
     		if ($password=="") return true;
       		$usuario = $this->session->userdata('usuario');
       		return $this->cuenta_model->comprobar_password($usuario, $password);
     }
     
       
      public function existe_email($email){
       		// Devuelve verdadero si NO existe en la BD 
       		// o es igual al que ya esta registrado
       		$email_bd = $this->cuenta_model->obtener('email', $this->session->userdata('id'));
       		if ($email==$email_bd) return true;
       		return !($this->cuenta_model->existe_email($email));
      }
       
       public function establecer_reglas_perfil(){
       	    $this->form_validation->set_rules('nombre', 'nombre', 'trim|min_length[5]|max_length[25]|');
       	    $this->form_validation->set_rules('apellido1', '1º Apellido', 'trim|min_length[5]|max_length[40]|');
       	    $this->form_validation->set_rules('apellido2', '2º Apellido', 'trim|min_length[5]|max_length[40]|');
			$this->form_validation->set_rules('direccion', 'dirección', 'trim|min_length[5]|max_length[50]|');

			$this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s caracteres');
			$this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres');
       }

       public function establecer_reglas_datos(){
			$this->form_validation->set_rules('email', 'email', 'valid_email|trim|callback_existe_email');
			$this->form_validation->set_rules('password_actual', 'contraseña actual', 'trim|md5|callback_comprobar_password');
			$this->form_validation->set_rules('password_nueva', 'nueva contraseña', 'trim|md5');
			$this->form_validation->set_rules('repassword', 'reescribir contraseña', 'matches[password_nueva]|trim|md5');
			
			$this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s caracteres');
			$this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres');
			$this->form_validation->set_message('valid_email', 'Debe escribir una dirección de email correcta');
			$this->form_validation->set_message('matches', 'Los campos %s y %s no coinciden');
			
			$this->form_validation->set_message('comprobar_password', 'La %s no es correcta');
			$this->form_validation->set_message('existe_email', 'El email ya existe. Elija otro correo');
       }
       
}
?>