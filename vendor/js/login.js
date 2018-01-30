$('#form-ingresar').submit(function(event){
  event.preventDefault();
  var email=$('#email').val();
  var contrasenia=$('#contrasenia').val();
  if (email==""||contrasenia=="") {
    alertify.warning('Campos Vacios');
  }else{
    $.ajax({
      url: 'app/control/c-inversionista.php',
      type:'POST',
      data:{operacion:"login",email:$('#email').val(),contrasenia:$('#contrasenia').val()},
      success: function(response){
        if (response=='correcto') {
          alertify.success('Correcto, Ingresando ...');
          setTimeout(function () {
              location.href='tablero.php';
          }, 2000);
        }else {
          console.log('error: '+response);
          alertify.error('Usuario o Contraseña Incorrecta');
        }
      }
    });
  }
});
