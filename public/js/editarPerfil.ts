$(document).ready(function() {
    $('#formUsuario').on('submit',function (e){
        if(!validarNombre()||!validarPass())
            e.preventDefault();
    });
});
function validarNombre():boolean{
    let inputNombre:JQuery = $('#ipNombre');
    let nombre :string = inputNombre.val().toString();
    let inputApellidos:JQuery = $('#ipApellidos');
    let apellidos :string = inputApellidos.val().toString();
    let patron:RegExp = new RegExp("^[A-zÀ-ÿ]+([ ]+[A-zÀ-ÿ]+)*$");
    let errMessage:string = 'El formato no es válido';
    try{
        if(nombre!="")
            if(!patron.test(nombre))
                throw new Error('nombre');
        if(apellidos!="")
            if(!patron.test(apellidos))
                throw new Error('apellidos');
        inputNombre.removeClass('is-invalid');
        inputApellidos.removeClass('is-invalid');
        return true;
    }
    catch (err){
        if(err.message == 'nombre'){
            addEstiloError(inputNombre,errMessage);
        }
        else{
            addEstiloError(inputApellidos,errMessage);
        }
        return false;
    }
}
function validarPass():boolean{
    let inputPass:JQuery = $('#ipPass');
    let pass :string = inputPass.val().toString();
    let patron:RegExp = new RegExp('^(?=\\w*\\d)(?=\\w*[A-Z])(?=\\w*[a-z])\\S{8,16}$');
    let errMessage:string = 'La contraseña debe tener entre 8-16 caracteres alfanuméricos,' +
        ' mínimo una mayúscula, una mínuscula y un número'
    try{
        if(pass!="")
            if(!patron.test(pass))
                throw new Error(errMessage);
        inputPass.removeClass('is-invalid');
        return true;
    }
    catch(err){
        addEstiloError(inputPass,errMessage);
        return false;
    }
}
function addEstiloError(campo:JQuery,mensaje:string){
    campo.addClass('is-invalid');
    //añadir bloque de error hermano al input:
    campo.after(
        '<span class=\"invalid-feedback\" role=\"alert\">' +
        '<strong>' + mensaje + '</strong>' +
        '</span>');
}
function desbloquear():void{
    $("#ipNombre").prop('readonly', false);
    $("#ipApellidos").prop('readonly', false);
    $("#ipEmail").prop('readonly', false).prop('required',true);
    $("#ipPass").prop('readonly', false);

    $("#btEditar").hide();
    $("#btCerrarSesion").hide();
    $("#btAplicar").show();
    $("#btCancelar").show();
}

function bloquear():void{
    $("#ipNombre").prop('readonly', true);
    $("#ipApellidos").prop('readonly', true);
    $("#ipEmail").prop('readonly', true);
    $("#ipPass").prop('readonly', true);

    $("#btEditar").show();
    $("#btCerrarSesion").show();
    $("#btAplicar").hide();
    $("#btCancelar").hide();
}
