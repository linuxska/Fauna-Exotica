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
	   		// Recogemos los codigos de las etiquetas 
	   		// que coincidan con las palabras buscadas
	   		$this->db->select('cod');
			$this->db->like('nombre', $etiquetas[0]);
			foreach ($etiquetas as $indice => $palabra){ 
				if ($indice === 0) continue;
				$this->db->or_like('nombre', $palabra);
			}		
			$query_cod_etiquetas = $this->db->get('etiqueta');
			
			// Lo pasamos a un array
			$cod_etiquetas = array();
			foreach ($query_cod_etiquetas->result() as $value ) $cod_etiquetas[] = $value->cod;
			
			// Si no hay resultados, devuelve un array vacio
			if ($query_cod_etiquetas->num_rows()>0){
				
				// Codigos de productos que tienen las etiquetas encontradas:
				$query_cod_productos = $this->db->select('cod_producto')
										->where_in('cod_etiqueta', $cod_etiquetas)
										->get('producto_etiqueta');
			
				// Lo pasamos a un array
				$cod_productos = array();
				foreach ($query_cod_productos->result() as $v) $cod_productos[] = $v->cod_producto;			

				// Obtenemos los productos resultantes
				$query = $this->db->select('cod, nombre, foto, descripcion, precio')
	       							->where_in('cod', $cod_productos)
	       							->get('producto');
	       		foreach ($query->result() as $x) echo $x->cod;
	       		return $query->result();
			
			} else return array();
	   }
	   
}
?>
