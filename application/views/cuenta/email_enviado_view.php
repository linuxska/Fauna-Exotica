<!--  Contenido -->
<div class='grid_10'> 

	<!-- El input tab_seleccionada sirve a ui.js mostrar que pestaña abrir -->
	<input type="hidden" id='tab_seleccionada' value='4'/>
	
	<div id="tabs">
	<ul>
		<li><?php echo anchor('inicio/indextab', 'Inicio');?></li>
		<li><?php echo anchor('informacion', 'Informacion');?></li>
		<li><?php echo anchor('contactar/tab', 'Contactar');?></li>
		<li><a href="#tabs-4">Mi Cuenta</a></li>
	</ul>
	<div id='tabs-4'>
	El email ha sido enviado correctamente. Recibirá una nueva contraseña. Le aconsejamos que la cambie una vez iniciada su cuenta.
	<div class=clear></div>
	</div>
	</div>
	<div class=clear></div>
	
</div> <!--  Fin Contenido -->