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
	   
	   public function buscar($etiquetas){
	   		$this->db->select('cod');
			$this->db->like('nombre', $etiquetas[0]);
			foreach ($etiquetas as $indice => $palabra){
				if ($indice === 0) continue;
				$this->db->or_like('nombre', $palabra);
			}						
			$query_cod_etiquetas = $this->db->get('etiqueta');
			
			if ($query_cod_etiquetas->num_rows()==0) return array();
				
			$cod_etiquetas = $query_cod_etiquetas->result_array();
			
			$query_cod_productos = $this->db->select('cod_producto')
									->where_in('cod_etiqueta', $cod_etiquetas[0])
									->get('producto_etiqueta');
									
			$cod_productos = $query_cod_productos->row_array();
			
			$query = $this->db->select('cod, nombre, foto, descripcion, precio')
       							->where_in('cod', $cod_productos['cod_producto'])
       							->get('producto');
       							
       		return $query->result();
	   }
	   
}
?>
