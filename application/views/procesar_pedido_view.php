<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'>

<!--  Procesar Pedido -->
<div class='grid_10 push_1' id='procesar_pedido'>
<span>( por ahora únicamente: CONTRAREEMBOLSO )</span>
<?php echo validation_errors('<div class="error">','</div>') ?>
<?php echo form_open('carrito/pedido') ?>
	<!--  Datos de Envio -->
	<div class='grid_6 push_3' id='envio'>
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
	<div class='grid_6 push_3' id='factura'>
	<?php echo form_label('Direccion donde enviar la factura: ', 'direccion_factura') ?>
	<?php echo form_input(array('name' => 'direccion_factura', 'id' => 'direccion_factura', 'maxlength'   => '50', 'size' => '50', 'value' => set_value('direccion', $direccion))) ?>
	<span>Forma de pago <?php echo $direccion?></span>
	<br>
	<input type="radio" name="formapago" value="contra reembolso" class='inline'> Contra Reembolso<br>
	<input type="radio" name="formapago" value="x" class='inline'> Tarjeta crédito<br>
	<input type="radio" name="formapago" value="y" class='inline'> Transferencia Bancaria
	<p>
	<input type="checkbox" name="privacidad" value="privacidad" class='inline'> He leído y acepto la Política de Privacidad *<br>
	<input type="checkbox" name="condiciones" value="condiciones" class='inline'> He leído y acepto las Condiciones de compra *
	</p>
	</div>
	<div class=clear></div>
	
	<span class='grid_6 push_5' id='solicitar'><?php echo form_submit('enviar', 'Solicitar')?></span>
	<div class=clear></div>
<?php echo form_close();?>
</div>
<div class=clear></div>	

</div><!--  Fin Procesar Pedido -->

<div class=clear></div>

</div> <!--  Fin Contenido -->