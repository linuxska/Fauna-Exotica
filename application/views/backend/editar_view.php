<!--  TABLA  -->

<div class='grid_6 push_3 backend_tabla_menu' id='backend_tabla_menu'>
</div>

<div class='grid_12 backend_body' id='backend_body'>
	<?php  
		echo form_open('backend/actualizar/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
			foreach ($columnas as $col){ 
				if ($col!='password' && $col!='password_recuperacion'){
							echo form_label($col);
		  					echo form_input($col,$registro->$col);			
				}
			}
			echo form_submit('','Guardar');
		echo form_close();
	?>
</div> <!-- FIN TABLA  -->

</div> <!--  FIN CONTAINER -->
</body>
</html>