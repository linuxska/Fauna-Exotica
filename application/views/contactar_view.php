<!--  Contenido -->
<div class='grid_10'>

<div class='contenido'>

<p>Envienos un mesaje:</p>
<?php echo validation_errors('<div class="error">','</div>') ?>
<?php echo form_open('recuperar_password/index') ?>
<?php echo form_label('Usuario o email: ', 'user_email') ?>
<?php echo form_input(array('name' => 'user_email', 'id' => 'user_email', 'size' => '40', 'value' => set_value('usuario'))) ?>
<?php echo form_submit('enviar', 'Recuperar') ?>
<?php echo form_close() ?>

</div>

</div> <!--  Fin Contenido -->
