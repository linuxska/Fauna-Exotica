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
	       	
	       	// Datos del carro
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
       		
       		//Comprobar si el producto ya está en el carro     		
       		if($id_producto!=null){ 
       			//Incrementamos la cantidad del producto
       			$data = array('rowid' => $id_producto['rowid'],
              	 'qty'   => ($id_producto['qty']) + ($this->input->post('cantidad')));
            
				$this->cart->update($data); 
			
			} else { //Se incluye en el carro
		       	
				$producto = array('id'      => $this->input->post('id'),
								'price'   => $this->input->post('price'),
								'qty'	  => $this->input->post('cantidad'),
								'name'    => $this->input->post('name'));
		
				$this->cart->insert($producto); // Insertar a la sesión del carrito
	       	}      
       	 
			// Muestra el carrito:
			redirect('carrito/index/');      	
       		
		}
       
       // Borrar elemento del carro
		public function eliminar($rowid){
			// Actualizar la cantidad a 0 implica borrarlo
			$this->carrito_model->actualizar_cantidad($rowid, '0');		
	       	        
			// Muestra el carrito:
	       	redirect('carrito/index/');
       }
       
		// Actualiza la cantidad de un producto del carro
		public function actualizar(){          	
			$this->carrito_model->actualizar_cantidad($this->input->post('rowid'),  
													$this->input->post('cantidad'));		
	       	        
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
	    		
	    		// Reglas de validación del formulario
				$this->establecer_reglas();
				
				if($this->form_validation->run()==FALSE){
					// Si no se ha enviado el formulario
					$this->load->view('menu', $menu);				
					
					// Datos contenido
    				$contenido['direccion'] = $this->cuenta_model->obtener('direccion', $this->session->userdata('id'));
					$contenido['carrito'] = $this->carrito_model->obtener_carrito();
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
      
       // Proceso de confirmación de un pedido contrareembolso
       public function confirmar_contrareembolso(){
       		$datos_pedido = array('formaenvio'      => $this->input->post('formaenvio'),
							'formapago'   => 'contrareembolso',
							'direccion_envio'	  => $this->input->post('direccion_envio'),
							'direccion_factura'    => $this->input->post('direccion_factura') 
							);
			
			// Se registra en la BD
       		$this->carrito_model->confirmar_pedido($datos_pedido);
       		       
       		// Destruir el carro
       		$this->cart->destroy();
       		
       		// No se reduce el stock (es necesario la comprobacion de los datos)
       		redirect('cuenta/index/');
       }
       
       // Confirmamos que se ha hecho una compra paypal
       public function confirmar_paypal(){
       		$datos_pedido = array('formaenvio'      => '',
							'formapago'   => 'paypal',
							'direccion_envio'	  => '',
							'direccion_factura'    => '' 
							);
			
			// Registramos en la BD
       		$this->carrito_model->confirmar_pedido($datos_pedido);
       		
       		
       		$carrito = $this->carrito_model->obtener_carrito();
       		
       		// Reducir stock (la compa está confirmada por paypal)
       		foreach ($carrito as $producto) {
       			$this->carrito_model->reducir_stock($producto);
       		}

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
			$this->form_validation->set_rules('condiciones', 'privacidad y condiciones de uso', 'required');
			
			$this->form_validation->set_message('required', 'Debe introducir el campo %s');
			$this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s caracteres');
			$this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres');
			
       }
       
       // Llamada de retorno via paypal, tras hacer una compra el usuario.
       // Recogemos mediante un script, los datos de la compra por PDT Paypal
       public function transactionID(){
       	
			$req = 'cmd=_notify-synch';
			
			// Identificador de la compra: transactionID
			$tx_token =  $this->input->get('tx');
			
			// Código autentificaición (configuracion cuenta paypal de la tienda)
			$auth_token = "e5ToGxzfIKWjDmmpR93UCGpQC6Z7t5IlJIZMFvMorXYWxs6HJe-sO4eeDM0";
			
			$req .= "&tx=$tx_token&at=$auth_token";			
			
			// Post a PayPalde validacion
			$header = "";
			$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
			$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
			$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
			
			// Lectura de la página (entorno de pruebas, la direcion oficial es www.paypal.com)
			$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);
			
			if (!$fp) {
				echo "<p><h3>HTTP Error</h3></p>";
			} else {
				fputs ($fp, $header . $req);
				// read the body data
				$res = '';
				$headerdone = false;
				while (!feof($fp)) {
					$line = fgets ($fp, 1024);
					if (strcmp($line, "\r\n") == 0) {
						// Lectura header
						$headerdone = true;
					}
					else if ($headerdone){
						// header leido. Lectura contenido...
						$res .= $line;
					}
				}
				
				// Convertir los datos
				$lines = explode("\n", $res);
				$keyarray = array();
				if (strcmp ($lines[0], "SUCCESS") == 0) {
	
					for ($i=1; $i<count($lines);$i++){
						if ( strpos($lines[$i],'=') !== false ){
							list($key,$val) = explode("=", $lines[$i]);
							$keyarray[urldecode($key)] = urldecode($val);
						} 
					}
	
					// Datos que recogemos de la compra
					$datos['nombre'] = $keyarray['first_name'];
					$datos['apellidos'] = $keyarray['first_name'];
					$datos['coste_total'] = $keyarray['mc_gross'];
					$datos['moneda'] = $keyarray['mc_currency'];
	
				}
				else if (strcmp ($lines[0], "FAIL") == 0) {
					echo "<p><h3>ERROR transactionID</h3></p>";
				}
			
			}
			
			fclose ($fp);
			
			// Registrar pedido
			$this->confirmar_paypal();
			
			//Destruccion del carrito
			$this->cart->destroy();
			
			/* Carga de las vistas */
			
			$head['titulo'] = "Carrito";
	       	$menu['menu'] = $this->menu_model->obtener_menu();
			$this->load->view('header', $head);
	    	$this->load->view('menu', $menu);
	    	
	    	// Contenido principal
	    	$this->load->view('transaccion_view', $datos);
	    	
	    	$this->load->view('footer');   
       	
       }

}
?>