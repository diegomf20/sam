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
        data:{operacion:"registrarAfiliado",nombres:nombres,apellidos:apellidos,celular:celular,dni:dni,email:email},
        beforeSend: function () {$("#registrar").html('<i class="fa fa-spinner"></i> REGISTRANDO ...');},
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
