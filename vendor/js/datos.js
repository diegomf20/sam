$('#guardar1').click(function(){
  var contrasenia=$('#contrasenia').val();
  if (contrasenia=="") {
    alertify.error('Contraseña Vacia');
  }else if (6>contrasenia.length) {
    alertify.error('Contraseña muy corta');
  }else {
    $.ajax({
      url:'app/control/c-inversionista.php',
      type:'POST',
      data:{
        operacion:'cambiarContrasenia',
        contrasenia:contrasenia
      },
      success:function(response){
        if (response) alertify.success('Contraseña guardada');
        else alertify.error(response);
      }
    });
  }
});

$('#guardar2').click(function(){
  var nombres=$('#nombres').val();
  var apellidos=$('#apellidos').val();
  var dni=$('#dni').val();
  var celular=$('#celular').val();
  var direccion=$('#direccion').val();
  var ciudad=$('#ciudad').val();
  if (nombres==""||apellidos==""||dni==""||celular=="") {
    alertify.error('Campos obligatorios vacios');
  }else{
    $.ajax({
      url:'app/control/c-inversionista.php',
      type:'POST',
      data:{
        operacion:'cambiarDatosPersonales',
        nombres:nombres,
        apellidos:apellidos,
        dni:dni,
        celular:celular,
        direccion:direccion,
        ciudad:ciudad
      },
      success:function(response){
        if (response) alertify.success('Datos guardados');
        else alertify.error(response);
      }
    });
  }
});

$('#guardar3').click(function(){
  var banco=$('#banco').val();
  var numerocuenta=$('#numerocuenta').val();
  if (banco==""||numerocuenta=="") {
    alertify.error('Campos obligatorios vacios');
  }else{
    $.ajax({
      url:'app/control/c-inversionista.php',
      type:'POST',
      data:{
        operacion:'cambiarInformacionBancaria',
        banco:banco,
        numerocuenta:numerocuenta
      },
      success:function(response){
        if (response) alertify.success('Información bancaria guardada');
        else alertify.error(response);
      }
    });
  }
});
