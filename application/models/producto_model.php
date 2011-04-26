<?php 
class Producto_model extends CI_Model{
       public function __construct()
       {
            parent::__construct();
            // Your own constructor code
            $this->load->database();
       } 
       
       // Obtener todos los productos de una subcategoría
       public function obtener_productos ($num_items,$num_pag, $cod_subcategoria) {
	         $query = $this->db->select('cod, nombre, foto, descripcion, precio')
       							->where('cod_subcategoria',$cod_subcategoria)
       							->get('producto',$num_items, $num_pag);
       							
       		 return $query->result();
	   }
	   
	   // Obtener un solo producto por su código
       public function obtener_producto ($cod_producto) {

	         $query = $this->db->where('cod',$cod_producto)
       							->get('producto');
   
       		if ($query->num_rows() == 1 ) return $query->row();

	   }
	   
	   // Obtener el registro foto de un producto por su código
       public function obtener_foto_producto ($cod_producto) {

	         $query = $this->db->select('foto')
	         					->where('cod',$cod_producto)
       							->get('producto');
   
       		if ($query->num_rows() == 1 ) return $query->row();

	   }
	   
	   //Obtener el n� total de productos de una subcategoria
	   public function total_productos($cod_subcategoria){
	   		$query = $this->db->select('cod')
       							->where('cod_subcategoria',$cod_subcategoria)
       							->get('producto');
	   		
	   		return $query->num_rows();
	   }
	   
	   public function buscar($num_items, $num_pag, $etiquetas){
			$cod_etiqueta = $this->db->select('cod')
								->like('nombre',$etiquetas)
								->get('etiqueta');
								
			$cod_productos = $this->db->select('cod_producto')
									->where_in('cod_etiqueta', $cod_etiqueta->result_array())
									->get('etiqueta_producto');
			
			$query = $this->db->select('cod, nombre, foto, descripcion, precio')
       							->where_in('cod', $cod_productos->result_array())
       							->get('producto',$num_items, $num_pag);
       							
       		 return $query->result();

	   }
}


?>
