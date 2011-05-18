<!--  Contenido -->
<div class='grid_10'> 
	
	<div id="tabs">
	<ul>
		<li><a href='#tabs-1'>Lista productos</a></li>
		<li><?php echo anchor('inicio', 'Inicio');?></li>
		<li><?php echo anchor('Informacion', 'Informacion');?></li>
		<li><?php echo anchor('contactar/index', 'Contactar');?></li>
		
		<form class="buscador" accept-charset="utf-8" method="get" action="<?php echo base_url();?>buscador/index">
			<input type='text' name='busqueda' id='busqueda' maxlength='30' size='20'/>
			<input type='submit' value='Buscar'/>
			<br/>
		</form>
	</ul>
	<div id='tabs-1'>
		<ul>
		<?php 
			$total = 0;
			foreach ($productos as $fila) {
				$total = $total + $fila['precio'];
				echo '<a href="'.base_url().'producto/mostrar/'.$fila['cod_producto'].'">';
				echo '<li>('.$fila['cantidad'].') '. $fila['nombre'] .' a '. $fila['precio'].'€</li></a>';				
			}
		?>
		</ul>
		<p class='centrado'>Total: <?php echo $total;?> €</p>
	<div class=clear></div>
	</div>
	</div>
	<div class=clear></div>
	
</div> <!--  Fin Contenido -->