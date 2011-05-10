/*
 * Script para vista de cuenta
 */
$(document).ready( 

function(){
  // Bordes redondeados
  $('#procesar_pedido').corners("5px");
  $('#envio').hide();
  $('#paypal').hide();
  $('#solicitar').hide();
  $('#submit_paypal').hide();
  $('#continuar_pedido').addClass("color");
  
	// Cambio de vista de sección
	$('#continuar_pedido').click(function() {
		$('#continuar_pedido').hide('slow');
		if ($('input:radio[name=formapago]:checked').val() == "contra_reembolso") {
			$('#envio').show('slow');
			  $('#solicitar').show();
		}  else {
			$('#paypal').show('slow');
			$('#submit_paypal').show();
		}  
	});
}

);