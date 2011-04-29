<!--  Contenido -->
<div class='grid_10'> 

	<!-- El input tab_seleccionada sirve a ui.js mostrar que pestaña abrir -->
	<input type="hidden" id='tab_seleccionada' value="4"/>
	
	<div id="tabs">
	<ul>
		<li><?php echo anchor('inicio/indextab', 'Inicio');?></li>
		<li><?php echo anchor('informacion', 'Informacion');?></li>
		<li><?php echo anchor('contactar/tab', 'Contactar');?></li>
		<li><a href="#tabs-4">Mi Cuenta</a></li>
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

