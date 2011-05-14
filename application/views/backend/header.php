<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>BACKEND</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/960grid.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/backend.css" />
    <link rel="shortcut icon" href="<?php echo base_url();?>img/logo.png" />
    
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.5.2.min.js"></script>		
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.corners.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/redondeado.js"></script>
	
	<link type="text/css" href="<?php echo base_url();?>css/jquery-ui.css" rel="stylesheet" />	
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/ui.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/backend_insertar.js"></script>
	
</head>
<body>
<div class='container_12'>
<!--  Backend  -->

	<div class='grid_12 backend_header' id='backend_header'>
	<p><?php echo anchor('backend/index', 'Inicio')?>
	Bienvenido '<?php echo $usuario;?>'. Tienes permisos de '
		<?php if ($privilegio='admin')echo 'administrador';
				else echo 'gestor'?>'.
	<?php  echo anchor('inicio/index', 'Volver a FaunaExotica')?></p>
	</div>
	<br></br>
	<br></br>

