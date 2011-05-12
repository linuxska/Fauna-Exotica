<style>
		label {width:175px; float:left;}
		label input { display:inline; margin-bottom:5px; margin-right:3px;}
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		fieldset { padding:0; border:0; margin-top:25px;}*/
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent; padding: 0.3em; }*/
</style>

<script>
	$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		
		var name = $( "#name" ),
			email = $( "#email" ),
			password = $( "#password" ),
			allFields = $( [] ).add( name ).add( email ).add( password ),
			tips = $( ".validateTips" );

		function updateTips( t ) {
			tips
				.text( t )
				.addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}

		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
				updateTips( "Length of " + n + " must be between " +
					min + " and " + max + "." );
				return false;
			} else {
				return true;
			}
		}

		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "ui-state-error" );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}
		
		$( "#dialog-form" ).dialog({
			autoOpen: false,
			MinHeight: 400,
			width: 440,
			modal: true,
			buttons: {
				"Guardar": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );

					bValid = bValid && checkLength( name, "username", 3, 16 );
					bValid = bValid && checkLength( email, "email", 6, 80 );
					bValid = bValid && checkLength( password, "password", 5, 16 );

					bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
					// From jquery.validate.js (by joern), contributed by Scott Gonzalez: http://projects.scottsplayground.com/email_address_validation/
					bValid = bValid && checkRegexp( email, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
					bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

					if ( bValid ) {
						$( "#users tbody" ).append( "<tr>" +
							"<td>" + name.val() + "</td>" + 
							"<td>" + email.val() + "</td>" + 
							"<td>" + password.val() + "</td>" +
						"</tr>" ); 
						$( this ).dialog( "close" );
					}
				},
				Cancelar: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});

		$( "#create-user" )
			.button()
			.click(function() {
				$( "#dialog-form" ).dialog( "open" );
			});
	});
	</script>

<div class="demo">

<div id="dialog-form" title="Insertar nuevo <?php echo $this->uri->segment(3);?>">
	<?php  
		echo form_open('backend/insertar/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
			foreach ($columnas as $col){ 
				if ($col!='password_recuperacion'){
				echo "<div class='form'>".form_label($col.":");
		  		echo form_input($col)."</div>"; }
			}
		echo form_close();
	?>
</div>


<div id="users-contain" class="ui-widget">
	<h1><?php echo $this->uri->segment(3);?>s</h1>
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
			if ($this->uri->segment(3)=='pedido')echo "<a href='".base_url()."index.php/backend/ver_pedido/".$this->uri->segment(3)."/".$datos['cod']."'><img src='".base_url()."img/ver.gif'></a>";
			
			if ($this->uri->segment(3)=='producto')echo "<a href='".base_url()."index.php/backend/ver_producto/".$this->uri->segment(3)."/".$datos['cod']."'><img src='".base_url()."img/ver.gif'></a>";
			
			if ($this->uri->segment(3)=='producto')echo "<a href='".base_url()."index.php/backend/ver_producto/".$this->uri->segment(3)."/".$datos['cod_producto']."'><img src='".base_url()."img/ver.gif'></a>";
    		
    		if ($this->uri->segment(3)=='usuario') echo "<a href='".base_url()."index.php/backend/editar/".$this->uri->segment(3)."/".$datos['id']."'><img src='".base_url()."img/editar.png'></a>";
    		else if($this->uri->segment(3)!='pedido_producto') echo "<a href='".base_url()."index.php/backend/editar/".$this->uri->segment(3)."/".$datos['cod']."'><img src='".base_url()."img/editar.png'></a>";
    		else echo "<a href='".base_url()."index.php/backend/editar/".$this->uri->segment(3)."/".$datos['cod_producto']."/".$datos['cod_pedido']."'><img src='".base_url()."img/editar.png'></a>";
    		
    		if ($this->uri->segment(3)=='usuario') echo "<a href='".base_url()."index.php/backend/eliminar/".$this->uri->segment(3)."/".$datos['id']."'><img src='".base_url()."img/x.png'></a>";
    		else if($this->uri->segment(3)!='pedido_producto')echo "<a href='".base_url()."index.php/backend/eliminar/".$this->uri->segment(3)."/".$datos['cod']."'><img src='".base_url()."img/x.png'></a>";
    		else echo "<a href='".base_url()."index.php/backend/eliminar/".$this->uri->segment(3)."/".$datos['cod_producto']."/".$datos['cod_pedido']."'><img src='".base_url()."img/x.png'></a>";?>
    	</td>
    </tr>

<?php endforeach; ?>
	</table>
</div>
<br>
<center><button id="create-user">Insertar nuevo <?php echo $this->uri->segment(3);?></button></center>

</div>

</body>
</html>