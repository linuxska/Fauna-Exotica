<!--  Contenido -->
<div class='grid_10'> 

	<!-- El input tab_seleccionada sirve a ui.js mostrar que pestaña abrir -->
	<input type="hidden" id='tab_seleccionada' value="4"/>
	
	<div id="tabs">
	<ul>
		<li><?php echo anchor('inicio/indextab', 'Inicio');?></li>
		<li><?php echo anchor('Informacion', 'Informacion');?></li>
		<li><?php echo anchor('contactar/tab', 'Contactar');?></li>
		<li><a href="#tabs-4">Mi Cuenta</a></li>
		
		<form class="buscador" accept-charset="utf-8" method="post" action="<?php echo base_url();?>buscador/index">
			<input type='text' name='busqueda' id='busqueda' maxlength='30' size='20'/>
			<input type='submit' value='Buscar'/>
			<br/>
		</form>
	</ul>
	<div id='tabs-4'>	
	<div class='grid_4 push_4'>
	<p>Rellene los datos de registro:</p>
	<?php echo validation_errors('<div class="error">','</div>') ?>
	<?php echo form_open('registro/index') ?>
	<?php echo form_label('Usuario: ', 'usuario') ?>
	<?php echo form_input(array('name' => 'usuario', 'id' => 'usuario', 'maxlength'   => '20', 'size' => '40', 'value' => set_value('usuario'))) ?>
	<?php echo form_label('Email:', 'email'); ?>
	<?php echo form_input(array('name' => 'email', 'id' => 'email', 'maxlength'   => '40', 'size' => '40', 'value' => set_value('email'))); ?>
	<?php echo form_label('Contraseña:', 'password'); ?>
	<?php echo form_password(array('name' => 'password', 'id' => 'password', 'maxlength'   => '40', 'size' => '40')); ?>
	<?php echo form_label('Reescribe la contraseña:', 'repassword'); ?>
	<?php echo form_password(array('name' => 'repassword', 'id' => 'repassword', 'maxlength'   => '40', 'size' => '40')); ?>
	<?php echo form_submit('enviar', 'Registrarse') ?>
	<?php echo form_close() ?>
	</div>
	</div>

<div class=clear></div>


</div> <!--  Fin Contenido -->

