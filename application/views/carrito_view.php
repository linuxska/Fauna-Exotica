<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'> 

<div class='grid_10 push_1 carrito'>
<p>Hay un total de <?php echo $total_items;?> productos.</p>
<table>
<thead>
    <tr>
	  <th></th>
      <th></th>
      <th>Cantidad</th>
      <th></th>
	  <th>Precio unidad</th>
	  <th>Precio total</th>
	  <th></th>
    </tr>
</thead>
<tfoot></tfoot>
<tbody>

<?php foreach ($carrito as $indice => $producto): ?>
	<?php echo form_open('carrito/actualizar') ?>
    <tr>
		<td><?php echo "<img src=".base_url()."img/productos/".$producto['foto']." class='carrito_img'>"; ?></td>
	    <td><?php echo $producto['name']; ?></td>
	    <td><?php echo form_hidden('rowid', $producto['rowid']); ?>
	    <?php echo form_input(array('name' => 'cantidad', 'id' => 'cantidad', 'maxlength'   => '3', 'size' => '3', 'value' => set_value('cantidad',$producto['qty']))) ?></td>
	    <td><input type="image" name="actualizar" src="<?php echo base_url();?>img/actualizar.png">Actualizar</td>	    	    
	    <td><?php echo $producto['price'];?>€</td>
	    <td><?php echo ($producto['price'] * $producto['qty']);?>€</td>
	    <td><a href= '<?php echo base_url()?>index.php/carrito/eliminar/<?php echo $producto['rowid'];?>'><img src="<?php echo base_url().'img/x.png'?>"></a>
    </tr>
    <?php echo form_close();?>
<?php endforeach; ?>

</tbody>
</table>
<p style="text-align: right">Total:&nbsp;<?php echo $total; ?>€ &nbsp;&nbsp;</p>
<p><?php echo anchor('carrito/pedido', 'Procesar pedido'); ?></p>
</div>


<div class=clear></div>
</div>
</div> <!--  Fin Contenido -->