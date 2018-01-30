var estado=false;
$('#menu-boton').click(function(){
  if (estado) {
    $('.menu').removeClass('menu-visible');
    $('.contenido').removeClass('contenido-deslizar');
    estado=false;
  }else {
    $('.menu').addClass('menu-visible');
    $('.contenido').addClass('contenido-deslizar');
    estado=true;
  }

});
