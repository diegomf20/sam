$.ajax({
  url: "app/control.php?operacion=resumenes",
  method:"post",
  dataType: "json",
  success:  function (response) {
    var obj=response;
    if (obj.paquete==null) obj.paquete=0;
    if (obj.cuota==null) obj.cuota=0;
    if (obj.recuperado==null) obj.recuperado=0;

    $('#txt-inversion').text('$ '+obj.paquete);
    $('#txt-recibido').text('$ '+obj.recuperado);
    $('#txt-cuota').text(obj.cuota);
    $('#txt-personas').text(obj.personas);
  }
});
