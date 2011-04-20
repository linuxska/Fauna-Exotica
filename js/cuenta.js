/*
 * Script para vista de cuenta
 */
$(document).ready( 

function(){
  // Bordes redondeados
  $('.cuenta').corners("5px");
  
  $( '#perfil_link').addClass("color");
  $('#datos').hide();
  
  // Cambio de vista de sección
  $('#perfil_link').click(function() {
	  $actual = '#perfil';
	  $actual_link = '#perfil_link';
	  $('#datos_link').removeClass("color");
	  $(this).addClass("color");
		 
	  $('#datos').hide();
	  $('#perfil').show('slow');
	});
  
  $('#datos_link').click(function() {
	  $actual = '#datos';
	  $actual_link = '#datos_link';
	  
	  $('#perfil_link').removeClass("color");
	  $(this).addClass("color");
	  
	  $('#perfil').hide();
	  $('#datos').show('slow');
	});
}

);