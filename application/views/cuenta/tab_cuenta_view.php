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

	<!--  Cuenta -->
	<div class='grid_10 push_1'>
	
		<!--  Menu de cuenta -->
		<div id="acordeon_cuenta">
		<h3><a href="#">Cuenta</a></h3>	
		<div>
		
			<!--  Inicio Cuenta -->
			<div class='grid_6 push_1 alpha' id='cuenta_inicio'>
			<p>Bienvenido <?php echo $usuario?></p>
			<?php if ($tipo === 'cliente') {
				echo "<p>Continuar comprando</p>";
			} else {
				echo '<p>Tiene usted permiso de '.$tipo.'</p>';
				echo anchor('backend/index', ' Acceder al Backend');
				
			}?>
			</div>
		
		</div>
		
		<h3><a href="#">Mi perfil</a></h3>	
		<div>
	
			<!--  Datos perfil -->
			<div class='grid_6 push_1 alpha' id='cuenta_perfil'>
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
		
		</div>
		<h3><a href="#">Mis datos</a></h3>	
		<div>
		
			<!--  Datos Usuario -->
			<div class='grid_6 push_1 alpha' id='cuenta_datos'>
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
		
		</div>
		
		</div> <!--  Fin Acordeon -->
		
		
		<div class=clear></div>
		</div><!--  Fin cuenta -->
		</div>
<div class=clear></div>
</div> <!--  Fin Contenido -->