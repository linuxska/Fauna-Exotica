<?php

class Producto extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->helper('url');
			$this->load->model('producto_model');
			$this->load->helper('form');
		

   
       }
       
       public function Index(){
			/* Datos de paginacion*/
       		$this->load->library('pagination');
       		$config['base_url']= base_url().'index.php/producto/index/'.$this->uri->segment(3);
       		$config['total_rows']=$this->producto_model->total_productos($this->uri->segment(3));
       		$config['per_page'] = '3';
       		$config['uri_segment']=4;
       		$this->pagination->initialize($config);
       	
       		/* Carga de modelos */
       		$this->load->model('menu_model');
   		
       		
       		/* Datos para la vista */
       		$head['titulo'] = "Productos";

       		$menu['menu'] = $this->menu_model->obtener_menu();
               
		  
            //Obtener
            $contenido['productos'] = $this->producto_model->obtener_productos($config['per_page'], $this->uri->segment(4),$this->uri->segment(3));
      

            /* Carga de las vistas */
			$this->load->view('header', $head);
    		$this->load->view('menu', $menu);
    		
    		$this->load->view('catalogo_producto_view', $contenido); // Contenido
    		
    		$this->load->view('footer');
       }
       
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