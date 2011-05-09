<!--  TABLA  -->

<div class='grid_6 push_3 backend_tabla_menu' id='backend_tabla_menu'>
</div>

<div class='grid_12 backend_body' id='backend_body'>
<table>
<thead>
    <tr>
	<?php foreach ($columnas as $col){ 
		if ($col!='password' && $col!='password_recuperacion')echo '<th>'.$col.'</th>';	
	}
	echo '<th> Operaciones </th>';?>
    </tr>
</thead>
<tfoot></tfoot>
<tbody>
<?php foreach ($tabla as $indice => $datos):?>
    <tr>
    	<?php foreach ($tabla[$indice] as $fila):?>
			<td>
			<?php if ($fila===NULL || $fila === '') echo "&nbsp";
				  else echo $fila;?>
			</td>
    	<?php endforeach;?>
    	<td>
    		<?php echo "<a href='http://www.google.es'><img src='".base_url()."img/editar.png'></a>";
			echo "<a href='".base_url()."index.php/backend/eliminar/".$this->uri->segment(3)."/".$datos['cod']."'><img src='".base_url()."img/x.png'></a>";?>
    	</td>
    </tr>

<?php endforeach; ?>
</tbody>
</table>
</div> <!-- FIN TABLA  -->

</div> <!--  FIN CONTAINER -->
</body>
</html>