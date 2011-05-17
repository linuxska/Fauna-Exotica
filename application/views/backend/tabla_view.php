<div class="demo">

<?php if($this->uri->segment(3)!='producto' && $this->uri->segment(3)!='usuario'){?>
<div id="dialog-form" title="Insertar nuevo <?php echo $this->uri->segment(3);?>">
	<?php  
		echo form_open('backend/insertar/'.$this->uri->segment(3));
			foreach ($columnas as $col){ 
				if ($col!='password_recuperacion' && $col!='cod' && $col!='id' ){
					echo "<div class='form'>".form_label($col.":");
					echo form_input($col)."</div>";
				} 
			}
		echo form_close();
	?>
</div>

<?php }
 else if($this->uri->segment(3)=='usuario'){?>
<div id="dialog-form" title="Insertar nuevo <?php echo $this->uri->segment(3);?>">
	<?php  
		echo form_open('backend/insertar/'.$this->uri->segment(3));
			foreach ($columnas as $col){ 
				if ($col!='password_recuperacion' && $col!='cod' && $col!='id' ){
					echo "<div class='form'>".form_label($col.":");
					if ($col=='password') {
						echo form_password(array('name' => 'password', 'id' => 'password'))."</div>";
					}
					else if($col=='tipo'){
						$tipos= array('cliente' => 'cliente', 'admin' => 'admin');
			  			echo form_dropdown('tipo', $tipos,'admin')."</div>";
					}
					else echo form_input($col)."</div>";
				} 
			}
		echo form_close();
	?>
</div>
<?php }
else{?>
<div id="dialog-form" title="Insertar nuevo <?php echo $this->uri->segment(3);?>">
	<?php  
		echo form_open('backend/insertar/'.$this->uri->segment(3));
			foreach ($columnas as $col){
				if($col!='cod'){ 
					if ($col!='cod_subcategoria'){
						echo "<div class='form'>".form_label($col.":");
						if($col=='fecha_registro') echo form_input($col,unix_to_human(time(),true,'es'))."</div>";
						else echo form_input($col)."</div>";
					}
			  		else{
			  			echo "<div class='form'>".form_label("Subcategoría:");
			  			$subcat=array();
			  			foreach($subcategorias as $fila) $subcat[$fila['cod']]= $fila['nombre'];
			  			echo form_dropdown('cod_subcategoria', $subcat)."<a target='_blank' href='".base_url()."index.php/backend/tabla/subcategoria"."'><img src='".base_url()."img/insertar.png'></a></div>";
			  		}
				}
			}
		echo form_close();
	?>
</div>
<?php }?>

<div id="users-contain" class="ui-widget">


	<h1><?php echo $this->uri->segment(3);?>s</h1>
		<?php if ($this->uri->segment(3)!='pedido'){?>
<center><button id="create-user">Insertar nuevo <?php echo $this->uri->segment(3);?></button></center>
<?php }?>
<br>
	<table id="users" class="ui-widget ui-widget-content">
		<thead>
			<tr class="ui-widget-header ">
				<?php foreach ($columnas as $col){ 
				if ($col!='password' && $col!='password_recuperacion')echo '<th>'.$col.'</th>';	
				}
				echo '<th> Operaciones </th>';?>
			</tr>
		</thead>
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
    		<?php
			if ($this->uri->segment(3)=='pedido')echo "<a href='".base_url()."index.php/backend/ver_pedido/".$datos['cod']."'><img src='".base_url()."img/ver.gif'></a>";
			
			if ($this->uri->segment(3)=='producto')echo "<a href='".base_url()."index.php/backend/ver_producto/".$datos['cod']."'><img src='".base_url()."img/ver.gif'></a>";
			
			if ($this->uri->segment(3)=='pedido_producto')echo "<a href='".base_url()."index.php/backend/ver_producto/".$this->uri->segment(3)."/".$datos['cod_producto']."/".$datos['cod_pedido']."'><img src='".base_url()."img/ver.gif'></a>";
    		
    		if ($this->uri->segment(3)=='usuario') echo "<a id='edit' href='".base_url()."index.php/backend/editar/".$this->uri->segment(3)."/".$datos['id']."' ><img src='".base_url()."img/editar.png'></a>";
    		else if($this->uri->segment(3)!='pedido_producto') echo "<a id='edit' href='".base_url()."index.php/backend/editar/".$this->uri->segment(3)."/".$datos['cod']."'><img src='".base_url()."img/editar.png'></a>"; 
	
    		if ($this->uri->segment(3)=='usuario') echo "<a href='".base_url()."index.php/backend/eliminar/".$this->uri->segment(3)."/".$datos['id']."'><img src='".base_url()."img/x.png'></a>";
    		else if($this->uri->segment(3)!='pedido_producto')echo "<a href='".base_url()."index.php/backend/eliminar/".$this->uri->segment(3)."/".$datos['cod']."'><img src='".base_url()."img/x.png'></a>";
    		else echo "<a href='".base_url()."index.php/backend/eliminar/".$this->uri->segment(3)."/".$datos['cod_producto']."/".$datos['cod_pedido']."'><img src='".base_url()."img/x.png'></a>";?>
    	</td>
    </tr>

<?php endforeach; ?>
	</tbody>
	</table>
</div>

</div>

</body>
</html>