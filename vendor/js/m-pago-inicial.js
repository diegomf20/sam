//saber si ya fue asignado el efecto de Datatable
var statusDataTable=0;
function asignarDataTable(){
  if (statusDataTable==0) {
    Vue.nextTick(function () {
      $('#tabla').DataTable({
        responsive: true,
        columnDefs: [{ responsivePriority: 0, targets: 0 },{ responsivePriority: 1, targets: 1 }]
      });
      statusDataTable=1;
    });
  }
}
//arreglo para Dtatable jquery para no perder el efecto del vuejs
var jqueryborrar=$('.ninguno');
$(document).ready(function() {
  $('#app').on('click','.child button',function(){
    var id=$(this).attr("id");
    console.log(id);
    $('#'+id).click();
    jqueryborrar=$(this);
  });
});
function reemplazar(html){
  jqueryborrar.replaceWith(html);
}


//METODOS PROPIOS DE OPERACIONES

var vuejs=new Vue({
  el:'#app',
  data:{
    idinversionista:0,
    paquete:0,
    numerooperacion:'',
    items:[]
  },
  methods: {
    actualizar: function (event) {
      $.ajax({
        url: '../app/control/c-consultas.php',
        type:'POST',
        dataType: "json",
        data:{operacion:"consultaPagoInicial"},
        success: function(response){
          vuejs.items=response;
          console.log(response);
          asignarDataTable();
        }
      });
    },
    insertarPago:function(event){
      alertify.confirm("SAM","Confirmar pago de afiliación.",
      function(){
        $.ajax({
          url: '../app/control/c-inicial.php',
          type:'POST',
          data:{operacion:"insertarPagoInicial",idinversionista:event.target.id},
          success: function(response){
            if (response) {
              alertify.success('Registrado pago inicial');
              reemplazar('<div>PAGADO</div>');
            }else {
              alertify.error(response);
            }
            vuejs.actualizar();
          }
        });
      },
      function(){
        alertify.error('Cancel');
      });
    }
  }
});
vuejs.actualizar();
