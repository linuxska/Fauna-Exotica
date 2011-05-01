<?php
/*
 * CARRITO
 * Mantiene un carro de compra temporal
 * La Informacion no se guarda hasta procesar el pedido
 */

class Carrito extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
            $this->load->helper('form');
			$this->load->library('form_validation');

   			$this->load->model('carrito_model');
   			$this->load->model('producto_model');
   			$this->load->model('cuenta_model');
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
       	
       	//Comprobar si el producto ya está en el carro
       	$id_producto=$this->carrito_model->esta($this->input->post('id'),$this->cart->contents());
       	if($id_producto!=null){ //Incrementamos la cantidad del producto
       		$data = array(
               'rowid' => $id_producto['rowid'],
               'qty'   => ($id_producto['qty']) + ($this->input->post('cantidad'))
            );
            
			$this->cart->update($data); 
      	}else{ //Se incluye en el carro
	       	
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
			$this->carrito_model->actualizar_cantidad($rowid, '0');		
	       	        
			// Muestra el carrito:
	       	redirect('carrito/index/');
       }
       
        public function actualizar(){          	
			$this->carrito_model->actualizar_cantidad($this->input->post('rowid'),  $this->input->post('cantidad'));		
	       	        
			// Muestra el carrito:
	       	redirect('carrito/index/');
       }  
       
       // Procesar el pedido
       public function pedido(){
            		
       		/* Datos para la vista */
       		$head['titulo'] = "Procesar pedido";
			$menu['menu'] = $this->menu_model->obtener_menu();

			if( $this->session->userdata('logged_in') !==  TRUE){
				// Si no ha iniciado sesión se abre la pagina login
				redirect('login/index');
				
			} else {
				/* Datos para la vista */
	       		$head['titulo'] = "Cuenta";
				$menu['menu'] = $this->menu_model->obtener_menu();
	
	            /* Carga de las vistas */
				$this->load->view('header', $head);    		
	    		
	    		// Reglas de validaciÃ³n del formulario
				$this->establecer_reglas();
				
				if($this->form_validation->run()==FALSE){
					// Si no se ha enviado el formulario
					$this->load->view('menu', $menu);				
					
					// Datos contenido
    				$contenido['direccion'] = $this->cuenta_model->obtener('direccion', $this->session->userdata('id'));
    				// Contenido principal
					$this->load->view('procesar_pedido_view', $contenido);	
				
				} else {
					// Formulario enviado
					$this->load->view('menu', $menu);
					
					$datos['pedido'] = array('direccion_envio' => $this->input->post('direccion_envio'),
									'direccion_factura' => $this->input->post('direccion_factura'),
									'formaenvio' => $this->input->post('formaenvio'),
									'formapago' => $this->input->post('formapago')
									);
									
					$datos['total_items'] = $this->cart->total_items(); 
	       			$datos['total'] = $this->cart->total(); 
					$datos['carrito'] = $this->carrito_model->obtener_carrito();
						
					$this->load->view('confirmar_pedido_view', $datos);		
				}			
	    		
	    		$this->load->view('footer');
			}
       }  
      
       public function confirmar_pedido(){
       		$datos_pedido = array('formaenvio'      => $this->input->post('formaenvio'),
							'formapago'   => $this->input->post('formapago'),
							'direccion_envio'	  => $this->input->post('direccion_envio'),
							'direccion_factura'    => $this->input->post('direccion_factura') 
							);
			
       		$this->carrito_model->confirmar_pedido($datos_pedido);
       		
       		redirect('inicio/index/'); // CAMBIAR
       }

       // Destruir el carro
       public function destruir(){
       		$this->cart->destroy();
       }
        
       //Funcion para comprobar si la cantidad solicitada de un producto está en stock
       private function cantidad_supera_stock($cod_producto,$cantidad){
       		$qty_producto=$this->producto_model->obtener_producto($cod_producto);
       		if ($cantidad>$qty_producto['cantidad_disponible']) return true;
       		else return false;
       }
       
       // Reglas Form Validation
       private function establecer_reglas(){
       	    $this->form_validation->set_rules('direccion_envio', 'direccion de envio', 'required|trim|min_length[5]|max_length[50]');
       	    $this->form_validation->set_rules('direccion_factura', 'direccion de factura', 'required|trim|min_length[5]|max_length[50]');
       	    $this->form_validation->set_rules('formaenvio', 'forma de envio', 'required');
			$this->form_validation->set_rules('formapago', 'forma de pago', 'required');
			$this->form_validation->set_rules('privacidad', 'condiciones de privacidad', 'required');
			$this->form_validation->set_rules('condiciones', 'condiciones de uso', 'required');
			
			$this->form_validation->set_message('required', 'Debe introducir el campo %s');
			$this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s caracteres');
			$this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres');
			
       }
}
?>