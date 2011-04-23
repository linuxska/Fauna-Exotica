<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>BACKEND</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend.css" />
</head>
<body>

<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'>

<!--  Cuenta -->
<div class='grid_10 push_1 cuenta'>

	<div class='push_12 backend_header' id='backend_header'>
	Bienvenido '<?php echo $usuario;?>' Tienes permisos de '<?php echo $privilegio;?>'.
	</div>
	
	<div class='push_12' id='backend_body'>
	<table>
	<thead>
	    <tr>
		  <th></th>
	      <th></th>
	    </tr>
	</thead>
	<tfoot></tfoot>
	<tbody>
	<?php foreach ($tablas as $tabla): ?>
	    <tr>
			<td><?php echo $tabla['nombre']?></td>
			<td>Visualiza, crea y modifica <?php echo $tabla['descripcion']?></td>
	    </tr>	
	<?php endforeach; ?>
	</tbody>
	</table>
	</div>

	<div class=clear></div>
</div><!--  Fin cuenta -->

<div class=clear></div>
</div> 

</div> <!--  Fin Contenido -->

</body>
</html>