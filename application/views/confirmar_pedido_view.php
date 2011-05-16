<!--  Contenido -->
<div class='grid_10'> 

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Confirmar Pedido</a></li>
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
	<h2 class = 'centrado'>Confirmar pedido Contrareembolso</h2>	
	<div class='grid_6 push_3' id='confirmar_contrareembolso'>

	<table>
	<thead>
	    <tr>
		  <th>Producto</th>
	      <th>Cantidad</th>
	    </tr>
	</thead>
	<tfoot></tfoot>
	<tbody>
	
	<?php foreach ($carrito as $indice => $producto): ?>
    <tr>
	    <td><?php echo $producto['name']; ?></td>
	    <td><?php echo $producto['qty']?>
    </tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<p>Precio total pedido:<?php echo $total?> €</p>
	
	<p>Direccion de envio: <?php echo $pedido['direccion_envio']?></p>
	<p>Envio por: <?php echo $pedido['formaenvio']?></p>
	
	<p>Dirección de factura: <?php echo $pedido['direccion_factura']?> (contrareembolso)</p>
	
	<p>Total Factura: <?php echo ($total)?> € (mas gastos de envío)</p>

	<?php echo form_open('carrito/confirmar_contrareembolso', '', $pedido) ?>
	<p class='centrado'><?php echo form_submit('enviar', 'Confirmar')?></p>
	<?php echo form_close();?>
	</div>

</div>
<div class=clear></div>
</div> <!--  Fin Contenido -->