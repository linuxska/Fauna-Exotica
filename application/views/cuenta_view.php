<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'>

<!--  Cuenta -->
<div class='grid_10 push_1 cuenta'>

	<!--  Menu de cuenta -->
	<div class='grid_4 omega push_1'>
	<ul>
	<li id='perfil_link'><a href="#">Mi perfil</span></li>
	<li id='datos_link'><a href="#">Mis datos</span></li>
	<li>Mis pedidos</li>
	<li>Mensajes</li>
	</ul>
	</div>

	<!--  Datos perfil -->
	<div class='grid_6 push_1 alpha seccion' id='perfil'>
	<?php echo validation_errors('<div class="error">','</div>') ?>
	<?php echo form_open('cuenta/perfil') ?>
	
	<?php echo form_label('Nombre: ', 'nombre') ?>
	<?php echo form_input(array('name' => 'nombre', 'id' => 'nombre', 'maxlength'   => '25', 'size' => '50', 'value' => set_value('nombre', $nombre))) ?>
	<?php echo form_label('1º Apellido: ', 'apellido1') ?>
	<?php echo form_input(array('name' => 'apellido1', 'id' => 'apellido1', 'maxlength'   => '30', 'size' => '50', 'value' => set_value('apellido1', $apellido1))) ?>
	<?php echo form_label('2ºApellido: ', 'apellido2') ?>
	<?php echo form_input(array('name' => 'apellido2', 'id' => 'apellido2', 'maxlength'   => '30', 'size' => '50', 'value' => set_value('apellido2', $apellido2))) ?>
	<?php echo form_label('Dirección: ', 'direccion') ?>
	<?php echo form_input(array('name' => 'direccion', 'id' => 'direccion', 'maxlength'   => '50', 'size' => '50', 'value' => set_value('direccion', $direccion))) ?>	

	<?php echo form_submit('enviar', 'Guardar') ?>
	<?php echo form_close() ?>
	</div>

	<!--  Datos Usuario -->
	<div class='grid_6 push_1 alpha seccion' id='datos'>
	<?php echo form_open('cuenta/datos') ?>
	
	<?php echo form_label('Email:', 'email'); ?>
	<?php echo form_input(array('name' => 'email', 'id' => 'email', 'maxlength'   => '40', 'size' => '50', 'value' => set_value('email', $email))); ?>
	<?php echo form_label('Contraseña actual:', 'password'); ?>
	<?php echo form_password(array('name' => 'password_actual', 'id' => 'password', 'maxlength'   => '40', 'size' => '50')); ?>
	<?php echo form_label('Nueva contraseña:', 'password_nueva'); ?>
	<?php echo form_password(array('name' => 'password', 'id' => 'password', 'maxlength'   => '40', 'size' => '50')); ?>
	<?php echo form_label('Reescribe la contraseña:', 'repassword'); ?>
	<?php echo form_password(array('name' => 'repassword', 'id' => 'repassword', 'maxlength'   => '40', 'size' => '50')); ?>
	<?php echo form_submit('enviar', 'Guardar') ?>
	<?php echo form_close() ?>
	</div>
	<div class=clear></div>
</div><!--  Fin cuenta -->

<div class=clear></div>
</div> 

</div> <!--  Fin Contenido -->