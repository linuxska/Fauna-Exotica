<!--  Contenido -->
<div class='grid_10'> 

	<!-- El input tab_seleccionada sirve a ui.js mostrar que pestaña abrir -->
	<input type="hidden" id='tab_seleccionada' value='3'/>
	
	<div id="tabs">
	<ul>
		<li><?php echo anchor('inicio', 'Inicio');?></li>
		<li><?php echo anchor('Informacion', 'Informacion');?></li>
		<li><a href="#tabs-3">Contactar</a></li>
		
		<form class="buscador" accept-charset="utf-8" method="get" action="<?php echo base_url();?>buscador/index">
			<input type='text' name='busqueda' id='busqueda' maxlength='30' size='20'/>
			<input id='boton_buscar' type='submit' value='Buscar'/>
			<br/>
		</form>
	</ul>
	<div id='tabs-3'>
	El email ha sido enviado correctamente
	<div class=clear></div>
	</div>
	</div>
	<div class=clear></div>
	
</div> <!--  Fin Contenido -->