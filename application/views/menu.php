<!-- Menu Horizontal -->
<div class='clear'>&nbsp;</div>


<!--  Menu Vertical -->
<div class='clear'>&nbsp;</div> 
<div class='grid_2'> 

<div class='menu_vertical' id='menu_vertical'>

	<!-- Accordion -->
	<p class='inline'>ANIMALES</p><img src='<?php echo base_url();?>img/tortuga.png'>
	<div id="acordeon_animales">	
	<?php foreach ($menu as $fila){
		 if ($fila['categoria']->tipo == 'animales') {
			echo '<h3><a href="#">'.$fila['categoria']->nombre.'</a></h3>';
	         if (count($fila['subcategorias']) > 0){ // Si existen subcategorias
		         echo'<div><ul>';
		         foreach ($fila['subcategorias'] as $sub_fila) {
		         	echo '<li>'.anchor('producto/index/'.$sub_fila->cod, $sub_fila->nombre).'</li>';
		         }
		         echo'</ul></div>';
        	 }
         } 
	}
	?>
	</div>
	
	<p class='inline'>ARTICULOS</p><img src='<?php echo base_url();?>img/hueso.png'>
	<div id="acordeon_articulos">
	<?php foreach ($menu as $fila){
		 if ($fila['categoria']->tipo == 'articulos') {
			echo '<h3><a href="#">'.$fila['categoria']->nombre.'</a></h3>';
	         if (count($fila['subcategorias']) > 0){ // Si existen subcategorias
		         echo'<div><ul>';
		         foreach ($fila['subcategorias'] as $sub_fila) {
		         	echo '<li>'.anchor('producto/index/'.$sub_fila->cod, $sub_fila->nombre).'</li>';
		         }
		         echo'</ul></div>';
        	 }
         } 
	}
	?>
	</div>
</div>

 </div> <!--  Fin Menu Vertical -->
 
 