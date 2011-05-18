<!--  Contenido -->
<div class='grid_10'> 
	<!-- Tabs -->
	<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Catálogo</a></li>
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
		<h1>Catálogo</h1>
<?php 

$i=0;
	if (empty($productos)) echo "No se encontraron resultados para su búsqueda";
		else {foreach($productos as $fila){
		
		$data = array(
	               'id'      => $fila->cod,
	               'price'   => $fila->precio,
				   'cantidad' => 1,
	               'name'    => $fila->nombre
	            );
	  
			echo "<div class=\"producto grid_3 push_1\">"; 
			echo "<img src=".base_url()."img/productos/".$fila->foto.">";
			echo "<div class=\"info\"><p>".$fila->nombre."</p>";
			echo "<p class=\"precios\">".$fila->precio." &#8364;</p>";
			echo "<div class=\"mas_info\">";
			
			echo form_open('carrito/incluir','', $data);
			echo "<input type=\"image\" class=\"derecha\" name=\"comprar\" src=\"".base_url()."img/comprar.png\">";
			echo "<a href=".base_url()."index.php/producto/mostrar/".$fila->cod."><img src=".base_url()."img/info.png></a>";
			echo form_close();		
			
			echo "</div>";
			echo "</div>";
			echo "</div>";	
			if($i==2){
				echo "<div class=clear></div>";
				$i=0;
			}
			else $i++;
		}
	}
?>
	<div class=clear></div>
	
	<?php echo '<div class="num_paginas">'.$this->pagination->create_links().'</div>'?>
	</div>
	
	
	</div> <!-- Fin Tabs -->


</div> <!--  Fin Contenido -->
