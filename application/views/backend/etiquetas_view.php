<!-- Formulario en diálogo para insertar nueva etiqueta -->
<div id="dialog-form" title="Insertar nueva etiqueta">
	<?php  
		echo form_open('backend/insertar/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
			foreach ($columnas as $col){
				if($col!='cod'){ 
					if ($col!='cod_etiqueta'){
						echo "<div class='form'>".form_label($col.":");
						echo form_input($col, $this->uri->segment(4))."</div>";
					}
			  		else{
			  			echo "<div class='form'>".form_label("Etiqueta:");
			  			$etiq=array();
			  			foreach($all_etiquetas as $fila) $etiq[$fila['cod']]= $fila['nombre'];
			  			echo form_dropdown('cod_etiqueta', $etiq)." <a target='_blank' href='".base_url()."index.php/backend/tabla/etiqueta"."'><img src='".base_url()."img/insertar.png'></a></div>";
			  		}
				}
			}
		echo form_close();
	?>
</div>

<div class="demo">
<div id="users-contain" class="ui-widget">
	<h1><?php echo 'Etiquetas del producto'?></h1>
	<center><button id="create-user">Insertar nueva etiqueta</button></center>
	<br>
	<table id="users" class="ui-widget ui-widget-content">
		<thead>
			<tr class="ui-widget-header ">
				<?php
					echo '<th>Cod_etiqueta</th>';
					echo '<th>Nombre</th>';
				echo '<th> Operaciones </th>';?>
			</tr>
		</thead>
		<tbody>
		 <?php foreach ($etiquetas as $indice => $datos):?>
    		<tr>
    			<?php foreach ($etiquetas[$indice] as $fila):?>
				<td>
					<?php if ($fila===NULL || $fila === '') echo "&nbsp";
						  else echo $fila;?>
				</td>
    				<?php endforeach;?>
    			<td>
    				<?php echo "<a href='".base_url()."index.php/backend/eliminar/".$this->uri->segment(3)."/".$this->uri->segment(4)."/".$datos['cod_etiqueta']."'><img src='".base_url()."img/x.png'></a>";?>
    			</td>
    		</tr>

		<?php endforeach; ?>

		</tbody>
	</table>
</div>
<br>
</div>

</body>
</html>