//Script que crea los bordes redondeados 
$(document).ready( 

function(){
	// Bordes redondeados
  $('.cuenta').corners("5px");
  $('#datos').hide();
  $('#perfil_link').addClass("color");
  
  // Cambio de vista de sección
  $('#perfil_link').click(function() {
	  $('#datos_link').removeClass("color");
	  $(this).addClass("color");
		 
	  $('#datos').hide();
	  $('#perfil').show();
	});
  
  $('#datos_link').click(function() {
	  $('#perfil_link').removeClass("color");
	  $(this).addClass("color");
	  
	  $('#perfil').hide();
	  $('#datos').show();
	});
}

);