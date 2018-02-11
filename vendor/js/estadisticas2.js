var morrisMes= Morris.Area({
    element: 'morris-area-mes',
    behaveLikeLine: true,
    data: [
      /*
      {mes: '2018-1', inversion: 334, pagado: 227},
       {mes: '2018-2', inversion: 332, pagado: 56},
       {mes: '2018-3', inversion: 334, pagado: 227},
        {mes: '2018-4', inversion: 356, pagado: 223},
        {mes: '2018-5', inversion: 332, pagado: 56},
        {mes: '2018-6', inversion: 334, pagado: 227},
         {mes: '2018-7', inversion: 356, pagado: 223},
         {mes: '2018-8', inversion: 332, pagado: 56},
         {mes: '2018-9', inversion: 356, pagado: 223},
         {mes: '2018-10', inversion: 334, pagado: 227},
          {mes: '2018-11', inversion: 356, pagado: 223},
          {mes: '2018-12', inversion: 332, pagado: 56.56}, */
    ],
    xkey: 'mes',
    ykeys: ['inversion','pagado'],
    labels: ['inversion','pagado'],
    resize:true,
    lineColors: ['#009688','#f0ad4e'],
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

function graficar(){
  $.ajax({
    url:'../app/control/c-estadisticas.php',
    type: 'POST',
    dataType:'json',
    data:{operacion:"graficamensual", anio:$("#txtanio").val()},
    success: function(response){
      console.log(response);
      morrisMes.setData(response);

    }

  })

}
