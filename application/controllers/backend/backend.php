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
			$this->load->helper('form');
       }
       
       public function Index(){
       		if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio == 'admin') {
       			$datos['tablas'] = $this->backend_model->info_tablas('admin');
       			$this->load->view('backend/header', $datos);  	
  				$this->load->view('backend/backend_admin_view');  
  									
       		} elseif($privilegio == 'gestor') {
       			$datos['tablas'] = $this->backend_model->info_tablas('gestor');
       			$this->load->view('backend/header', $datos);	
       			$this->load->view('backend/backend_gestor_view', $datos);
       			
       		} else redirect('cuenta/index');
       }   
       
        public function tabla($nombre_tabla){
       		if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio !== 'cliente') {
       			$datos['tabla'] = $this->backend_model->obtener_tabla($nombre_tabla);
       			$datos['columnas'] = $this->backend_model->info_columnas($nombre_tabla);	
  				$this->load->view('backend/header', $datos);
       			$this->load->view('backend/tabla_view');  
  									
       			
       		} else redirect('cuenta/index');
       }  
         
        public function eliminar($registro){
       			$nombre_tabla = $this->uri->segment(3);
       			$datos['tabla'] = $this->backend_model->obtener_tabla($nombre_tabla);
       			$registro = $this->uri->segment(4);
       			$this->backend_model->borrar_registro($nombre_tabla,$registro);
       			$this->tabla($nombre_tabla);
       }
}
?>