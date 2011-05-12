<?php

class Backend_model extends CI_Model {

		/* Constructor */
		public function __construct(){
            parent::__construct();
            // Your own constructor code
        	$this->load->database();
		}
       
		public function info_tablas($privilegio){
			// TABLAS para todos los permisos
			$tablas['etiqueta']['nombre'] = 'Etiquetas';
			$tablas['etiqueta']['descripcion'] = 'etiquetas para los productos.';
			
			$tablas['producto']['nombre'] = 'Productos';
			$tablas['producto']['descripcion'] = 'productos de la tienda.';
			
			$tablas['producto_etiqueta']['nombre'] = 'Etiquetas de productos';
			$tablas['producto_etiqueta']['descripcion'] = 'etiqueta productos.';
			
			$tablas['pedido']['nombre'] = 'Pedidos';
			$tablas['pedido']['descripcion'] = 'pedidos de los clientes.';
			
			$tablas['pedido_producto']['nombre'] = 'Productos del pedido';
			$tablas['pedido_producto']['descripcion'] = 'productos de pedidos';
			
			// Tablas solo para el admin
			if ($privilegio === 'admin'){
				$tablas['usuario']['nombre'] = 'Usuarios';
				$tablas['usuario']['descripcion'] = 'usuarios de la base de datos.';
				
				$tablas['categoria']['nombre'] = 'Categorias';
				$tablas['categoria']['descripcion'] = 'categorias para el menú.';		
	
				$tablas['subcategoria']['nombre'] = 'Subcategorias';
				$tablas['subcategoria']['descripcion'] = 'subcategorias para el menú.';				

			}	
			return $tablas;	
		}
		
		public function info_columnas($nombre_tabla){
			$fields = $this->db->list_fields($nombre_tabla);
			foreach ($fields as $field)
				 $data[] = $field;
				
			return $data;
		}
		
		public function obtener_tabla($nombre_tabla){
			if($nombre_tabla==='usuario'){
				$query = $this->db->select('id, usuario, email, nombre, apellido1, apellido2, direccion, tipo')
									->get($nombre_tabla);
			}
			else $query = $this->db->get($nombre_tabla);
			return $query->result_array();
		}
		
		public function borrar_registro($tabla,$registro){
			if ($tabla=='usuario'){
			$this->db->where('id', $registro);
			}
			else{
				$this->db->where('cod', $registro);
			}
			$this->db->delete($tabla);
		}
	
		public function obtener_registro($tabla,$registro){
			if ($tabla=='usuario'){
				$this->db->select('id, usuario, email, nombre, apellido1, apellido2, direccion, tipo')
						 ->where('id', $registro);
			}
			else{
				$this->db->where('cod', $registro);
			}
			$query = $this->db->get($tabla);
			
			if ($query->num_rows() == 1 ) return $query->row();
		}
		
		public function actualizar_registro($tabla,$condicion,$registro_nuevo){
			$this->db->update($tabla,$registro_nuevo,$condicion);
		}
		
		public function insertar_registro($tabla,$registro_nuevo){
			$this->db->insert($tabla, $registro_nuevo);
		}
}
?>
