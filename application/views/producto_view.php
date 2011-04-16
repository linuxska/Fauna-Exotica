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
		
		<p><?php echo form_submit('enviar', 'Añadir al carro') ?></p>
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