<!--  Contenido -->
<div class='grid_10'> 

	<!-- El input tab_seleccionada sirve a ui.js mostrar que pestaña abrir -->
	<input type="hidden" id='tab_seleccionada' value="3"/>
	
	<div id="tabs">
	<ul>
		<li><?php echo anchor('inicio', 'Inicio');?></li>
		<li><?php echo anchor('Informacion', 'Informacion');?></li>
		<li><a href="#tabs-3">Contactar</a></li>
		
		<form class="buscador" accept-charset="utf-8" method="get" action="<?php echo base_url();?>buscador/index">
			<input type='text' name='busqueda' id='busqueda' maxlength='30' size='20'/>
			<input id='boton_buscar' type='submit' value='Buscar'/>
			<br/>
		</form>
	</ul>
	<div id='tabs-3'>
	
	<div class='grid_6 push_3'>
	<p>Envienos un mesaje breve:</p>
	<?php echo validation_errors('<div class="error">','</div>') ?>
	<?php echo form_open('contactar/index') ?>
	<?php echo form_label('Nombre: ', 'nombre') ?>
	<?php if ($this->session->userdata('logged_in') ===  TRUE)
				echo form_input(array('name' => 'nombre', 'id' => 'nombre', 'maxlength'   => '20', 'size' => '40',
									'value' => set_value('nombre', $cuenta->nombre)));
		  else echo form_input(array('name' => 'nombre', 'id' => 'nombre', 'maxlength'   => '20', 'size' => '40'));?>
	<?php echo form_label('Email:', 'email'); ?>
	<?php 
		if ($this->session->userdata('logged_in') ===  TRUE)
			echo form_input(array('name' => 'email', 'id' => 'email', 'maxlength' => '40', 'size' => '40', 
								'value' => set_value('nombre', $cuenta->email)));
		else echo form_input(array('name' => 'email', 'id' => 'email', 'maxlength' => '40', 'size' => '40'));?>
	<?php echo form_label('Asunto del mensaje:', 'asunto'); ?>
	<?php echo form_input(array('name' => 'asunto', 'id' => 'asunto', 'maxlength'   => '40', 'size' => '40')); ?>
	<?php echo form_label('Mensaje:', 'mensaje'); ?>
	<?php echo form_textarea(array('name' => 'mensaje', 'id' => 'mensaje', 'maxlength'   => '200',  'rows' => '5', 'cols' => '50')); ?>
	<?php echo form_submit('enviar', 'Enviar') ?>
	<?php echo form_close() ?>
	<p>Para comunicarse con mas rigor, contácte con nosotros directamente por email a lauscar.sl@gmail.com</p>
	</div>
	<div class=clear></div>
	</div>
	</div>
	<div class=clear></div>
	
</div> <!--  Fin Contenido -->