$('#form-ingresar').submit(function(event){
  event.preventDefault();
  var usuario=$('#usuario').val();
  var contrasenia=$('#contrasenia').val();
  if (usuario==""||contrasenia=="") {
    alertify.warning('Campos Vacios');
  }else{
    $.ajax({
      url: '../app/control/c-administrador.php',
      type:'POST',
      data:{operacion:"login",usuario:usuario,contrasenia:contrasenia},
      success: function(response){
        if (response=="true") {
          alertify.success('Correcto, Ingresando ...');
          setTimeout(function () {
              location.href='estadisticas.php';
          }, 2000);
        }else {
          alertify.error('Usuario o Contraseña Incorrecta');
        }
      }
    });
  }
});
