<!--  Contenido -->
<div class='grid_10'> 

	<div id="tabs-1">
	<h1>Producto</h1>
	<!--  Cuenta -->
	<div class='grid_10 push_1 cuenta'>
	
		<!--  Menu de cuenta -->
		<div class='grid_4 omega push_1'>
		<ul>
		<li id='inicio_link'><a href="#">Cuenta</li>
		<li id='perfil_link'><a href="#">Mi perfil</li>
		<li id='datos_link'><a href="#">Mis datos</li>
		<li>Mis pedidos</li>
		<li>Mensajes</li>
		</ul>
		</div>
		
		<!--  Inicio Cuenta -->
		<div class='grid_6 push_1 alpha seccion' id='cuenta_inicio'>
		<p>Bienvenido <?php echo $usuario?></p>
		<?php if ($tipo === 'cliente') {
			echo "<p>Continuar comprando</p>";
		} else {
			echo '<p>Tiene usted permiso de '.$tipo.'</p>';
			echo anchor('backend/index', ' Acceder al Backend');
			
		}?>
		</div>
		
		<!--  Datos perfil -->
		<div class='grid_6 push_1 alpha seccion' id='cuenta_perfil'>
		Modificar datos personales
		<?php echo form_error('nombre', '<div class="error">', '</div>'); ?>
		<?php echo form_error('apellido1', '<div class="error">', '</div>'); ?>
		<?php echo form_error('apellido2', '<div class="error">', '</div>'); ?>
		<?php echo form_error('direccion', '<div class="error">', '</div>'); ?>
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
		<div class='grid_6 push_1 alpha seccion' id='cuenta_datos'>
		Modificar email
		<?php echo form_error('email', '<div class="error">', '</div>'); ?>
		<?php echo form_error('password_email_actual', '<div class="error">', '</div>'); ?>
		<?php echo form_open('cuenta/email') ?>	
		
		<?php echo form_label('Email:', 'email'); ?>
		<?php echo form_input(array('name' => 'email', 'id' => 'email', 'maxlength'   => '40', 'size' => '50', 'value' => set_value('email', $email))); ?>
		<?php echo form_label('Contraseña actual:', 'password_email_actual'); ?>
		<?php echo form_password(array('name' => 'password_actual', 'id' => 'password', 'maxlength'   => '40', 'size' => '50')); ?>
		
		<?php echo form_submit('enviar', 'Guardar') ?>
		<?php echo form_close() ?>
		
		<hr>
		
		Cambiar de contraseña
		<?php echo form_error('password_actual', '<div class="error">', '</div>'); ?>
		<?php echo form_error('password_nueva', '<div class="error">', '</div>'); ?>
		<?php echo form_error('repassword', '<div class="error">', '</div>'); ?>
		<?php echo form_open('cuenta/password') ?>		
		
		<?php echo form_label('Contraseña actual:', 'password_actual'); ?>
		<?php echo form_password(array('name' => 'password_actual', 'id' => 'password_actual', 'maxlength'   => '40', 'size' => '50')); ?>
		<?php echo form_label('Nueva contraseña:', 'password_nueva'); ?>
		<?php echo form_password(array('name' => 'password_nueva', 'id' => 'password_nueva', 'maxlength'   => '40', 'size' => '50')); ?>
		<?php echo form_label('Reescribe la contraseña:', 'repassword'); ?>
		<?php echo form_password(array('name' => 'repassword', 'id' => 'repassword', 'maxlength'   => '40', 'size' => '50')); ?>
		
		<?php echo form_submit('enviar', 'Guardar') ?>
		<?php echo form_close() ?>
		</div>
		
		<div class=clear></div>
		</div><!--  Fin cuenta -->


</div> <!--  Fin Contenido -->