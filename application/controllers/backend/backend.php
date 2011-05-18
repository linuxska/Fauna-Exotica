<?php

class Backend extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->model('backend_model');
			$this->load->helper('form');
			$this->load->helper('date');
			$this->load->model('producto_model');
			$this->load->library('form_validation');
       }
       
       //Genera la tabla principal del backend
       public function Index(){
       		if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio == 'admin') {
       			$datos['tablas'] = $this->backend_model->info_tablas('admin');
       			$this->load->view('backend/header', $datos);  	
  				$this->load->view('backend/backend_admin_view');         			
       		} else redirect('cuenta/index');
       }   
       
       // Genera cada una de las tablas
        public function tabla($nombre_tabla){
       		if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio !== 'cliente') {
       			$datos['tabla'] = $this->backend_model->obtener_tabla($nombre_tabla);
       			$datos['columnas'] = $this->backend_model->info_columnas($nombre_tabla);	
       			$datos['subcategorias'] = $this->backend_model->obtener_subcategorias();
       			
  				$this->load->view('backend/header', $datos);
       			$this->load->view('backend/tabla_view');    			
       		} else redirect('cuenta/index');
       }  

       // Función que permite eliminar registros de una tabla
        public function eliminar($registro){
        	if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio !== 'cliente') {
       			$nombre_tabla = $this->uri->segment(3);
       			$datos['tabla'] = $this->backend_model->obtener_tabla($nombre_tabla);
       			$registro = $this->uri->segment(4);
       			if ($nombre_tabla=='pedido') $this->backend_model->borrar_productos_pedido($registro);
       			if ($nombre_tabla=='producto') $this->backend_model->borrar_etiquetas_producto($registro);
       			if ($nombre_tabla=='producto_etiqueta') $this->backend_model->borrar_registro($nombre_tabla, $this->uri->segment(5));
       			$this->backend_model->borrar_registro($nombre_tabla,$registro);
       			if($nombre_tabla=='producto_etiqueta')$this->ver_etiquetas();
       			else $this->tabla($nombre_tabla); 	
       		} else redirect('cuenta/index');
       }
       
       // función que permite editar un registro de una tabla
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
	       		$this->tabla($nombre_tabla); 
	       		$this->load->view('backend/editar_view',$datos);
       		} else redirect('cuenta/index');     	
       }
       
       // Función necesaria para actualizar los cambios de editar
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

       //Función que permite insertar un nuevo registro en la tabla
       public function insertar(){
       		if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio !== 'cliente') {
    			$nombre_tabla = $this->uri->segment(3);
    			if ($nombre_tabla =='usuario') $registro = "id = ".$this->uri->segment(4);
    			else $registro = "cod =".$this->uri->segment(4);		
    			
    			//Insertar la contraseña en la base de datos en md5
    			$this->form_validation->set_rules('password', 'contraseña', 'md5');
							
       			$datos['tabla'] = $this->backend_model->obtener_tabla($nombre_tabla);
       			$registro_nuevo = $this->input->post();
       			$this->backend_model->insertar_registro($nombre_tabla,$registro_nuevo);
       			if($nombre_tabla=='producto_etiqueta') $this->ver_etiquetas();
       			else $this->tabla($nombre_tabla);
			}	
       		else redirect('cuenta/index');
       }
       
       //Función que permite ver la foto de un producto en concreto
       public function ver_producto(){
       		if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio !== 'cliente') {
    			$producto = $this->uri->segment(3);
       			$datos['imagen'] = $this->producto_model->obtener_foto_producto($producto);
       			$this->load->view('backend/foto_view',$datos);  					
       		} else redirect('cuenta/index');
       	
       }
       
       //Función que permite ver los productos de un pedido en concreto 
		public function ver_pedido(){
       		if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio !== 'cliente') {
    			$producto = $this->uri->segment(3);
    			$datos['columnas'] = $this->backend_model->info_columnas('pedido_producto');
    			$datos['tabla'] = $this->backend_model->obtener_tabla('pedido_producto');
       			$datos['pedido'] = $this->backend_model->obtener_pedido($producto);
      			
       			$this->load->view('backend/header', $datos);
       			$this->load->view('backend/pedido_view',$datos);  					
       		} else redirect('cuenta/index');
       	
       	}
		
       	//Función que permite ver las etiquetas que tiene asignadas un producto en concreto
       	public function ver_etiquetas(){
       		if($this->session->userdata('logged_in') !==  TRUE) redirect('login/index');
       		
       		$privilegio = $this->session->userdata('tipo');
       		
       		$datos['privilegio'] = $privilegio;    	
       		$datos['usuario'] = $this->session->userdata('usuario'); 
       		
       		if ($privilegio !== 'cliente') {
       			$datos['tabla'] = $this->backend_model->obtener_tabla('producto_etiqueta');
       			$datos['columnas'] = $this->backend_model->info_columnas('producto_etiqueta');	
       			$datos['etiquetas'] = $this->backend_model->obtener_etiquetas($this->uri->segment(4));
       			$datos['all_etiquetas'] = $this->backend_model->obtener_all_etiquetas();
  				$this->load->view('backend/header', $datos);
       			$this->load->view('backend/etiquetas_view',$datos);    			
       		} else redirect('cuenta/index');
       } 
}
?>