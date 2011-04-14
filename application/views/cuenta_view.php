<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'>

<!--  Cuenta -->
<div class='grid_8 push_2 cuenta'>

	<!--  Menu de cuenta -->
	<div class='grid_4'>
	<ul>
	<li>Mi perfil</li>
	<li>Mis pedidos</li>
	<li>Mensajes</li>
	</ul>
	</div>

	<!--  Datos perfil -->
	<div class='grid_5 push_1'>
	<?php echo validation_errors('<div class="error">','</div>') ?>
	<?php echo form_open('cuenta/perfil') ?>
	
	<?php echo form_label('Nombre: ', 'nombre') ?>
	<?php echo form_input(array('name' => 'nombre', 'id' => 'nombre', 'size' => '40', 'value' => set_value('nombre'))) ?>
	<?php echo form_label('1º Apellido: ', 'apellido1') ?>
	<?php echo form_input(array('name' => 'apellido1', 'id' => 'apellido1', 'size' => '40', 'value' => set_value('apellido1'))) ?>
	<?php echo form_label('2ºApellido: ', 'apellido2') ?>
	<?php echo form_input(array('name' => 'apellido2', 'id' => 'apellido2', 'size' => '40', 'value' => set_value('apellido2'))) ?>
	<?php echo form_label('Dirección: ', 'direccion') ?>
	<?php echo form_input(array('name' => 'direccion', 'id' => 'direccion', 'size' => '40', 'value' => set_value('direccion'))) ?>	
	<?php echo form_submit('enviar', 'Guardar') ?>
	<?php echo form_close() ?>
	</div>

	<!--  Datos perfil -->
	<div class='grid_5 push_1'>
	<?php echo validation_errors('<div class="error">','</div>') ?>
	<?php echo form_open('cuenta/datos') ?>
	
	<?php echo form_label('Email:', 'email'); ?>
	<?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '40', 'value' => set_value('email'))); ?>
	<?php echo form_label('Contrase&ntilde;a:', 'password'); ?>
	<?php echo form_password(array('name' => 'password', 'id' => 'password', 'size' => '40')); ?>
	<?php echo form_label('Reescribe la contrase&ntilde;a:', 'repassword'); ?>
	<?php echo form_password(array('name' => 'repassword', 'id' => 'repassword', 'size' => '40')); ?>
	<?php echo form_submit('enviar', 'Guardar') ?>
	<?php echo form_close() ?>
	</div>
	<div class=clear></div>
</div><!--  Fin cuenta -->

<div class=clear></div>
</div> 

</div> <!--  Fin Contenido -->