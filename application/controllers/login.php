<?php

class Login extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('cuenta_model');
			$this->load->helper('email');
			$this->load->library('email');
       }
       
       public function Index(){
       		if( $this->session->userdata('logged_in') ===  TRUE) redirect('cuenta/index');
       			
       		 // Reglas de validacion del formulario
			$this->establecer_reglas();
			
       		/* Datos para la vista */
       		$head['titulo'] = "Cuenta";
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
    		
    		
       		if($this->form_validation->run()==FALSE){
       			$this->load->view('menu', $menu);
				$this->load->view('login_view');	
			}else{
				$usuario = $this->input->post('usuario');
				$password = $this->input->post('password');

				$login = $this->cuenta_model->login($usuario, $password);
				
				if ($login == TRUE){
					redirect('cuenta/index');
				} else echo "NO";
			
		}
    		
    		$this->load->view('footer');
       }
       
       public function comprobar_usuario($usuario){
       		return $this->cuenta_model->existe_usuario($usuario);
       }
       
       public function comprobar_password($password){
       		$usuario = $this->input->post('usuario');
       		if ($this->cuenta_model->comprobar_password($usuario, $password))
       			return true;
       		elseif ($this->cuenta_model->comprobar_password_recuperacion($usuario, $password))
       			return true;
       		else return false;
       }
       
       public function establecer_reglas(){
       	    $this->form_validation->set_rules('usuario', 'usuario', 'required|trim|min_length[5]|max_length[25]|callback_comprobar_usuario');
			$this->form_validation->set_rules('password', 'contraseña', 'required|trim|md5|callback_comprobar_password');
				
			$this->form_validation->set_message('required', 'Debe introducir el campo %s');
			$this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s caracteres');
			$this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres');
			$this->form_validation->set_message('comprobar_usuario', 'El usuario no es correcto');
			$this->form_validation->set_message('comprobar_password', 'La contraseña no es correcta');
			
       }

       
}
?>