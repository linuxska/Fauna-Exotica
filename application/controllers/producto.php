<?php
/*
 * PRODUCTO
 * Muestra en principio el catálogo de productos separado por subcategorias
 * Al solicitar un producto en concreto se muestra informacion mas detallada del mismo
 * Se podrá filtrar los resultados por etiquetas * (no empezado)
 */
class Producto extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->model('producto_model');
			$this->load->helper('form');
			$this->load->library('pagination');

       }
       
       public function Index(){
			/* Datos de paginacion*/     		
       		$config['base_url']= base_url().'index.php/producto/index/'.$this->uri->segment(3);
       		$config['total_rows']=$this->producto_model->total_productos($this->uri->segment(3));
       		$config['per_page'] = '9';
       		$config['uri_segment']=4;
       		$config['num_links'] = 2;
       		$config['first_link'] = 'First';
       		$config['next_link'] = 'Siguiente';
       		$config['prev_link'] = 'Anterior';	
       		$config['prev_tag_open'] = '<div class="previous">';
			$config['prev_tag_close'] = '</div>';
       		$config['next_tag_open'] = '<div class="next">';
			$config['next_tag_close'] = '</div>';
			
       		$this->pagination->initialize($config);
       	
       		/* Carga de modelos */
       		$this->load->model('menu_model');
   		      		
       		/* Datos para la vista */
       		$head['titulo'] = "Productos";
       		$menu['menu'] = $this->menu_model->obtener_menu();
               		  
            //Obtener carálogo
            $contenido['productos'] = $this->producto_model->obtener_productos($config['per_page'], $this->uri->segment(4),$this->uri->segment(3));   

            /* Carga de las vistas */
			$this->load->view('header', $head);
    		$this->load->view('menu', $menu);
    		
    		$this->load->view('catalogo_producto_view', $contenido); // Contenido
    		
    		$this->load->view('footer');
       }
       
       
		// Muestra una vista con un solo producto elegido mostrando mas informacion
		public function mostrar() {      	
        	$cod_producto = $this->uri->segment(3);
    		$producto['producto'] = $this->producto_model->obtener_producto($cod_producto);
        
        	/* Carga de modelos */
       		$this->load->model('menu_model');			

       		/* Datos para la vista */
       		$head['titulo'] = "Productos";
       		$menu['menu'] = $this->menu_model->obtener_menu();
               
            /* Carga de las vistas */
			$this->load->view('header', $head);
    		$this->load->view('menu', $menu);
    		
    		$this->load->view('producto_view', $producto); // Contenido
    		
    		$this->load->view('footer');      
       }      
}
?>