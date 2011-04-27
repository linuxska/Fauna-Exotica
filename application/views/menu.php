<!-- Menu Horizontal -->
<div class='clear'>&nbsp;</div>
<div class='grid_10 push_2'>

<p>&nbsp;</p>
<div class="green">
<div id="slatenav">
<ul>
<li><?php echo anchor('inicio', 'Inicio');?></li>
<li><?php echo anchor('informacion', 'Informacion');?></li>
<li><?php echo anchor('contactar', 'Contactar');?></li>
</ul>
<ul class="buscador_cuenta">
<li> 
	<form class="buscador" action="<?php echo base_url();?>buscador/index" method="POST">
	<input type='text' name='busqueda' id='busqueda' maxlength='30' size='20'/>
	<input type='submit' value='Buscar'/>
	</form>
</li>
<li><?php echo anchor('cuenta/index', 'Mi cuenta')?></li>
</ul>
</div>
</div>

</div> <!-- Fin Menu Horizontal -->


  <!--     <script src="http://connect.facebook.net/es_ES/all.js#xfbml=1"></script>
      <fb:like></fb:like> -->
<!--  Menu Vertical -->
<div class='clear'>&nbsp;</div> 
<div class='grid_2'> 

<div class='menu_vertical'>

	<div>
	ANIMALES
	<ul>
	<?php foreach ($menu as $fila) {
		 if ($fila['categoria']->tipo == 'animales') {
	         echo '<li>'.$fila['categoria']->nombre.'</li>';
	         if (count($fila['subcategorias']) > 0){ // Si existen subcategorias
		         echo'<ul class="submenu">';
		         foreach ($fila['subcategorias'] as $sub_fila) {
		         	echo '<li>'.anchor('producto/index/'.$sub_fila->cod, $sub_fila->nombre).'</li>';
		         }
		         echo'</ul>';
        	 }
         } 
	}
	?>
	</ul>
	</div>
	
	<div>
	ARTICULOS
	<ul>
	<?php foreach ($menu as $fila){
		 if ($fila['categoria']->tipo == 'articulos') {
	         echo '<li>'.$fila['categoria']->nombre.'</li>';
	         if (count($fila['subcategorias']) > 0){ // Si existen subcategorias
		         echo'<ul class="submenu">';
		         foreach ($fila['subcategorias'] as $sub_fila) {
		         	echo '<li>'.anchor('producto/index/'.$sub_fila->cod, $sub_fila->nombre).'</li>';
		         }
		         echo'</ul>';
        	 }
         } 
	}
	?>
	</ul>
	</div>

</div>

 </div> <!--  Fin Menu Vertical -->
 
 