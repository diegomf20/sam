var estado=false;
$(document).ready(function() {
  $('#menu-boton').on('click',function(){
    if (estado) {
      $('.menu').removeClass('menu-visible');
      $('.contenido').removeClass('contenido-deslizar');
      $('#menu-boton i').removeClass('fa-times').addClass('fa-bars');
      estado=false;
    }else {
      $('.menu').addClass('menu-visible');
      $('.contenido').addClass('contenido-deslizar');
      $('#menu-boton i').addClass('fa-times').removeClass('fa-bars');
      estado=true;
    }
  });
});
