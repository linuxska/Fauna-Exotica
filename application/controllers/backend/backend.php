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
       		if($this->session->userdata('logged_in') !==  TRUE) redirect('cuenta/login');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		if ($privilegio !== 'cliente') {
       			// Es un admin o gestor
       			$datos['privilegio'] = $privilegio;    	
       			$datos['usuario'] = $this->session->userdata('usuario');    			
  				$this->load->view('backend/backend_view', $datos);	
       		} else redirect('cuenta/index');
       }
       
       
}
?>