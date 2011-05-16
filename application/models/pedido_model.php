<?php 
/*
 * CARRITO_MODEL
 */
class Pedido_model extends CI_Model{
       public function __construct()
       {
            parent::__construct();
            
            $this->load->database();
       } 
       
		// Si existe el producto en el carrito
		public function obtener_pedidos($cod_usuario){
			 $query = $this->db->where('cod_usuario',$cod_usuario)
       							->get('pedido');
       							
       		 return $query->result();
		}
		
       public function obtener_productos_pedido ($cod_pedido) {
	         $query = $this->db->where('cod_pedido',$cod_pedido)
       							->get('pedido_producto');
       							
           
           	$datos=$query->result_array();
			
           	// Añadimos información de los productos
    		foreach ($datos as $indice => $fila) {				
    			$info = $this->producto_model->obtener_producto($fila['cod_producto']);
    			$datos[$indice]['nombre']= $info->nombre;
    			$datos[$indice]['precio']= $info->precio;
    		}
       							
       		return $datos;
	   }
	   

}
?>
