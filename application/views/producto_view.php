<!--  Contenido -->
<div class='grid_10'> 
	<!-- Tabs -->
	<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Producto</a></li>
		<li><?php echo anchor('inicio', 'Inicio');?></li>
		<li><?php echo anchor('informacion', 'Informacion');?></li>
		<li><?php echo anchor('contactar/index', 'Contactar');?></li>
		<li><?php echo anchor('cuenta/index', 'Mi Cuenta');?></li>
	</ul>
	<div id="tabs-1">
		<h1>Producto</h1>
		<div class='zoom_producto grid_10 push_1 producto'>
			<div class="grid_4"><?php echo "<img src=".base_url()."img/productos/".$producto->foto.">"; ?> </div>
			<div class="grid _2 informacion">
			<p><?php echo $producto->nombre; ?></p>
			<p id="precio"><?php echo $producto->precio; ?> &#8364;</p> 
			</div>
			<div class="carro">
			<?php 	
			
				$data = array(
			               'id'      => $producto->cod,
			               'price'   => $producto->precio,
			               'name'    => $producto->nombre
			            );
			?>
			<?php 
				if($producto->cantidad_disponible<1){
					?><p>Producto no disponible</p>
				<?php }
				else{?>
					<?php echo form_open('carrito/incluir','', $data) ?>
					<p>Cantidad: </p>
					<?php echo form_input(array('name' => 'cantidad', 'id' => 'cantidad', 'maxlength'   => '3', 'size' => '3', 'value' => set_value('cantidad','1'))) ?>
					<br><br><p>Cantidad en stock: <?php echo $producto->cantidad_disponible ?></p>
					<input type="image" class="boton" name="boton" src="<?php echo base_url();?>img/anadir.png">
					<?php echo form_close();
			
			 } ?>
			</div>
			<div class=clear></div>			
				<div class="descripcion">
				<br>
				<p>Descripci&oacute;n:</p><br>
				 <?php echo $producto->descripcion; ?>
				
				<p><?php echo anchor('/producto/index/'.$producto->cod_subcategoria, '<img src="'.base_url().'img/atras.png">')?></p>
				</div>
			</div>
			<div class=clear></div>	
	</div>
</div> <!--  Fin Contenido -->