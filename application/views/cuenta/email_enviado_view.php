<!--  Contenido -->
<div class='grid_10'> 

	<!-- El input tab_seleccionada sirve a ui.js mostrar que pestaña abrir -->
	<input type="hidden" id='tab_seleccionada' value='4'/>
	
	<div id="tabs">
	<ul>
		<li><?php echo anchor('inicio', 'Inicio');?></li>
		<li><?php echo anchor('Informacion', 'Informacion');?></li>
		<li><?php echo anchor('contactar/index', 'Contactar');?></li>
		<li><a href="#tabs-4">Mi Cuenta</a></li>
		
		<form class="buscador" accept-charset="utf-8" method="post" action="<?php echo base_url();?>buscador/index">
			<input type='text' name='busqueda' id='busqueda' maxlength='30' size='20'/>
			<input id='boton_buscar' type='submit' value='Buscar'/>
			<br/>
		</form>
	</ul>
	<div id='tabs-4'>
	El email ha sido enviado correctamente. Recibirá una nueva contraseña. Le aconsejamos que la cambie una vez iniciada su cuenta.
	<div class=clear></div>
	</div>
	</div>
	<div class=clear></div>
	
</div> <!--  Fin Contenido -->