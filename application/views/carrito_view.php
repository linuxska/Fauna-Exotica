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
			<input id='boton_buscar' type='submit' value='Buscar'/>
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
			      <th>Actualizar</th>
				  <th>Precio unidad</th>
				  <th>Precio total</th>
				  <th></th>
			    </tr>
			</thead>
			<tfoot></tfoot>
			<tbody>
			
			<?php foreach ($carrito as $indice => $producto):?>
				
								
			    <tr>
			    <form accept-charset="utf-8" method="post" action="<?php echo base_url()?>carrito/actualizar">
					<td><?php echo "<img src=".base_url()."img/productos/".$producto['foto']." class='carrito_img'>"; ?></td>
				    <td><?php echo $producto['name']; ?></td>
				    <td><?php echo form_hidden('rowid', $producto['rowid']); ?>
				    <?php echo form_input(array('name' => 'cantidad', 'id' => 'cantidad', 'maxlength'   => '3', 'size' => '3', 'value' => set_value('cantidad',$producto['qty']))) ?></td>
				    <td><p><span class='actu'></span></p></td>	    	    
				    <td><?php echo $producto['price'];?>€</td>
				    <td><?php echo ($producto['price'] * $producto['qty']);?>€</td>
				    <td><a href= '<?php echo base_url()?>index.php/carrito/eliminar/<?php echo $producto['rowid'];?>'><img src="<?php echo base_url().'img/x.png'?>"></a>
			    </form></tr>
			    
			<?php endforeach; ?>
			
			</tbody>
			</table>
			<p style="text-align: right">Total:&nbsp;<?php echo $total; ?>€ &nbsp;&nbsp;</p>
			
			<?php if ($total_items>0) {
				echo '<p class="centrado">'.anchor('carrito/pedido', 'Procesar pedido', 'class="boton_ui" id="B_procesar_pedido"').'</p>'; 
				if( $this->session->userdata('logged_in') !==  TRUE) {
					echo '<p class="centrado">(Es necesario tener una cuenta iniciada)</p>';					
					// Si no ha iniciado sesión mostrará este dialogo:
					echo '<div id="D_procesar_pedido" title="Abre tu cuenta"><p>
							<span class="ui-icon ui-icon-circle-close" style="float:left; margin:0 7px 50px 0;"></span>
							Para proceder al pago debe abrir su cuenta. Vaya a '.anchor('cuenta/index', 'Mi Cuenta').' e inice sesión o registrese como nuevo usuario.</p></div>';
				}
			} 
			?>
			
			</div>
			<div class=clear></div>	

        </div> 
	</div>
</div> <!--  Fin Contenido -->