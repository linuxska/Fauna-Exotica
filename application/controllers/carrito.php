<?php
/*
 * CARRITO
 * Mantiene un carro de compra temporal
 * La información no se guarda hasta procesar el pedido
 */

class Carrito extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
            $this->load->helper('form');
			$this->load->library('form_validation');

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
       
       // Añadir elemento al carro
       public function incluir (){
       	
       	$id_producto=$this->carrito_model->esta($this->input->post('id'),$this->cart->contents());
       	if($id_producto!=null){
       		$data = array(
               'rowid' => $id_producto['rowid'],
               'qty'   => ($id_producto['qty']) + ($this->input->post('cantidad'))
            );
            
			$this->cart->update($data); 
      	}else{
	       	
				$producto = array( 
								'id'      => $this->input->post('id'),
								'price'   => $this->input->post('price'),
								'qty'	  => $this->input->post('cantidad'),
								'name'    => $this->input->post('name') 
				);
	
				$this->cart->insert($producto); // Insertar a la sesión del carrito
       		}       
				// Muestra el carrito:
		       	redirect('carrito/index/');      	
       		
       }
       
       // Borrar elemento del carro
       public function eliminar($rowid){	      
			$this->carrito_model->eliminar($rowid);		
	       	        
			// Muestra el carrito:
	       	redirect('carrito/index/');
       }      
       
       // Procesar el pedido
       public function pedido(){
	      /*	$this->carrito_model->procesar_pedido();
			$this->cart->destroy();*/
	       	        
			// Muestra el carrito:
	       	redirect('carrito/index/');
       }   

       // Destruir el carro
       public function destruir(){
       		$this->cart->destroy();
       }
             
}
?>