<!--  Contenido -->
<div class='grid_10'> 
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Compra Paypal</a></li>
		<li><?php echo anchor('inicio', 'Inicio');?></li>
		<li><?php echo anchor('Informacion', 'Informacion');?></li>
		<li><?php echo anchor('contactar/index', 'Contactar');?></li>
		
		<form class="buscador" accept-charset="utf-8" method="get" action="<?php echo base_url();?>buscador/index">
			<input type='text' name='busqueda' id='busqueda' maxlength='30' size='20'/>
			<input type='submit' value='Buscar'/>
			<br/>
		</form>
	</ul>
	<div id="tabs-1">
		<h3>¡Gracias por tu compra!</h3>
		Detalles del pago por paypal:<br>
		Nombre: <?php echo $nombre;?>;<br>
		Coste total: <?php echo $coste_total;?><br>
		<p>Tu transacción se ha completado, el recibo se ha enviado a tu email.</p>
		<br>Deberás loguearte en <a href='https://www.paypal.com'>www.paypal.com</a> para ver los detalles de la transacción.<br>
    </div> 
	</div>
</div> <!--  Fin Contenido -->