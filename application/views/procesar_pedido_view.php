<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'>

<!--  Cuenta -->
<div class='grid_10 push_1 procesar_pedido'>

<?php echo validation_errors('<div class="error">','</div>') ?>
<?php echo form_open('cuenta/perfil') ?>
	<!--  Datos de Envio -->
	<div class='envio grid_6 push_3'>
	<?php echo form_label('Direccion del envio: ', 'direccion_envio') ?>
	<?php echo form_input(array('name' => 'direccion_envio', 'id' => 'direccion_envio', 'maxlength'   => '50', 'size' => '50', 'value' => set_value('direccion', $direccion))) ?>
	<span>Forma de envío</span>
	<br>
	<input type="radio" name="formaenvio" value="correo" class='inline'> Correo<br>
	<input type="radio" name="formaenvio" value="x" class='inline'> Lorem<br>
	<input type="radio" name="formaenvio" value="y" class='inline'> Ipsum
	</div>
	<div class=clear></div>
	
	<hr></hr>
	
	<span class='grid_6 push_3 centrado' id='continuar_pedido'>Continuar</span>
	
	<!--  Datos de Facturacion -->
	<div class='factura grid_6 push_3'>
	<?php echo form_label('Direccion donde enviar la factura: ', 'direccion_factura') ?>
	<?php echo form_input(array('name' => 'direccion_factura', 'id' => 'direccion_factura', 'maxlength'   => '50', 'size' => '50', 'value' => set_value('direccion', $direccion))) ?>
	<span>Forma de envío <?php echo $direccion?></span>
	<br>
	<input type="radio" name="formaenvio" value="correo" class='inline'> Contra Reembolso<br>
	<input type="radio" name="formaenvio" value="x" class='inline'> Tarjeta crédito<br>
	<input type="radio" name="formaenvio" value="y" class='inline'> Transferencia Bancaria
	<p>
	<input type="checkbox" name="privacidad" value="privacidad" class='inline'> He leído y acepto la Política de Privacidad *<br>
	<input type="checkbox" name="condiciones" value="condiciones" class='inline'> He leído y acepto las Condiciones de compra *
	</p>
	</div>
	<div class=clear></div>
	
<?php echo form_close();?>
</div>
	
	<div class=clear></div>
</div><!--  Fin cuenta -->

<div class=clear></div>
</div> 

</div> <!--  Fin Contenido -->