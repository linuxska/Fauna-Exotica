<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title><?php echo $titulo?></title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/960grid.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/estilos.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/estilos_productos.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/estilos_carrito.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/estilos_formulario.css" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.5.2.min.js"></script>		
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.corners.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/redondeado.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/cuenta.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/pedido.js"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/googlemap.js"></script>

<link href='http://fonts.googleapis.com/css?family=Bevan' rel='stylesheet' type='text/css'>

<link rel="shortcut icon" href="<?php echo base_url();?>img/logo.png">

	<!-- JQuery UI -->
	<link type="text/css" href="<?php echo base_url();?>css/jquery-ui.css" rel="stylesheet" />	
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/ui.js"></script>
	
	<!-- Nivo Slider -->
	
	<link rel="stylesheet" href="<?php echo base_url();?>css/slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/slider-estilo.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();       
    });
    </script>
</head> 

<body onload="initialize()">

<!--  CONTAINER -->
<div class="container container_12">

<!--  Cabecera -->

<div class="grid_12">

<div id='header'>
	<!-- Logo -->	
	<div class="grid_3" id='logo'> 
		<div>
		<img src="<?php echo base_url();?>img/logo.png">
		</div>		
	</div> 
	<!--  Fin Logo -->

	<!--  TITULO -->
	<div class="grid_6"> 
		<div id='titulo' class='titulo'>
			<a href='<?php echo base_url();?>inicio'><img src="<?php echo base_url();?>img/titulo.png"></a>
		</div>	
	</div>
	<!--  Fin Titulo -->
	
	<!-- Carro & Mi cuenta-->	
	<div class="grid_3"> 
	
		 <div id="carrito_header">
			<div class='grid_3'><a href='<?php echo base_url();?>carrito/index/'>
			<img src="<?php echo base_url();?>img/carrito.png"></a>
			</div>
			Total: <?php echo $this->cart->total().'&#8364<br>';?>
			Tienes <?php echo $this->cart->total_items();?> productos</br>
			<div class='clear'>&nbsp;</div>
		</div>

	</div> <!--  Fin Carro -->

	<div class="grid_3"> 
		<div id="micuenta">
			<?php echo anchor('cuenta/index', 'Mi Cuenta');?>
		</div>
	</div>
			
	<div class='clear'>&nbsp;</div> <!--  Colocacion Header -->
</div>
</div> <!--  Fin Cabecera -->
