$('#actualizar').click(function(){
  $('#foto').click();
});

$('#foto').change(function(e) {
  addImage(e);
});

function addImage(e){
  var file = e.target.files[0],imageType = /image.*/;
  var reader = new FileReader();
  reader.onload = fileOnload;
  reader.readAsDataURL(file);
}

function fileOnload(e) {
  var result=e.target.result;
  var formData = new FormData($("#formulario")[0]);
  var ruta = "app/control/c-imagen.php?operacion=dimensiones";
  $.ajax({
      url: ruta,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(datos)
      {
          if (datos=="alto") {
              $('#img-avatar').attr("style","background-image: url('"+result+"');background-size: 100% auto;");
          }else {
            $('#img-avatar').attr("style","background-image: url('"+result+"');background-size: auto 100%;");
          }
      }
  });
}

$('#guardar').click(function(){
  //var result=e.target.result;
  var formData = new FormData($("#formulario")[0]);
  var ruta = "app/control/c-imagen.php?operacion=guardar";
  $.ajax({
      url: ruta,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function(datos)
      {
        if (datos=="correcto"){
          alertify.success('Imagen Actualizada');
          setTimeout(function () {
              location.reload(true);
          }, 1500);

        }
        else alertify.error(datos);
      }
  });
})




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
