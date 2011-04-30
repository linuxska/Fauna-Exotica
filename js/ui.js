
$(document).ready( function(){
	$( "#acordeon_animales" ).accordion({ autoHeight: false, collapsible: true, active: false });
	$( "#acordeon_articulos" ).accordion({ autoHeight: false, collapsible: true, active: false });
	$( "#acordeon_cuenta" ).accordion({ autoHeight: false, icons: { 'header': 'ui-icon-circle-arrow-e', 'headerSelected': 'ui-icon-circle-arrow-s' } });
	$( "button, input:submit" ).button();

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
	
	var availableTags = [
	         			"ActionScript",
	         			"AppleScript",
	         			"Asp",
	         			"BASIC",
	         			"C",
	         			"C++",
	         			"Clojure",
	         			"COBOL",
	         			"ColdFusion",
	         			"Erlang",
	         			"Fortran",
	         			"Groovy",
	         			"Haskell",
	         			"Java",
	         			"JavaScript",
	         			"Lisp",
	         			"Perl",
	         			"PHP",
	         			"Python",
	         			"Ruby",
	         			"Scala",
	         			"Scheme"
	         		];
	$( "#busqueda" ).autocomplete({
	         			source: availableTags
	});
});

