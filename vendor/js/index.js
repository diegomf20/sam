//registro rapido de nuevo cliente
$('#registrar').click(function(){
  $.ajax({
    url: 'app/control.php',
    type:'POST',
    data:{operacion:"registrar",nombres:$('#nombres').val(),apellidos:$('#apellidos').val(),celular:$('#celular').val(),dni:$('#dni').val(),email:$('#email').val()},
    success: function(response){
      if (response=='correcto') {
        alertify.success('Registrado Correctamente');
        setTimeout(function () {
          location.href='tablero.php';
        }, 3000);
      }else {
        alerta(response);
      }
    }
  });
});
//animaciones
$(document).on("scroll", function(){
	var desplazamientoActual = $(document).scrollTop();
	if(desplazamientoActual > 45){
		$('#nav').addClass('navbar-grey');
	}
	if(desplazamientoActual < 45){
		$('#nav').removeClass('navbar-grey');
	}
});

//notificaciones o  alertas
function alerta($mensaje){
  $('html').append('<div class="coding-alert success"><i class="fa fa-check"></i> '+$mensaje+'</div>');
/*setTimeout(function () {
  $('.coding-alert').remove();
}, 2000);*/

}
