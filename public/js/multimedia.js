var error = false;
var extensionesPermitidas = [
    "jpg", "jpeg", "png", "gif", "pdf", "txt", "odt", "docx", "zip"
];
$(document).ready(function () {
    $('#archivo').change(function () {
        validarVacio();
        validarExtension();
    });
    $('#formMultimedia').on('submit', function (e) {
        validarVacio();
        //si ocurre algun error evitar el submit:
        if (error) {
            e.preventDefault();
        }
    });
});
function validarVacio() {
    var archivo = $('#archivo').val().toString();
    try {
        if (archivo == "") {
            $("#iconoArchivo").css("display", "none");
            throw new Error();
        }
        error = false;
    }
    catch (err) {
        error = true;
    }
}
function validarExtension() {
    var archivo = $('#archivo').val().toString();
    try {
        var extension = archivo.substring(archivo.lastIndexOf('.'), archivo.length);
        extension = extension.substring(1, extension.length);
        if (extensionesPermitidas.includes(extension)) {
            $("#iconoArchivo").addClass("fa-check-circle")
                .removeClass("fa-exclamation-triangle");
            $("#iconoArchivo").css("display", "inline");
        }
        else {
            $("#iconoArchivo").addClass('fa-exclamation-triangle')
                .removeClass('fa-check-circle');
            $("#iconoArchivo").css("display", "inline");
            throw new Error();
        }
        error = false;
    }
    catch (err) {
        error = true;
    }
}
