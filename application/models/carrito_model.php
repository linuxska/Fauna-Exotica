<?php 
/*
 * CARRITO_MODEL
 */
class Carrito_model extends CI_Model{
       public function __construct()
       {
            parent::__construct();
            
            $this->load->database();
          	$this->load->model('producto_model');
       } 
       
		// Si existe el producto en el carrito
		public function esta ($cod_producto, $carrito){
			// Si existe devuelve el producto
			foreach ($carrito as $producto) if ($producto['id'] == $cod_producto) return $producto;
			return null;
		}
		
       
		// Eliminar un producto del carro 
		public function actualizar_cantidad($rowid, $cantidad){
	    	$data_update = array(
               			'rowid' => $rowid,
               			'qty'   => $cantidad
           		 		);
	       	$this->cart->update($data_update);
       }
       
       // Obtener datos del producto en carro, por el codigo de producto
       public function obtener_producto_carrito ($producto_cod){
       		$carrito = $this->cart->contents(); 
       		foreach ($carrito as $fila => $producto) {
       			if ($producto['id'] == $producto_cod)	return $fila;
       		}
       		return 0;
       }
       
       // Devuelve el carro con información añadida de los productos (foto)
       public function obtener_carrito(){
       		 $carrito = $this->cart->contents(); 

       		 // Añadimos la foto del producto 
       		 foreach ($carrito as $indice => $producto){
       		 	$producto_bd = $this->producto_model->obtener_foto_producto($producto['id']);
       		 	$carrito[$indice]['foto'] = $producto_bd->foto;
       		 }    		 
       		 return $carrito;
       }
       
       // Crea al pedido en la BD
       public function confirmar_pedido ($datos_pedido){
       		/* 
       		 * SIN TERMINAR !!!!!!!!!!!!!! Solo contrareembolso
       		 */
       	
       		// Insertar datos de pedido
       		$pedido = array('cod_usuario' => $this->session->userdata('id'),
						   		'fecha' => date("Y-m-d"),
       							'direccion_envio' => $datos_pedido['direccion_envio'],
       							'direccion_factura' => $datos_pedido['direccion_factura'],
       		);
       		
       		$this->db->insert('pedido', $pedido);
       		
       		$cod_pedido = $this->db->insert_id();
       		
       		$carrito = $this->carrito_model->obtener_carrito();
       		
       		// Insertar productos del pedido
       		foreach($carrito as $producto){
	       		$producto = array('cod_pedido' => $cod_pedido ,
	       					   'cod_producto' => $producto['id'],
							   'cantidad' => $producto['qty']);
       			$this->db->insert('pedido_producto', $producto);
       		}
       		
       		// Borrar carrito
       		$this->cart->destroy();
       }
}


?>