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
        data:{operacion:"listarDatosInversionistas"},
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
