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
  $('#barra').hide();
	// Cambio de vista de sección
	$('#continuar_pedido').click(function() {

		if ($('input:radio[name=formapago]:checked').val() == "contra_reembolso") {
			$('#continuar_pedido').hide('slow');
			$('#barra').show();
			$('#envio').show('slow');
			  $('#solicitar').show();
		}  else if ($('input:radio[name=formapago]:checked').val() == "paypal") {
			$('#continuar_pedido').hide('slow');
			$('#barra').show();
			$('#paypal').show('slow');
			$('#submit_paypal').show();
		} else {
			alert('Seleccione una opción y acepte las condiciones');
		}
	});
	
	$('#submit_paypal').click( function (){
		if ($('input:checkbox[name=condiciones]:checked').length > 0) {
			return true;
		} else {
			alert('Acepte las condiciones de uso');
			return false;
		}
		
	});
}

);