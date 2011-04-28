
$(document).ready( function(){
	$( "#acordeon_animales" ).accordion({ autoHeight: false, collapsible: true, active: false });
	$( "#acordeon_articulos" ).accordion({ autoHeight: false, collapsible: true, active: false });
	
	$( "#tabs" ).tabs({
			ajaxOptions: { 
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Contenido no disponible. Lo resolveremos lo antes posible. ");
				}
			}
		});
});

