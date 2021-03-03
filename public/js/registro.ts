let error:boolean= false;
$(document).ready(function (){
    let usuario :string = $('#inputNickname').val().toString();
    let email :string = $('#inputEmailAddress').val().toString();
    //eliminar del dom bloques antiguos de errores validación
    //$('.invalid-feedback').remove();


    //si ocurre algun error evitar el submit:

        $('form').first().on('submit',function (e){
            validarNombre();
            validarPass();
            if(error)
                e.preventDefault();
        })


});
function addEstiloError(campo:JQuery,mensaje:string){
    campo.addClass('is-invalid');
    //añadir bloque de error hermano al input:
    campo.after(
        '<span class=\"invalid-feedback\" role=\"alert\">' +
        '<strong>' + mensaje + '</strong>' +
        '</span>');
}
function validarNombre(){
    let inputNombre:JQuery = $('#inputFirstName');
    let nombre :string = inputNombre.val().toString();
    let inputApellidos:JQuery = $('#inputLastName');
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
        error=false;
    }
    catch(err){
        error=true;
        if(err.message == 'nombre'){
           addEstiloError(inputNombre,errMessage);
        }
        else{
           addEstiloError(inputApellidos,errMessage);
        }
    }
}
function validarPass(){
    let inputPass:JQuery = $('#inputPassword');
    let pass :string = inputPass.val().toString();
    let patron:RegExp = new RegExp('^(?=\\w*\\d)(?=\\w*[A-Z])(?=\\w*[a-z])\\S{8,16}$');
    let errMessage:string = 'La contraseña debe tener entre 8-16 caracteres alfanuméricos,' +
                            ' mínimo una mayúscula, una mínuscula y un número'
    try{
        if(pass!="")
            if(!patron.test(pass))
                throw new Error(errMessage);
        inputPass.removeClass('is-invalid');
        error=false;
    }
    catch(err){
        error=true;
        addEstiloError(inputPass,errMessage);
    }
}
