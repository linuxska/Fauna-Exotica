<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'>	<h1>Novedades</h1> <?php echo $this->session->userdata('nombre'); ?>

<!--------------------- Slider ------------------------>

<div id="container">
		<div id="example">
			<div id="slides">
				<div class="slides_container">		
					<?php foreach($novedad as $fila){?>
					<div class="slide">
						<a href="<?php echo base_url();?>producto/mostrar/<?php echo $fila->cod;?>" title="<?php echo $fila->nombre?>">
						<div class='grid_12 '>
						
						<div class='grid_7'>
						<img src="<?php echo base_url()."img/productos/".$fila->foto?>" width="270" height="240" alt="Slide 2">
						</div>
						
						<div class='grid_5 info_slide'>
						<p><?php echo $fila->descripcion?></p>
						<p>Precio: <?php echo $fila->precio?> €</p>						
						</div>
						
						</div>
						
						<div class="caption">
							<p><?php echo $fila->nombre;?></p>
						</div>
						</a>
					</div>
					<?php }?>		
				</div>
				<a href="#" class="prev"><img src="img/arrow-prev.png" alt="Arrow Prev"></a>
				<a href="#" class="next"><img src="img/arrow-next.png" alt="Arrow Next"></a>
			</div>
			<img src="img/example-frame.png"  alt="Example Frame" id="frame">
		</div>
	</div>

<!--------------------- Fin Slider ------------------------>


<div class=clear></div>
</div> 
</div> <!--  Fin Contenido -->