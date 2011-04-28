<?php
/*
 * PRODUCTO
 * Muestra en principio el catálogo de productos separado por subcategorias
 * Al solicitar un producto en concreto se muestra informacion mas detallada del mismo
 * Se podrá filtrar los resultados por etiquetas * (no empezado)
 */
class Buscador extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->model('producto_model');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('pagination');

       }

       public function Index(){

       		/*
       		 * La paginación no puede funcionar bien porque los datos de la busqueda
       		 * se pasan por POST y no por URI
       		 * Por ahora se muestra sin paginacion, pero se me ocurre una forma...
       		 *
       		 */
			
       		/* Datos para la vista */
       		$head['titulo'] = "Cuenta";
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
			$this->load->view('menu', $menu);
						
			//Obtener carálogo
			$busqueda = explode(' ', $this->input->post('busqueda'));
		
			if (count($busqueda)>0 && $busqueda[0] !== "") {
				$contenido['productos'] = $this->producto_model->buscar($busqueda);
				$this->load->view('catalogo_producto_view', $contenido); // Contenido
			} else {						
				$this->load->view('catalogo_producto_view'); // Contenido
			}
			
    		$this->load->view('footer'); 
       }
       
}
?>
