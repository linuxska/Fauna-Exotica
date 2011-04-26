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
			/* Datos de paginacion*/     		
       		$config['base_url']= base_url().'index.php/producto/index/'.$this->uri->segment(3);
       		$config['total_rows']=$this->producto_model->total_productos($this->uri->segment(3));
       		$config['per_page'] = '9';
       		$config['uri_segment']=4;
       		$config['num_links'] = 2;
       		$config['first_link'] = 'First';
       		$config['next_link'] = 'Siguiente';
       		$config['prev_link'] = 'Anterior';	
       		$config['prev_tag_open'] = '<div class="anterior">';
			$config['prev_tag_close'] = '</div>';
       		$config['next_tag_open'] = '<div class="siguiente">';
			$config['next_tag_close'] = '</div>';
			
       		$this->pagination->initialize($config);
    		
   		     // Reglas de validacion del formulario
			$this->establecer_reglas();
			
       		/* Datos para la vista */
       		$head['titulo'] = "Cuenta";
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
			
			if($this->form_validation->run()==FALSE){
       			// Si el formulario no se ha enviado
       			$this->load->view('menu', $menu);
				$this->load->view('');	
			
       		}else{
			
				//Obtener carálogo
				$busqueda = explode($' ', $this->input->post('busqueda'));
				$contenido['productos'] = $this->producto_model->buscar($config['per_page'], 
										$this->uri->segment(4),
										$busqueda);
										
				$this->load->view('catalogo_producto_view', $contenido); // Contenido
			
			}
    		$this->load->view('footer'); 
       }
       
       
		// Reglas Form Validation
       private function establecer_reglas(){
       	    $this->form_validation->set_rules('usuario', 'usuario', 'required|trim|min_length[3]|max_length[30]');
				
			$this->form_validation->set_message('required', 'Debe introducir el campo %s');
			$this->form_validation->set_message('min_length', 'El campo %s debe ser de al menos %s caracteres');
			$this->form_validation->set_message('max_length', 'El campo %s debe tener como máximo %s caracteres');			
       }
}
?>
