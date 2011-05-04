<!--  Contenido -->
<div class='grid_10'> 
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Carro</a></li>
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
			
			
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"> 
            <input type="hidden" name="cmd" value="_cart"> 
            <input type="hidden" name="upload" value="1"> 
            <input type="hidden" name="business" value="lausca_1304508702_biz@gmail.com"> 
            <?php $i=1; ?>
            <?php foreach ($carrito as $indice => $producto): ?>
            <input type="hidden" name="item_name_<?php echo $i;?>" value="<?php echo $producto['name'];?>"> 
            <input type="hidden" name="amount_<?php echo $i;?>" value="<?php echo $producto['price'];?>"> 
			<?php $i++; ?>
            <?php endforeach; ?>
            <INPUT TYPE="hidden" NAME="return" value="http://localhost/Fauna-Exotica/carrito/transactionID">
            <input type="submit" value="PayPal"> 
            
            </form> 
	</div>
</div> <!--  Fin Contenido -->