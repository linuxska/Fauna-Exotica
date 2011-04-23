<!--  TABLA  -->

<div class='grid_6 push_3 backend_tabla_menu' id='backend_tabla_menu'>
<a href='#'>Eliminar registros Modificar bla bla bla</a>
</div>

<div class='grid_12 backend_body' id='backend_body'>
<table>
<thead>
    <tr>
	<?php foreach ($columnas as $col){ 
		echo '<th>'.$col.'</th>';	
	}?>
    </tr>
</thead>
<tfoot></tfoot>
<tbody>
<?php foreach ($tabla as $indice => $datos): ?>
    <tr>
    	<?php foreach ($tabla[$indice] as $fila):?>
			<td>
			<?php if ($fila===NULL || $fila === '') echo '&nbsp';
					else echo $fila?>
			</td>
    	<?php endforeach;?>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
</div> <!-- FIN TABLA  -->

</div> <!--  FIN CONTAINER -->
</body>
</html>