<?php

class Carrito extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
            $this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('url');
   			$this->load->model('carrito_model');
   			$this->load->model('producto_model');
       }
       
       public function Index(){
       		/* Datos para la vista */
	       	$head['titulo'] = "Carrito";
	       	$menu['menu'] = $this->menu_model->obtener_menu();
	       	
	        $contenido['total_items'] = $this->cart->total_items(); 
	        $contenido['total'] = $this->cart->total(); 
	        

			$contenido['carrito'] = $this->carrito_model->obtener_carrito();
	        
	        /* Carga de las vistas */
			$this->load->view('header', $head);
	    	$this->load->view('menu', $menu);
	    	
	    	// Contenido principal
	    	$this->load->view('carrito_view', $contenido);
	    	
	    	$this->load->view('footer');
       	
       }
       
       public function incluir (){
			$producto = array( 
							'id'      => $this->input->post('id'),
							'price'   => $this->input->post('price'),
							'qty'	  => $this->input->post('cantidad'),
							'name'    => $this->input->post('name') 
			);

			$this->cart->insert($producto); // Insertar a la sesión del carrito
	       	        
			// Muestra el carrito:
	       	redirect('carrito/index/');
       	
       }
       
       public function eliminar($rowid){
	      
			$this->carrito_model->eliminar($rowid);		
	       	        
			// Muestra el carrito:
	       	redirect('carrito/index/');
       }      
       
       public function pedido(){
	      /*	$this->carrito_model->procesar_pedido();
			$this->cart->destroy();*/
	       	        
			// Muestra el carrito:
	       	redirect('carrito/index/');
       }   

       public function destruir(){
       		$this->cart->destroy();
       }
       
}
?>