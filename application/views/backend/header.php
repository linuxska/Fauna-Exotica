<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>BACKEND</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/960grid.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend.css" />
</head>
<body>
<div class='container_12'>
<!--  Backend  -->

	<div class='grid_12 backend_header' id='backend_header'>
	<p><?php echo anchor('backend/index', 'Inicio')?>
	Bienvenido '<?php echo $usuario;?>' Tienes permisos de '<?php echo $privilegio;?>'.
	<?php  echo anchor('inicio/index', 'Volver a FaunaExotica')?></p>
	</div>
