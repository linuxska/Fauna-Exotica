
<div id="dialog-form2" title="Editar <?php echo $this->uri->segment(3);?>">
	<?php  
		echo form_open('backend/actualizar/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
			foreach ($columnas as $col){ 
				if ($col!='password' && $col!='password_recuperacion'){
							echo form_label($col);
		  					echo form_input($col,$registro->$col);			
				}
			}
		echo form_close();
	?>
</div>

</body>
</html>