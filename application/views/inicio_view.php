<!--  Contenido -->
<div class='grid_10'> 

	<!-- El input tab_seleccionada sirve a ui.js mostrar que pestaña abrir -->
	<input type="hidden" id='tab_seleccionada' value="0"/>
	
	<div id="tabs">
	<ul>
		<li><a href='#tabs-1'>Inicio</a></li>
		<li><?php echo anchor('informacion', 'Informacion');?></li>
		<li><?php echo anchor('contactar/index', 'Contactar');?></li>
		<li><?php echo anchor('cuenta/index', 'Mi Cuenta');?></li>
	</ul>
	<div id='tabs-1'>
	<h2>Novedades</h2>
		<div id='slider-wrapper'>
            <div id="slider" class="nivoSlider">

            <?php foreach($novedad as $fila){?>
				<a href="<?php echo base_url();?>producto/mostrar/<?php echo $fila->cod;?>" title="<?php echo $fila->nombre?>">
				<img src="<?php echo base_url()."img/productos/".$fila->foto?>" alt="" title='<?php echo $fila->nombre." ".$fila->precio." €";?>' width="500" height="300"/>
				</a>
			<?php }?>		
            
            </div>
		</div>

	</div>

	</div>
	<div class=clear></div>
	
</div> <!--  Fin Contenido -->

