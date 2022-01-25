$('document').ready(function(){
    $('#registerSubmit').click(registerValidation);
    // numCode();
});

// function numCode(){
//     $.ajax({
//         url: 'http://country.io/phone.json',
//         type: 'GET',
//         dataType: 'application/json',
//         success: function(){console.log('Success');},
//         error:  function(){console.log('Request error')}
//     });
//     $.getJSON('http://country.io/phone.json',function (){console.log('Success')});

// }

// Validacion del formulario de registro
function registerValidation(){
    var send = true;
    let name = $('#name');
    if($(name).val() == ""){
        $(name).css("border-bottom", "1px solid #cb0104");
        $('.nametooltip').children('.tooltiptext').css('visibility','visible');
        $('.nametooltip').children('.tooltiptext').html("El nombre esta vacio");
        send = false;
    }else{
        $('.nametooltip').children('.tooltiptext').css('visibility','hidden');
        $(name).css("border-bottom", "");
    }

    let surname = $('#surname');
    if($(surname).val() == ""){
        $(surname).css("border-bottom", "1px solid #cb0104");
        $('.surnametooltip').children('.tooltiptext').css('visibility','visible');
        $('.surnametooltip').children('.tooltiptext').html("El apellido esta vacio");
        send = false;
    }else{
        $('.surnametooltip').children('.tooltiptext').css('visibility','hidden');
        $(surname).css("border-bottom", "");
    }

    let password = $('#passwordRegister');
    let repeatPassword = $('#repeatPasswordRegister');
    if(!validatePassword($(password).val())){
        $(password).css("border-bottom", "1px solid #cb0104");
        $('.passwordtooltip').children('.tooltiptext').css('visibility','visible');
        $('.passwordtooltip').children('.tooltiptext').html("No cumple los requisitos<br> -> 8 caracteres<br> -Mayusculas<br> -Simbolos<br> -Numeros");

        send = false;
    }else{
        $(password).css("border-bottom", "");
        $('.passwordtooltip').children('.tooltiptext').css('visibility','hidden');

    }
    if($(password).val() != $(repeatPassword).val() || $(repeatPassword).val() == ""){
        $(repeatPassword).css("border-bottom", "1px solid #cb0104");
        $('.repeatpasswordtooltip').children('.tooltiptext').css('visibility','visible');
        $('.repeatpasswordtooltip').children('.tooltiptext').html("Las contraseñas no coinciden");
        send = false;
    }else{
        $(repeatPassword).css("border-bottom", "");
        $('.repeatpasswordtooltip').children('.tooltiptext').css('visibility','hidden');
    }

    let day = $('#birthDay');
    let dayInt = parseInt($(day).val());
    if(dayInt <= 0 || dayInt > 31  || $(day).val() == ""){
        $(day).css("border-bottom", "1px solid #cb0104");
        $('.daytooltip').children('.tooltiptext').css('visibility','visible');
        $('.daytooltip').children('.tooltiptext').html("Dia del 1 al 31");
        send = false;
    }else{
        $(day).css("border-bottom", "");
        $('.daytooltip').children('.tooltiptext').css('visibility','hidden');

    }

    let month = $( "#birthMonth option:selected" ).val();
    if(month == "choose"){
        $("#birthMonth").css("border-bottom", "1px solid #cb0104");
        $('.monthtooltip').children('.tooltiptext').css('visibility','visible');
        $('.monthtooltip').children('.tooltiptext').html("Seleccione un mes");
        send = false;
    }else{
        $("#birthMonth").css("border-bottom", "");
        $('.monthtooltip').children('.tooltiptext').css('visibility','hidden');
    }

    let year = $('#birthYear');
    if($(year).val() == ""){
        $(year).css("border-bottom", "1px solid #cb0104");
        $('.yeartooltip').children('.tooltiptext').css('visibility','visible');
        $('.yeartooltip').children('.tooltiptext').html("Seleccione un mes");
        send = false;
    }else{
        $(year).css("border-bottom", "");
        $('.yeartooltip').children('.tooltiptext').css('visibility','hidden');
    }

    let email = $('#emailRegister');
    let repeatEmail = $('#repeatEmail');
    if(!validateEmail($(email).val())){
        $(email).css("border-bottom", "1px solid #cb0104");
        $('.emailtooltip').children('.tooltiptext').css('visibility','visible');
        $('.emailtooltip').children('.tooltiptext').html("No tiene buen formato");
        send = false;
    }else{
        $(email).css("border-bottom", "");
        $('.emailtooltip').children('.tooltiptext').css('visibility','hidden');
    }

    if(!validateEmail($(email).val()) || $(email).val() != $(repeatEmail).val()){
        $(repeatEmail).css("border-bottom", "1px solid #cb0104");
        $('.repeatemailtooltip').children('.tooltiptext').css('visibility','visible');
        $('.repeatemailtooltip').children('.tooltiptext').html("No coinciden");
        send = false;
    }else{
        $(repeatEmail).css("border-bottom", "");
        $('.repeatemailtooltip').children('.tooltiptext').css('visibility','hidden');
    }

    let address = $('#address');
    if($(address).val() == ""){
        $(address).css("border-bottom", "1px solid #cb0104");
        $('.addresstooltip').children('.tooltiptext').css('visibility','visible');
        $('.addresstooltip').children('.tooltiptext').html("No dejes vacío");
        send = false;
    }else{
        $(address).css("border-bottom", "");
        $('.addresstooltip').children('.tooltiptext').css('visibility','hidden');
    }

    let phone = $('#telephone');
    if($(phone).val() == ""){
        $(phone).css("border-bottom", "1px solid #cb0104");
        $('.telephonetooltip').children('.tooltiptext').css('visibility','visible');
        $('.telephonetooltip').children('.tooltiptext').html("No dejes vacío");
        send = false;
    }else{
        $(phone).css("border-bottom", "");
        $('.telephonetooltip').children('.tooltiptext').css('visibility','hidden');
    }
    console.log(send);
    if(!send){
        return false;
    }
}

function validatePassword(password) {
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return regex.test(password);
}
function validateEmail(email) {
    var regex = /[a-zA-Z0-9_\-\.\+]+\@[a-zA-Z0-9-]+\.[a-zA-Z]+/;
    return regex.test(email);
}
function changeVisible(text,id){
    $('#error').append('<li id="'+id+'"; style="color: red;">'+text+'</li>');

}
// str = str.replace(/\s+/g, '');