<!--  Contenido -->
<div class='grid_10'> 
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Carro</a></li>
		<li><?php echo anchor('inicio', 'Inicio');?></li>
		<li><?php echo anchor('informacion', 'Informacion');?></li>
		<li><?php echo anchor('contactar/index', 'Contactar');?></li>
		<li><?php echo anchor('cuenta/index', 'Mi Cuenta');?></li>
	</ul>
	<div id="tabs-1">
		<h1>Carro de compra</h1>
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
			<p><?php 
				if ($total_items>0) {
					echo anchor('carrito/pedido', 'Procesar pedido'); 
					if( $this->session->userdata('logged_in') !==  TRUE)
						echo " (Es nesesario tener una cuenta iniciada)";
				}
			?></p>
			</div>
			<div class=clear></div>	
	</div>






</div> <!--  Fin Contenido -->