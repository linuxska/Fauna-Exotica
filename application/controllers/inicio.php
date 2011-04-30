<?php 
/*
 * INICIO
 * Pagina principal de la aplicacion
 */
class Inicio extends CI_Controller {

       public function __construct()
       {
            parent::__construct();
			$this->load->model('novedades_model');
       }
       
       public function Index(){     		
       		/* Datos para la vista */
       		$head['titulo'] = "Inicio";
     
            // Obtener menu
			$menu['menu'] = $this->menu_model->obtener_menu();

            /* Carga de las vistas */
			$this->load->view('header', $head);
    		$this->load->view('menu', $menu);
    		
    		//Obtener novedades
            $contenido['novedad'] = $this->novedades_model->obtener_novedades();
    		
    		// Tabs
    		$this->load->view('inicio_view', $contenido);
    		
    		$this->load->view('footer');
       }
	   
}
?>
