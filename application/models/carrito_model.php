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
       public function procesar_pedido (){
       		/*$datos = array('cod_usuario' => $this->session->userdata('id'),
						   'fecha' => time());
       		
       		$this->db->insert('pedido', $datos);
       		
       		$carrito = $this->cart->contents();
       		
       		foreach($carrito as $producto){
	       		$datos = array('cod_producto' => $producto['id'],
							   'cantidad' => $producto['qty']);
       			$this->db->insert('pedido_producto', $datos_producto);
       		}*/
       }
}


?>