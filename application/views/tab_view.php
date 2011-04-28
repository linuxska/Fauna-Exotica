<!--  Contenido -->
<div class='grid_10'> 

	<!-- El input tab_seleccionada sirve a ui.js mostrar que pestaña abrir -->
	<input type="hidden" id='tab_seleccionada' value="0"/>
	
	<div id="tabs">
	<ul>
		<li><?php echo anchor('inicio/indextab', 'Inicio');?></li>
		<li><?php echo anchor('informacion', 'Informacion');?></li>
		<li><?php echo anchor('contactar/tab', 'Contactar');?></li>
		<li><?php echo anchor('cuenta/tab', 'Mi Cuenta', 'id="link_acordeon_cuenta"');?></li>
	</ul>

	<div class=clear></div>
	
</div> <!--  Fin Contenido -->