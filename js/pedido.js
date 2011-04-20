/*
 * Script para vista de cuenta
 */
$(document).ready( 

function(){
  // Bordes redondeados
  $('.procesar_pedido').corners("5px");
  $('.titulo_factura').hide();
  $('.factura').hide();
  $('#continuar_pedido').addClass("color");
  
  // Cambio de vista de sección
  $('#continuar_pedido').click(function() {
	  $('.factura').show();
	  $('#continuar_pedido').hide();
	});
}

);