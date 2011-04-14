<?php

class Recuperar_password extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('cuenta_model');
			$this->load->library('email');
			$this->load->helper('email');
			
			$config['protocol'] = 'sendmail';
			$config['mailpath'] = '/usr/sbin/sendmail';
			$config['charset'] = 'iso-8859-1';
			$config['wordwrap'] = TRUE;
			$this->email->initialize($config);

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
       			$this->load->view('menu', $menu);
				$this->load->view('recuperar_password_view');	
			}else{
				$user_email = $this->input->post('user_email');
				if (valid_email($user_email)) {
		       	  	// Es un email
		       	  	$email = $user_email;
					
		       	} else {
		       	  	// Es un usuario
		       	  	
		       	}
		       	$msg="Prueba";
	       		// Mandando email
	       		$this->email->from('faunaexotica@gmail.com', 'FaunaExotica');
				$this->email->to($email); 
				
				$this->email->subject('FaunaExotica Recuperacion Contraseña');
				$this->email->message($msg);	
				
				
		       	if ($this->email->send()){} else echo "NO";
				$this->load->view('menu', $menu);
	
				$this->load->view('email_enviado_view');
				
			}
    		
    		$this->load->view('footer');
       }
       
       
       public function comprobar_datos($user_email){
       	  if (valid_email($user_email)) {
       	  	// Es un email
       	  	return $this->login_model->existe_email($user_email);
       	  } else {
       	  	// Es un usuario
       	  	return $this->login_model->existe_usuario($user_email);
       	  }
       }
       
       public function establecer_reglas(){
       	    $this->form_validation->set_rules('user_email', 'usuario_email', 'trim|min_length[5]|callback_comprobar_datos');
			
			$this->form_validation->set_message('required', 'Debe introducir el campo');
			$this->form_validation->set_message('min_length', 'El campo debe ser de al menos 5 caracteres');
			
			$this->form_validation->set_message('comprobar_datos', 'El usuario o email no es correcto');
			
       }
       
       public function recuperar_cuenta(){
       
       	
       }
       
}
?>