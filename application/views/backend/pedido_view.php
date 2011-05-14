<div class="demo">
<div id="users-contain" class="ui-widget">
	<h1><?php echo 'Productos del pedido'?></h1>
	<table id="users" class="ui-widget ui-widget-content">
		<thead>
			<tr class="ui-widget-header ">
				<?php
					echo '<th>Nombre</th>';
					foreach ($columnas as $col){ 
						if ($col!='cod_pedido') echo '<th>'.$col.'</th>';				
					}
				echo '<th> Operaciones </th>';?>
			</tr>
		</thead>
		<tbody>
		 <?php foreach ($pedido as $indice => $datos):?>
    		<tr>
    			<?php foreach ($pedido[$indice] as $fila):?>
				<td>
					<?php if ($fila===NULL || $fila === '') echo "&nbsp";
				  			else echo $fila;?>
				</td>
    				<?php endforeach;?>
    			<td>
    				<?php
						echo "<a href='".base_url()."index.php/backend/ver_producto/".$datos['cod_producto']."'><img src='".base_url()."img/ver.gif'></a>";?>
    			</td>
    		</tr>

		<?php endforeach; ?>
		
		

<!-- 	<?php foreach($pedido as $fila){?>
			<td>
			<?php if ($fila===NULL || $fila === '') echo "&nbsp";
				  else echo $fila;?>
			</td>

    	<td>
    		<?php
					
			echo "<a href='".base_url()."index.php/backend/ver_producto/".$datos['cod_producto']."'><img src='".base_url()."img/ver.gif'></a>";?>
    	</td>
    </tr>
	<?php } ?> 
-->

		</tbody>
	</table>
</div>
<br>
</div>

</body>
</html>