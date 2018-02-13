$('#btnenviar').click(function(){
	var nombre=$('#txtnombre').val();
	var telefono=$('#txttelefono').val();
	var email=$('#txtemail').val();
	var mensaje=$('#txtmensaje').val();
	var enviar = true;

	if (nombre!='') $('#txtnombre').removeClass('error');
	else{	$('#txtnombre').addClass('error');enviar=false;}
	
	if (telefono!='') $('#txttelefono').removeClass('error');
	else{	$('#txttelefono').addClass('error');enviar=false;}
	
	if (email!='') $('#txtemail').removeClass('error');
	else{	$('#txtemail').addClass('error');enviar=false;}
	
	if(mensaje!='') $('#txtmensaje').removeClass('error');
	else{	$('#txtmensaje').addClass('error');enviar=false;}
	
	if (enviar) {
		var parametros = {'nombre':nombre,'telefono':telefono,'email':email,'mensaje':mensaje};
        $.ajax({            
            url: 'enviar.php',
            data: parametros,
            type: 'POST',
            statusCode: {404: function() {console.log('Pagina no encontrada')},500: function(){console.log('Error del servidor')}},
            beforeSend: function () {$('#mostrar').html('Enviando Mensaje...');},
            success: function(resultado){
            	if (resultado=='Mensaje Enviado') {
            		$('#txtnombre').val('');
		    		$('#txttelefono').val('');
		    		$('#txtemail').val('');
		    		$('#txtmensaje').val('');
            		$('#mostrar').html('<h3>'+resultado+'</h3>');
            	}else{
            		$('#mostrar').html('<h3>'+resultado+'</h3>');
            	}
            }
        });
	}else{
		$('#mostrar').html('<h3>Revisar los datos</h3>');
	}    		
});