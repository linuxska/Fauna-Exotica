<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'>
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

<div class=clear></div>
</div> 

</div> <!--  Fin Contenido -->

