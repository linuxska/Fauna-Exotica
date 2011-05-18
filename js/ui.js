
$(document).ready( function(){
	// Todos los submit con boton ui	
	$( "button, input:submit" ).button();
	
	// Añadir botones enlaces con la clase:
	$(".boton_ui" ).button();
	
	
	/* INDEX */
	// Menu categorias acordeon
	$( "#acordeon_animales" ).accordion({ autoHeight: false, collapsible: true, active: false });
	$( "#acordeon_articulos" ).accordion({ autoHeight: false, collapsible: true, active: false });
	
	// Pestañas de las vistas
	$( "#tabs" ).tabs({
		select: function(event, ui) {
	        var url = $.data(ui.tab, 'load.tabs');
	        if( url ) {
	            location.href = url;
	            return false;
	        }
	        return true;
	    },
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Contenido no disponible. Lo resolveremos lo antes posible. ");
				}
			}
		});
	
	// Obtener de un input la pestaña que debe abrirse por defecto
	var tab_seleccionada = $("#tab_seleccionada").val();
	$( "#tabs" ).tabs( "option", "selected", tab_seleccionada );

	// Callback post metodo JSON, recogemos todas las etiquetas y guardamos en tags
	var tags = new Array();
	$.post("http://localhost/Fauna-Exotica/buscador/callback", 
		    function(data) {
				$.each(data, function(index, item) {
					  tags[index] = item.name;	
					});		
				$( "#busqueda" ).autocomplete({
			        source: tags
				});				
		    }, "json"
		 );
	
	
	/* CARRO */
	$( ".actu" ).button({
        icons: {
            primary: "ui-icon-refresh"
        },
        text: false
    });
	
	$(".actu").click(function() {
		var tr = $(this).closest('tr');
		var form = tr.find('form');
		form.submit();
	});
	
	
	/* CUENTA */
	$("#micuenta").button({
        icons: {
        primary: "ui-icon-person"
    }});
	
	
	$( "#logout" ).button({
        icons: {
            primary: "ui-icon-power"
        }
    });
	
	// Acordeon pane cuenta
	//var acordeon_abierto = $("#acordeon_abierto").val();
	$( "#acordeon_cuenta" ).accordion({ autoHeight: false, icons: { 'header': 'ui-icon-circle-arrow-e', 'headerSelected': 'ui-icon-circle-arrow-s' } });

	// Obtener de un input el acordeon que debe abrirse por defecto
	var acordeon_abierto = parseInt($("#acordeon_abierto").val()) ;
	$( "#acordeon_cuenta" ).accordion( "option", "active", acordeon_abierto);
	
	// Dialogo modal: form validations
	$( "#dialog:ui-dialog" ).dialog( "destroy" );
	$( ".error" ).dialog({
		modal: true,
		buttons: {
			Ok: function() {
				$( this ).dialog( "close" );
			}
		}
	});
	
	$( ".guardado" ).dialog({
		modal: true,
		buttons: {
			Ok: function() {
				$( this ).dialog( "close" );
			}
		}
	});
	
	
	/* PROCESAR PEDIDO */
	
	// Dialogo modal: el usuario debe estar logueado
	$( "#dialog:ui-dialog" ).dialog( "destroy" );
	$( "#D_procesar_pedido" ).dialog({
		autoOpen: false, 
		modal: true,
		width: 360,
		buttons: {
			Ok: function() {
				$( this ).dialog( "close" );
			}
		}
	});
	
	// Boton de procesar pedido
	$("#B_procesar_pedido").click(function (){
		if ($("#D_procesar_pedido").length>0){
			$("#D_procesar_pedido").dialog('open');
			return false;
		}
	});
	
});

