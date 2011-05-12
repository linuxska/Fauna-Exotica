
$(document).ready( function(){
	$( "#acordeon_animales" ).accordion({ autoHeight: false, collapsible: true, active: false });
	$( "#acordeon_articulos" ).accordion({ autoHeight: false, collapsible: true, active: false });
	$( "#acordeon_cuenta" ).accordion({ autoHeight: false, icons: { 'header': 'ui-icon-circle-arrow-e', 'headerSelected': 'ui-icon-circle-arrow-s' } });
	$( "button, input:submit" ).button();
	
	// Boton acutalizar del carro
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
	
	//Condicion login procesar pedido:
	
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
	
	$("#B_procesar_pedido").click(function (){
		if ($("#D_procesar_pedido").length>0){
			$("#D_procesar_pedido").dialog('open');
			return false;
		}
	});
	
	//Boton de mi cuenta
	$("#micuenta").button({
        icons: {
        primary: "ui-icon-person"
    }});
	
	
	// Añadir botones enlaces con la clase:
	$(".boton_ui" ).button();

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

	
	// Obtener de un input el numero de pestaña que debe abrirse por defecto
	var tab_seleccionada = $("#tab_seleccionada").val();
	$( "#tabs" ).tabs( "option", "selected", tab_seleccionada );

	
	// Callback post metodo JSON, recogemos todas las etiquetas y guardamos en tags
	var tags = new Array();
	$.post("http://localhost/Fauna-Exotica/buscador/callback", 
		    function(data)
		    {
				$.each(data, function(index, item) {
					  tags[index] = item.name;	
					});
				
				$( "#busqueda" ).autocomplete({
			        source: tags
				});
				
		    }, "json"
		 );
	
	// MENU CUENTA Form validation dialogoMODAL 
	$( "#dialog:ui-dialog" ).dialog( "destroy" );
	$( ".error" ).dialog({
		modal: true,
		buttons: {
			Ok: function() {
				$( this ).dialog( "close" );
			}
		}
	});
	

});

