<!--  Contenido -->

<h1>Cuenta</h1>

<div class='grid_4 push_1'> <!--  Formulario LOGIN -->
<p>Iniciar sesión:</p>
<?php echo validation_errors('<div class="error">','</div>') ?>
<?php echo form_open('login/index') ?>
<?php echo form_label('Usuario: ', 'usuario') ?>
<?php echo form_input(array('name' => 'usuario', 'id' => 'usuario', 'maxlength'   => '25', 'size' => '40', 'value' => set_value('nombre'))) ?>
<?php echo form_label('Contraseña:', 'password'); ?>
<?php echo form_password(array('name' => 'password', 'id' => 'password', 'maxlength'   => '40', 'size' => '40')); ?>
<?php echo form_submit('enviar', 'Login') ?>
<?php echo form_close() ?>
<p><?php echo anchor('recuperar_password/index', '¿Has olvidado tu contraseña?')?></p>
</div>

<div class='grid_4 push_3'> <!--  Enlaces -->
<p>¿Nuevo usuario?</p>
<p><?php echo anchor('registro/index', '¡REGISTRATE AQUÍ!')?></p>
</div>

<div class=clear></div>



