<!--  Contenido -->
<div class='grid_10'> 

	<!-- El input tab_seleccionada sirve a ui.js mostrar que pestaña abrir -->
	<input type="hidden" id='tab_seleccionada' value="2"/>
	
	<div id="tabs">
	<ul>
		<li><?php echo anchor('inicio', 'inicio');?></li>
		<li><a href='#tabs-2'>Informacion</a></li>
		<li><?php echo anchor('contactar/index', 'Contactar');?></li>
		
		<form class="buscador" accept-charset="utf-8" method="get" action="<?php echo base_url();?>buscador/index">
			<input type='text' name='busqueda' id='busqueda' maxlength='30' size='20'/>
			<input type='submit' value='Buscar'/>
			<br/>
		</form>
	</ul>
	<div id='tabs-2'>
<div id="map_canvas"></div>


<p class="parrafo_Informacion">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In aliquet rutrum risus, 
et eleifend nibh placerat et. Donec fermentum nisl id enim eleifend ut imperdiet nulla 
mattis. Maecenas dolor quam, sodales eget venenatis vitae, varius vitae diam. 
Vestibulum vitae dui tempus erat rhoncus volutpat. Pellentesque mi felis, pulvinar 
vitae facilisis quis, tempus sed nunc. Integer a lacus et enim fermentum semper non 
vitae odio. Duis lacus lectus, feugiat pellentesque tincidunt ac, auctor sit amet lorem. 
Suspendisse vehicula mi ut velit cursus varius fringilla odio convallis. 
Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; 
Quisque non vestibulum sem. Donec vel ullamcorper sapien. Donec eget pretium eros.
 Aliquam consequat porttitor turpis a facilisis. Integer lobortis malesuada augue ut auctor.</p>
 <br>
 <br>
 <br>
 <img class="local" src="<?php echo base_url();?>img/local-fauna.jpg"></img>

<p class="parrafo_Informacion">Maecenas sit amet augue eget purus ultrices vehicula non non mauris. 
Aliquam erat volutpat. Integer suscipit, arcu ac facilisis sagittis, lorem nunc vehicula 
velit, non egestas elit lacus eu purus. Ut eget lacus purus, ut feugiat turpis. 
Quisque ut eros nunc, quis vehicula turpis. Maecenas libero purus, tristique vitae 
varius a, dignissim eu leo. Nam vitae magna vitae arcu dignissim porta vel sit amet 
lacus. Donec at aliquet nunc. Aliquam erat volutpat. Cum sociis natoque penatibus et 
magnis dis parturient montes, nascetur ridiculus mus. Suspendisse viverra felis vitae 
quam sollicitudin sodales dictum mi dapibus. Integer ornare mauris nec nulla elementum
 quis elementum tellus placerat. Sed sapien mi, condimentum nec aliquam a, pellentesque
  ac orci. Quisque eget nulla ligula. Proin a massa dolor, ornare tempus nibh.</p>
  
  	</div>
	<div class=clear></div>
</div>

<div class=clear></div>
</div> <!--  Fin Contenido -->
