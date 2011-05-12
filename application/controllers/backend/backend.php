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
        	if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio !== 'cliente') {
       			$nombre_tabla = $this->uri->segment(3);
       			$datos['tabla'] = $this->backend_model->obtener_tabla($nombre_tabla);
       			$registro = $this->uri->segment(4);
       			$this->backend_model->borrar_registro($nombre_tabla,$registro);
       			$this->tabla($nombre_tabla); 	
       		} else redirect('cuenta/index');
       }
       
       public function editar(){
          	if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio !== 'cliente') {
	       		$nombre_tabla = $this->uri->segment(3);
	       		$num_registro=$this->uri->segment(4);
	       		$datos['registro'] = $this->backend_model->obtener_registro($nombre_tabla,$num_registro);
	       		$datos['columnas'] = $this->backend_model->info_columnas($nombre_tabla);
	       		
	       		$this->load->view('backend/header', $datos);
	       		$this->load->view('backend/editar_view');	
       		} else redirect('cuenta/index');     	
       }
       
       public function actualizar(){
       		if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio !== 'cliente') {
    			$nombre_tabla = $this->uri->segment(3);
    			if ($nombre_tabla =='usuario') $registro = "id = ".$this->uri->segment(4);
    			else $registro = "cod =".$this->uri->segment(4);
       			$datos['tabla'] = $this->backend_model->obtener_tabla($nombre_tabla);
       			$registro_nuevo = $this->input->post();
       			$this->backend_model->actualizar_registro($nombre_tabla,$registro,$registro_nuevo);
       			$this->tabla($nombre_tabla);		
       		} else redirect('cuenta/index');
       }
       
       public function insertar_registro_nuevo(){
          	if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio !== 'cliente') {
	       		$nombre_tabla = $this->uri->segment(3);
	       		/*$num_registro=$this->uri->segment(4);
	       		$datos['registro'] = $this->backend_model->obtener_registro($nombre_tabla,$num_registro);*/
	       		$datos['columnas'] = $this->backend_model->info_columnas($nombre_tabla);
	       		
	       		$this->load->view('backend/header', $datos);
	       		$this->load->view('backend/insertar_view');	
       		} else redirect('cuenta/index');     	
       }
       
       public function insertar(){
       		if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio !== 'cliente') {
    			$nombre_tabla = $this->uri->segment(3);
    			if ($nombre_tabla =='usuario') $registro = "id = ".$this->uri->segment(4);
    			else $registro = "cod =".$this->uri->segment(4);
       			$datos['tabla'] = $this->backend_model->obtener_tabla($nombre_tabla);
       			$registro_nuevo = $this->input->post();
       			$this->backend_model->insertar_registro($nombre_tabla,$registro_nuevo);
       			$this->tabla($nombre_tabla);		
       		} else redirect('cuenta/index');
       }
       
       public function ver_pedido(){
       	
       	
       }
       
       
       
}
?>