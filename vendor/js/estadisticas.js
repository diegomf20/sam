$(document).ready(
    function() {
        var anio = (new Date).getFullYear();
        $("#txtanio").val(anio);
        graficar();
    }

);

var morrisMes= Morris.Area({
    element: 'morris-area-mes',
    behaveLikeLine: true,
    data: [],
    xkey: 'mes',
    ykeys: ['inversion','pagado'],//, 'compras'
    labels: ['inversion','pagado'],//, 'compras'
    resize:true,
    lineColors: ['#009688','#f0ad4e'],//,'#286090'
    ymax: 'auto[2500]',
    ymin:'auto[0]',
    xLabels:'month',
    xLabelFormat: function(date){
        var entero=Number(date.getMonth()+1);
        if (entero==1) {return 'Ene';}
        if(entero==2){return 'Feb';}
        if(entero==3){return 'Mar';}
        if(entero==4){return 'Abr';}
        if(entero==5){return 'May';}
        if(entero==6){return 'Jun';}
        if(entero==7){return 'Jul';}
        if(entero==8){return 'Ago';}
        if(entero==9){return 'Sep';}
        if(entero==10){return 'Oct';}
        if(entero==11){return 'Nov';}
        else{return 'Dic';}
    }
});

var morrisAnio= Morris.Area({
    element: 'morris-area-anio',
    behaveLikeLine: true,
    data: [],
    xkey: 'anio',
    ykeys: ['inversion','pagado'],
    labels: ['inversion','pagado'],
    resize:true,
    lineColors: ['#009688','#f0ad4e'],//,'#286090'
    ymax: 'auto[12000]',
    ymin:'auto[0]',
    xLabels:'year'
});


$('#cbperiodo').change(function (){
    graficar();
});

function graficar(){
  if ($('#cbperiodo').val()==0) {
    $('#txtanio').prop('disabled',false);
    $('#morris-area-mes').prop('hidden',false);
    $('#morris-area-anio').prop('hidden',true);
    $.ajax({
      url: '../app/control/c-estadisticas.php',
      type:'POST',
      dataType: "json",
      data:{operacion:"graficamensual", anio:$("#txtanio").val()},
      success: function(response){
        console.log(response);
        morrisMes.setData(response);
      }
    });
  }else{

    $('#txtanio').prop('disabled',true);
    $('#morris-area-mes').prop('hidden',true);
    $('#morris-area-anio').prop('hidden',false);

    $.ajax({
      url: '../app/control/c-estadisticas.php',
      type:'POST',
      dataType: "json",
      data:{operacion:'grafica'},
      success: function(response){
        console.log(response);
        morrisAnio.setData(response);
      }
    });
  }
}
