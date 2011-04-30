<!--  Contenido -->
<div class='grid_10'> 

	<!-- El input tab_seleccionada sirve a ui.js mostrar que pestaña abrir -->
	<input type="hidden" id='tab_seleccionada' value='3'/>
	
	<div id="tabs">
	<ul>
		<li><?php echo anchor('inicio', 'Inicio');?></li>
		<li><?php echo anchor('informacion', 'Informacion');?></li>
		<li><a href="#tabs-3">Contactar</a></li>
		<li><?php echo anchor('cuenta/index', 'Mi Cuenta');?></li>
	</ul>
	<div id='tabs-3'>
	El email ha sido enviado correctamente
	<div class=clear></div>
	</div>
	</div>
	<div class=clear></div>
	
</div> <!--  Fin Contenido -->