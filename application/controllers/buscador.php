<?php
/*
 * PRODUCTO
 * Muestra en principio el catálogo de productos separado por subcategorias
 * Al solicitar un producto en concreto se muestra Informacion mas detallada del mismo
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
       	
       	
       		/* Datos de paginacion*/     		
       		$config['base_url']= base_url().'index.php/buscador/index';
       		/*$config['total_rows']=$this->producto_model->total_productos($this->uri->segment(3));*/
       		$config['total_rows']=2;
       		$config['per_page'] = '9';
       		$config['uri_segment']=4;
       		$config['num_links'] = 2;
       		$config['next_link'] = 'Siguiente >>';
       		$config['prev_link'] = '<< Anterior';	
       		$config['prev_tag_open'] = '<div class="anterior">';
			$config['prev_tag_close'] = '</div>';
       		$config['next_tag_open'] = '<div class="siguiente">';
			$config['next_tag_close'] = '</div>';
			
       		$this->pagination->initialize($config);
			
       		/* Datos para la vista */
       		$head['titulo'] = "Búsqueda";
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
			$this->load->view('menu', $menu);
						
			//Obtener palabras
			$busqueda = explode(' ', $this->input->post('busqueda'));
		
			if (count($busqueda)>0 && $busqueda[0] !== "") {
				$contenido['productos'] = $this->producto_model->buscar($config['per_page'], $this->uri->segment(4),$busqueda);
				$this->load->view('catalogo_producto_view', $contenido); // Contenido
			} else {						
				$this->load->view('catalogo_producto_view'); // Contenido
			}
			
    		$this->load->view('footer'); 
       }
       
}
?>
