<?php
/*
 * Informacion
 */
class Informacion extends CI_Controller {

       public function __construct()
       {
            parent::__construct();   
       }
       
       public function Index(){
       	    // Datos para la vista 
       		$head['titulo'] = "Informacion";
       		$menu['menu'] = $this->menu_model->obtener_menu();

            // Carga de las vistas 
			$this->load->view('header', $head);
    		$this->load->view('menu', $menu);
    		
    		$this->load->view('Informacion_view'); // Contenido
    		
    		$this->load->view('footer');
       }
       
}
?>