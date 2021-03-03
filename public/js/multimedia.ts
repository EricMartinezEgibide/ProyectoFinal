let validar:boolean= false;
let extensionesPermitidas:Array<string>=[
    "jpg","jpeg","png","gif","pdf","txt","odt","docx","zip"
];

$(document).ready(function (){
    $('#archivo').change(function (){
        validar = validarExtension();
    });
    $('#formMultimedia').on('submit',function (e){

        e.preventDefault();
        //si ocurre algun error evitar preguntar por ajax:
        if(!validar)
            alert('no pasó validación');
        else{
            //petición ajax
            let _token:string = $('meta[name="csrf-token"]').attr('content');
            let archivo :string = $('#archivo').val().toString();
            let nombreArchivo: string = archivo.substring(archivo.lastIndexOf('\\'), archivo.length);
            nombreArchivo = nombreArchivo.substring(1, nombreArchivo.length);
            $.ajax({
                url: "/archivos",
                type:"POST",
                data:{
                    _token: _token,
                    archivo: nombreArchivo
                },
                success:function(response){
                    if(response == "0"){
                        alert("ya existe un archivo con ese nombre");
                        //mostrar modal

                        var myModal = new bootstrap.Modal(document.getElementById('#subirArchivo'));
                    }
                    else{
                        alert("Se añadirá este archivo");
                        //aquí se debería hacer el submit.
                    }
                },

            });
        }
    });
});

function validarExtension():boolean{
    let archivo :string = $('#archivo').val().toString();
    try {
        if (archivo!= "") {
            let extension: string = archivo.substring(archivo.lastIndexOf('.'), archivo.length);
            extension = extension.substring(1, extension.length);
            if (extensionesPermitidas.includes(extension)) {
                $("#iconoArchivo").addClass("fa-check-circle")
                    .removeClass("fa-exclamation-triangle");
                $("#iconoArchivo").css("display", "inline");
                return true;
            }
            $("#iconoArchivo").addClass('fa-exclamation-triangle')
                .removeClass('fa-check-circle');
            $("#iconoArchivo").css("display", "inline");
            throw new Error();
        }
        $("#iconoArchivo").css("display","none");
        return true;
    }
    catch (err) {
        return false;
    }
}


