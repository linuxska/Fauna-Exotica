	$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		
		$( "#dialog-form" ).dialog({
			autoOpen: false,
			MinHeight: 400,
			width: 440,
			modal: true,
			buttons: {
				"Guardar": function() {
						/*$( this ).dialog.submit();*/
						$( this ).dialog( "close" );
				},
				Cancelar: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});
		
		$( "#dialog-form2" ).dialog({
			autoOpen: true,
			MinHeight: 400,
			width: 440,
			modal: true,
			buttons: {
				/*"Guardar": function() {
						$( this ).dialog.submit(); 
						$( this ).dialog( "close" );
				},*/
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
		
		//Para editar//
		$( "#edit" )
		.click(function() {
			$( "#dialog-form2" ).dialog( "open" );
		});
	});
	
	//Función para mostrar u ocultar el campo contraseña
	jQuery(document).ready(function() {				
		var passwText = jQuery('#password');	
		passwText.after('<span class="showpass"><input type="text" id="password-show" /><input type="checkbox" id="toogle-check"/></span	>');
		var toogCheck = jQuery('#toogle-check');
		var inputText = jQuery('#password-show');
		
		inputText.hide();
		
		inputText.keyup(function() { passwText.attr('value', inputText.attr('value')); });
		passwText.keyup(function() { inputText.attr('value', passwText.attr('value')); });
		
		$(toogCheck).click(function() {			
			if( toogCheck.is(':checked') ) {
				inputText.show(); passwText.hide(); 
			} else {
				inputText.hide(); passwText.show();	
			}
		});
	});