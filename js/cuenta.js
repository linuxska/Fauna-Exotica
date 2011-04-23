/*
 * Script para vista de cuenta
 */
$(document).ready( 

function(){
  // Bordes redondeados
  $('.cuenta').corners("5px");
  
  
  $('#cuenta_datos').hide();
  $('#cuenta_perfil').hide();
  $('#inicio_link').addClass("color");
  
  // Cambio de vista de sección
    
  $('#inicio_link').click(function() {
	  $('#perfil_link').removeClass("color");
	  $('#datos_link').removeClass("color");
	  $(this).addClass("color");
		 
	  $('#cuenta_datos').hide();
	  $('#cuenta_perfil').hide();
	  $('#cuenta_inicio').show('slow');
	});
	
  $('#perfil_link').click(function() {
	  $('#datos_link').removeClass("color");
	  $('#inicio_link').removeClass("color");
	  $(this).addClass("color");
		 
	  $('#cuenta_datos').hide();
	  $('#cuenta_inicio').hide();
	  $('#cuenta_perfil').show('slow');
	});
  
  $('#datos_link').click(function() {
	  $('#perfil_link').removeClass("color");
	  $('#inicio_link').removeClass("color");
	  $(this).addClass("color");
	  
	  $('#cuenta_perfil').hide();
	  $('#cuenta_inicio').hide();
	  $('#cuenta_datos').show('slow');
	});
}

);