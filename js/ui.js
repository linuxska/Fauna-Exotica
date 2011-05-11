
$(document).ready( function(){
	$( "#acordeon_animales" ).accordion({ autoHeight: false, collapsible: true, active: false });
	$( "#acordeon_articulos" ).accordion({ autoHeight: false, collapsible: true, active: false });
	$( "#acordeon_cuenta" ).accordion({ autoHeight: false, icons: { 'header': 'ui-icon-circle-arrow-e', 'headerSelected': 'ui-icon-circle-arrow-s' } });
	$( "button, input:submit" ).button();
	$("#micuenta").button({
        icons: {
        primary: "ui-icon-person"
    }
});
	
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

