<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'> 


<?php 
	foreach($productos as $fila){
		
	$data = array(
               'id'      => $fila->cod,
               'price'   => $fila->precio,
			   'cantidad' => 1,
               'name'    => $fila->nombre
            );
            
          // $str = $this->uri->assoc_to_uri($data);
           
		echo "<div class=\"producto grid_3 push_1\">"; 
		echo "<img src=".base_url()."img/productos/".$fila->foto.">";
		echo "<div class=\"info\"><p>".$fila->nombre."</p>";
		echo "<p class=\"precios\">".$fila->precio." &#8364;</p>";
		echo "<div class=\"mas_info\">";
		
		echo form_open('carrito/incluir','', $data);
		echo form_submit('comprar','comprar');
		echo form_close();
		//<img src="'.base_url().'img/comprar.png">
		
		
		echo "<a href=".base_url()."index.php/producto/mostrar/".$fila->cod."><img src=".base_url()."img/info.png></a>";
		echo "</div>";
		echo "</div>";
		echo "</div>";	
	}
?>

<div class=clear></div>
<?php echo '<p>'.$this->pagination->create_links().'</p>';?>
</div>
</div> <!--  Fin Contenido -->