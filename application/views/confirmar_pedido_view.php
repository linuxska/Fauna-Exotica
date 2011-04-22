<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'>

	<div class='grid_10 push_1'>
	
	<p>Confirmar pedido</p>	
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
	<p>Envio: <?php echo $pedido['formaenvio']?></p>
	<p> Gastos de envío: 5 €</p>
	
	<p>Dirección de factura: <?php echo $pedido['direccion_factura']?></p>
	<p>Pago: <?php echo $pedido['formapago']?></p>
	
	<p>Total Factura: <?php echo ($total + 5)?> €</p>
	</div>
	
<div class='grid_10 push_1'>
<?php echo form_open('carrito/confirmar_pedido', '', $pedido) ?>
<?php echo form_submit('enviar', 'Confirmar')?>
<?php echo form_close();?>
</div>

</div> 
<div class=clear></div>
</div> <!--  Fin Contenido -->