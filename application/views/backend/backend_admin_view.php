<!--  ADMIN -->
	<div class='grid_8 push_2 backend_body' id='backend_body'>
	<table>
	<thead>
	    <tr>
		  <th></th>
	      <th></th>
	      <th></th>
	    </tr>
	</thead>
	<tfoot></tfoot>
	<tbody>
	<?php foreach ($tablas as $tabla => $datos): ?>
	    <tr>
			<td><?php echo $datos['nombre']?></td>
			<td>Visualiza, crea y modifica <?php echo $datos['descripcion']?></td>
			<td><?php echo anchor('backend/tabla/'.$tabla, 'Acceder')?></td>
	    </tr>	
	<?php endforeach; ?>
	</tbody>
	</table>
	</div>

</div> <!--  FIN CONTAINER -->
</body>
</html>