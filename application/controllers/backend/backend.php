<?php
/*
 * LOGIN
 * Loguear un usuario en la sesión
 * - Las sesiones se inician automaticamente sin datos
 * - Al loguear, cambia su estado logged_in a verdadero
 * - Si desloguea se queda en falso
 */

class Backend extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->model('backend_model');
       }
       
       public function Index(){
       		if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio == 'admin') {
       			$datos['tablas'] = $this->backend_model->info_tablas('admin');	
  				$this->load->view('backend/backend_admin_view', $datos);  
  									
       		} elseif($privilegio == 'gestor') {
       			$datos['tablas'] = $this->backend_model->info_tablas('gestor');	
       			$this->load->view('backend/backend_gestor_view', $datos);
       			
       		} else redirect('cuenta/index');
       }   
       
}
?>