/*
 * Script para vista de cuenta
 */
$(document).ready( 

function(){
  // Bordes redondeados
  $('#procesar_pedido').corners("5px");
  $('#factura').hide();
  $('#solicitar').hide();
  $('#continuar_pedido').addClass("color");
  
  // Cambio de vista de sección
  $('#continuar_pedido').click(function() {
	  $('#factura').show('slow');
	  $('#solicitar').show('slow');
	  $('#continuar_pedido').hide('slow');
	});
}

);