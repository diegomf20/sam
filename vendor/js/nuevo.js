//registro rapido de nuevo cliente
$('#registrar').click(function(){
  $.ajax({
    url: 'app/control/c-inversionista.php',
    type:'POST',
    data:{operacion:"registrarAfiliado",nombres:$('#nombres').val(),apellidos:$('#apellidos').val(),celular:$('#celular').val(),dni:$('#dni').val(),email:$('#email').val()},
    success: function(response){
      alert(response);
      if (response) {
        alertify.success('Afiliado Registrado');
        setTimeout(function () {
            location.href='tablero.php';
        }, 2000);
      }else {
        alertifi.error('Error al registrar: '+response);
      }
    }
  });
});
