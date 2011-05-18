<!--  Contenido -->
<div class='grid_10'> 

	<!-- El input tab_seleccionada sirve a ui.js mostrar que pestaña abrir -->
	<input type="hidden" id='tab_seleccionada' value="4"/>
	
	<div id="tabs">
	<ul>
		<li><?php echo anchor('inicio/index', 'Inicio');?></li>
		<li><?php echo anchor('Informacion', 'Informacion');?></li>
		<li><?php echo anchor('contactar/index', 'Contactar');?></li>
		<li><a href="#tabs-4">Mi Cuenta</a></li>
		
		<form class="buscador" accept-charset="utf-8" method="post" action="<?php echo base_url();?>buscador/index">
			<input type='text' name='busqueda' id='busqueda' maxlength='30' size='20'/>
			<input type='submit' value='Buscar'/>
			<br/>
		</form>
	</ul>
	<div id='tabs-4'>		
		<div class='grid_4 push_4'> <!--  Formulario LOGIN -->
		<p>Recupere contraseña introduciendo su usuario o su email:</p>
		<?php echo validation_errors('<div class="error">','</div>') ?>
		<?php echo form_open('recuperar_password/index') ?>
		<?php echo form_label('Usuario o email: ', 'user_email') ?>
		<?php echo form_input(array('name' => 'user_email', 'id' => 'user_email', 'size' => '40', 'value' => set_value('usuario'))) ?>
		<?php echo form_submit('enviar', 'Recuperar') ?>
		<?php echo form_close() ?>
		</div>
	</div>
<div class=clear></div>
 
</div> <!--  Fin Contenido -->

