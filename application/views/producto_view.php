<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'> 

<div class='zoom_producto grid_10 push_1 producto'>
<div class="grid_4"><?php echo "<img src=".base_url()."img/productos/".$producto->foto.">"; ?> </div>
<div class="grid _2 informacion">
<p><?php echo $producto->nombre; ?></p>
<p id="precio"><?php echo $producto->precio; ?> &#8364;</p> 
</div>
<div class="carro">

<?php 
	if($producto->cantidad_disponible<1){
		?><p>Producto no disponible</p>
	<?php }
	else{?>
		<?php echo form_open('carrito/index') ?>
		<p>Cantidad: </p>
		<?php echo form_input(array('name' => 'cantidad', 'id' => 'cantidad', 'size' => '3' ,'value' => '1')); ?>
		<br><br><p>Cantidad en stock: <?php echo $producto->cantidad_disponible ?></p>
	<?php 	

	$data = array(
               'id'      => $producto->cod,
               'qty'     => '1',
               'price'   => $producto->precio,
               'name'    => $producto->nombre
            );
            
           $str = $this->uri->assoc_to_uri($data);
	?>
		
		
		<p><?php echo anchor('/carrito/incluir/'.$str, '<img src="'.base_url().'img/anadir.png">')?></p>
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