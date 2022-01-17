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
        send = false;
        console.log('name');
        addError("{{__('error.name')}}","error1");
    }else{
        $(name).css("border-bottom", "");
    }

    let surname = $('#surname');
    if($(surname).val() == ""){
        $(surname).css("border-bottom", "1px solid #cb0104");
        send = false;
        console.log('surname');
        addError("{{__('error.surname')}}","error2");

    }else{
        $(surname).css("border-bottom", "");
    }

    let password = $('#passwordRegister');
    let repeatPassword = $('#repeatPasswordRegister');
    if(!validatePassword($(password).val()) || $(password).val() != $('#repeatPasswordRegister').val()){
        $(password).css("border-bottom", "1px solid #cb0104");
        $(repeatPassword).css("border-bottom", "1px solid #cb0104");
        send = false;
        console.log('passwordRegister');
        addError("{{__('error.password')}}","error3");
    }else{
        $(password).css("border-bottom", "");
        $(repeatPassword).css("border-bottom", "");
    }

    let day = $('#birthDay');
    let dayInt = parseInt($(day).val());
    if(dayInt <= 0 || dayInt > 31  || $(day).val() == ""){
        $(day).css("border-bottom", "1px solid #cb0104");
        send = false;
        console.log('birthDay');
        addError("{{__('error.birthDay')}}","error4")
    }else{
        $(day).css("border-bottom", "");
    }

    let month = $( "#birthMonth option:selected" ).val();
    if(month == "choose"){
        $("#birthMonth").css("border-bottom", "1px solid #cb0104");
        send = false;
        console.log('birthMonth');
        addError("{{__('error.bithMonth')}}","error5");
    }else{
        $("#birthMonth").css("border-bottom", "");
    }

    let year = $('#birthYear');
    if($(year).val() == ""){
        $(year).css("border-bottom", "1px solid #cb0104");
        send = false;
        console.log('birthYear');
        addError("{{__('error.birthYear')}}","error6");
    }else{
        $(year).css("border-bottom", "");
    }

    let email = $('#emailRegister');
    let repeatEmail = $('#repeatEmail');
    if(!validateEmail($(email).val())){
        $(email).css("border-bottom", "1px solid #cb0104");
        send = false;
        console.log('emailRegister');
        addError("{{__('error.email')}}","error7");
    }else{
        $(email).css("border-bottom", "");
    }
    if(!validateEmail($(email).val()) || $(email).val() != $(repeatEmail).val()){
        $(repeatEmail).css("border-bottom", "1px solid #cb0104");
        send = false;
        console.log('repeatEmail');
        addError("{{__('error.repeatEmail')}}","error8");
    }else{
        $(repeatEmail).css("border-bottom", "");
    }

    let address = $('#address');
    if($(address).val() == ""){
        $(address).css("border-bottom", "1px solid #cb0104");
        send = false;
        console.log('address');
        addError("{{__('error.address')}}","error9");
    }else{
        $(address).css("border-bottom", "");
    }

    let phone = $('#telephone');
    if($(phone).val() == ""){
        $(phone).css("border-bottom", "1px solid #cb0104");
        send = false;
        console.log('telephone');
        addError("{{__('error.telephone')}}","error10");
    }else{
        $(phone).css("border-bottom", "");
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