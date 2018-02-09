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
        url: '../app/control/c-inversionista.php',
        type:'POST',
        dataType: "json",
        data:{operacion:"listarInversionistas"},
        success: function(response){
          vuejs.items=response;
          console.log(response);
          asignarDataTable();
        }
      });
    },

    ingresarPaquete:function(event){
      alertify.prompt("SAM","Ingresar Paquete.", "0.00",
        function(evt, value ){vuejs.paquete=value;vuejs.idinversionista=event.target.id;
          setTimeout(function () {
            alertify.prompt("Ingresar Numero de transaccion.", "",
              function(evt, value ){vuejs.numerooperacion=value;vuejs.insertar();},
              function(){alertify.error('Cancelado');});
          }, 200);
        },
        function(){alertify.error('Cancelado');});
    },

    insertar: function(event){
      $.ajax({
        url: '../app/control/c-inversion.php',
        type:'POST',
        data:{operacion:"registrarInversion",idinversionista:vuejs.idinversionista,paquete:vuejs.paquete,numerooperacion:vuejs.numerooperacion},
        success: function(response){
          if (response) {
            alertify.success('Registrado inversion inicial');
            reemplazar('<span>INICIAL</span>');
          }else {
            alertify.error(response);
          }
          vuejs.actualizar();
        }
      });
    }
  }
});
vuejs.actualizar();
