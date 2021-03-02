
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="css/tareas.css" type="text/css" rel="stylesheet">
    <title>Siwo</title>

</head>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script
<script src="/js/editarPerfil.js"></script>
<script src="/js/validaciones.js"></script>
<script src="/js/proj-js/accordeon.js"></script>
<script>
    var idT;
    $('.modal').on('shown.bs.modal', function (e) {
        idT = this.id;
    });




    function comprobarName(){


        let idTarea = idT.substr(5);

        let s = "select"+idTarea


        let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "/comprobarParticipante",
            type:"POST",
            data:{
                _token: _token,
                id:$('select[id='+s+']').val(),
                idT:idTarea
            },
            success:function(response){
                if(response == "0"){
                    alert("Ya se encuentra añadido a la tarea.");
                }else{
                    alert("Se añadió correctamente al usuario.");
                    location.reload();

                }
            },
        });

    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/proj-js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="/js/proj-js/demo/chart-area-demo.js"></script>
<script src="/js/proj-js/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script src="/js/proj-js/demo/datatables-demo.js"></script>
<script src="/js/multimedia.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="js/estadisticas/chart-area-demo.js"></script>
<script src="js/estadisticas/chart-bar-demo.js"></script>
<script src="js/estadisticas/chart-pie-demo.js"></script>
