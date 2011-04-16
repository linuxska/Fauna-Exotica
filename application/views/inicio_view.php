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
						<a href="<?php echo base_url();?>index.php/producto/mostrar/<?php echo $fila->cod;?>" title="<?php echo $fila->nombre?>" target="_blank"><img src="<?php echo base_url()."img/productos/".$fila->foto?>" width="570" height="270" alt="Slide 2"></a>
						<div class="caption">
							<p><?php echo $fila->nombre;?></p>
						</div>
					</div>
					<?php }?>		
				</div>
				<a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
				<a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
			</div>
			<img src="img/example-frame.png" width="739" height="341" alt="Example Frame" id="frame">
		</div>
	</div>

<!--------------------- Fin Slider ------------------------>


<div class=clear></div>
</div> 
</div> <!--  Fin Contenido -->