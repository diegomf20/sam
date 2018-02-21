//registro rapido de nuevo cliente
$('#registrar').click(function(){
  var nombres=$('#nombres').val();
  var apellidos=$('#apellidos').val();
  var celular=$('#celular').val();
  var dni=$('#dni').val();
  var email=$('#email').val();
  if($('#terminos').is(':checked')) {
    if (nombres!=""&&apellidos!=""&&celular!=""&&dni!=""&&email!="") {
      $.ajax({
        url: 'app/control/c-inversionista.php',
        type:'POST',
        data:{operacion:"registrarInversionista",nombres:nombres,apellidos:apellidos,celular:celular,dni:dni,email:email},
        beforeSend: function () {
          $("#registrar").html('<i class="fa fa-spinner"></i> REGISTRANDO ...');
        },
        success: function(response){
          if (response=='correcto') {
            alertify.success('Registrado Correctamente');
            setTimeout(function () {
              window.location='tablero.php';
            }, 1500);
          }else {
            alertify.error(response);
          }
          $("#registrar").html('REGISTRAR');
        }
      });
    }else {
        alertify.error('Campos Vacios');
    }
  }else {
    alertify.error('Tiene que aceptar terminos y condiciones');
  }
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
$('.page-scroll').click(function(){
  $('.navbar-toggler').click();
});

//notificaciones o  alertas
function alerta($mensaje){
  $('html').append('<div class="coding-alert success"><i class="fa fa-check"></i> '+$mensaje+'</div>');
/*setTimeout(function () {
  $('.coding-alert').remove();
}, 2000);*/

}
