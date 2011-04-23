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
		
		
}
?>
