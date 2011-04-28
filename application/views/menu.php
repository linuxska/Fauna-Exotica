<!-- Menu Horizontal -->
<div class='clear'>&nbsp;</div>
	<div class='grid_10 push_2'>
		<?php echo anchor('cuenta/index', 'Mi cuenta')?>
		<form class="buscador" action="<?php echo base_url();?>buscador/index" method="POST">
		<input type='text' name='busqueda' id='busqueda' maxlength='30' size='20'/>
		<input type='submit' value='Buscar'/>
		</form>


	</div> <!-- Fin Menu Horizontal -->


<!--  Menu Vertical -->
<div class='clear'>&nbsp;</div> 
<div class='grid_2'> 

<div class='menu_vertical'>

	<!-- Accordion -->
	<p>ANIMALES</p>
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
	
	<p>ARTICULOS</p>
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
 
 