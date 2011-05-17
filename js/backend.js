	$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		
		$( "#dialog-form" ).dialog({
			autoOpen: false,
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