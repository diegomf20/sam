<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      #foto{
        position: relative;
      }
      #foto:before{
        top: 0;

        position: absolute;
        content: "a";
        background-color: red;
        padding: 5px;
      }
    </style>
  </head>
  <body>

    <img id="imgSalida" src="">
    <form method="post" id="formulario" enctype="multipart/form-data">
      <input type="file" name="file" id="foto">
    </form>
    <button id="subir">SUBIR</button>
    <div id="hola">aaa </div>
    <script type="text/javascript" src="vendor/framewoks/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
    $('#foto').change(function(e) {
      addImage(e);
    });

    function addImage(e){
      var file = e.target.files[0],imageType = /image.*/;
      alert(file);

      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
    }

    function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida').attr("src",result);
      $('#hola').attr("style","background-image: url('"+result+"')");
    }

    $(function(){
        $("#foto").on("change", function(){
          alert('hola');
            var formData = new FormData($("#formulario")[0]);
            var ruta = "subir.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    alert(datos);
                }
            });
        });
     });

    </script>
  </body>
</html>
