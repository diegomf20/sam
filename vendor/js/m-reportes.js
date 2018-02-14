
var vuejs=new Vue({
  el:'#app',
  data:{
    listaafiliado:[],
    cantafiliado:[],
    nopaquetes:[],
    norenova:[],
  },
  methods: {
    actualizar: function (event) {
      $.ajax({
        url: '../app/control/c-reporte.php',
        type:'POST',
        dataType: "json",
        data:{operacion:"listaAfiliadosRango"},
        success: function(response){
          vuejs.listaafiliado=response;
          console.log(response);
        //  asignarDataTable();
        }
      });
    },

    cantxRango: function (event) {
      $.ajax({
        url: '../app/control/c-reporte.php',
        type:'POST',
        dataType: "json",
        data:{operacion:"cantRango"},
        success: function(response){
          vuejs.cantafiliado=response;
          console.log(response);
        //  asignarDataTable();
        }
      });
    },

    paquete: function (event) {
      $.ajax({
        url: '../app/control/c-reporte.php',
        type:'POST',
        dataType: "json",
        data:{operacion:"faltapaquete"},
        success: function(response){
          vuejs.nopaquetes=response;
          console.log(response);
        //  asignarDataTable();
        }
      });
    },

    renovar: function (event) {
      $.ajax({
        url: '../app/control/c-reporte.php',
        type:'POST',
        dataType: "json",
        data:{operacion:"faltaRenovar"},
        success: function(response){
          vuejs.norenova=response;
          console.log(response);
        //  asignarDataTable();
        }
      });
    },

  }
});
vuejs.actualizar();
vuejs.cantxRango();
vuejs.paquete();
vuejs.renovar();
