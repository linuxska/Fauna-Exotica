<!--  Contenido -->
<div class='grid_10'> 
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Procesar Pedido</a></li>
		<li><?php echo anchor('inicio', 'Inicio');?></li>
		<li><?php echo anchor('Informacion', 'Informacion');?></li>
		<li><?php echo anchor('contactar/index', 'Contactar');?></li>
		
		<form class="buscador" accept-charset="utf-8" method="get" action="<?php echo base_url();?>buscador/index">
			<input type='text' name='busqueda' id='busqueda' maxlength='30' size='20'/>
			<input id='boton_buscar' type='submit' value='Buscar'/>
			<br/>
		</form>
	</ul>
	<div id="tabs-1">

<!--  Procesar Pedido -->
<div class='grid_10 push_1' id='procesar_pedido'>

<?php echo validation_errors('<div class="error">','</div>') ?>
<?php echo form_open('carrito/pedido') ?>

	<!--  Datos de Facturacion -->
	<div class='grid_6 push_3' id='factura'>
	<span>Forma de pago </span>
	<br>
	<input type="radio" name="formapago" value="contra_reembolso" class='inline'> Contra Reembolso<br>
	<input type="radio" name="formapago" value="paypal" class='inline'> <img src="<?php echo base_url();?>img/Paypal.png"></img>
	<p>
	<input type="checkbox" name="condiciones" value="condiciones" class='inline'> He leído y acepto la Política de Privacidad y Condiciones de compra *<br>
	</p>
	</div>
	<div class=clear></div>
	
	<span class='grid_6 push_3 centrado' id='continuar_pedido'>Continuar</span>

	<hr id='barra'></hr>
		
	<!--  OPCION 1 : Datos de Envio -->
	<div class='grid_6 push_3' id='envio'>
	<?php echo form_label('Direccion del envio: ', 'direccion_envio') ?>
	<?php echo form_input(array('name' => 'direccion_envio', 'id' => 'direccion_envio', 'maxlength'   => '50', 'size' => '50', 'value' => set_value('direccion', $direccion))) ?>
	<?php echo form_label('Direccion donde enviar la factura: ', 'direccion_factura') ?>
	<?php echo form_input(array('name' => 'direccion_factura', 'id' => 'direccion_factura', 'maxlength'   => '50', 'size' => '50', 'value' => set_value('direccion', $direccion))) ?>
	<span>Forma de envío</span>
	<br>
	<input type="radio" name="formaenvio" value="correo" class='inline'> Correos<br>
	<input type="radio" name="formaenvio" value="seur" class='inline'> Seur (Transporte urgente 24h)
	<br>
	<span class='grid_6 push_5' id='solicitar'><?php echo form_submit('enviar', 'Solicitar')?></span>
	<div class=clear></div>
	</div>

	<!--  OPCION 2 : Advertencia Paypal -->
	<div class='grid_6 push_3' id='paypal'>
	<p>Será usted redirigido a la página de paypal para proceder al pago. Una vez finalizado volverá a nuestra web.</p>
	

	
	
<?php echo form_close();?>

			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"> 
            <input type="hidden" name="cmd" value="_cart"> 
            <input type="hidden" name="upload" value="1"> 
            <input type="hidden" name="business" value="lausca_1304508702_biz@gmail.com"> 
            <?php $i=1; ?>
            <?php foreach ($carrito as $indice => $producto): ?>
            <input type="hidden" name="item_name_<?php echo $i;?>" value="<?php echo $producto['name'];?>"> 
            <input type="hidden" name="amount_<?php echo $i;?>" value="<?php echo $producto['price'];?>"> 
			<input type="hidden" name="quantity_<?php echo $i;?>" value="<?php echo $producto['qty'];?>">
            <?php $i++; ?>
            <?php endforeach; ?>
            <INPUT TYPE="hidden" NAME="return" value="http://localhost/Fauna-Exotica/carrito/transactionID">
            <span id='solicitar'><input id='submit_paypal' type="submit" value="PayPal"> </span>          
            </form></div>
	<div class=clear></div>
	
</div><!--  Fin Procesar Pedido -->
<div class=clear></div>	

</div>  <!--  fin tab1 -->
<div class=clear></div>
</div>    <!--  fin  tabs -->
</div> <!--  Fin grid10 -->