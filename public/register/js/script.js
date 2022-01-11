$('document').ready(function(){
    $('#registerSubmit').click(registerValidation);
    numCode();
});

function numCode(){
    $.getJSON('http://country.io/phone.json',function (){console.log('Success')});

}
function registerValidation(){
    let name = $('#name');
    if($(name).val() == ""){
        $(name).css("border-bottom", "1px solid #cb0104");
    }else{
        $(name).css("border-bottom", "");
    }
    let surname = $('#surname');
    if($(surname).val() == ""){
        $(surname).css("border-bottom", "1px solid #cb0104");
    }else{
        $(surname).css("border-bottom", "");
    }
    let password = $('#passwordRegister');
    let repeatPassword = $('#repeatPasswordRegister');
    if(!validatePassword($(password).val()) || $(password).val() != $('#repeatPasswordRegister').val()){
        $(password).css("border-bottom", "1px solid #cb0104");
        $(repeatPassword).css("border-bottom", "1px solid #cb0104");
    }else{
        $(password).css("border-bottom", "");
        $(repeatPassword).css("border-bottom", "");
    }
    let day = $('#birthDay');
    if(parseInt($(day).val()) <= 0 || parseInt($(day).val()) > 31 ){
        $(day).css("border-bottom", "1px solid #cb0104");
    }else{
        $(day).css("border-bottom", "");
    }
    let month = $( "#birthMonth option:selected" ).val();
    if(month == "choose"){
        $("#birthMonth").css("border-bottom", "1px solid #cb0104");
    }else{
        $("#birthMonth").css("border-bottom", "");
    }
    let year = $('#birthYear');
    if($(year).val() == ""){
        $(year).css("border-bottom", "1px solid #cb0104");
    }else{
        $(year).css("border-bottom", "");
    }

    let email = $('#emailRegister');
    let repeatEmail = $('#repeatEmail');
    if(!validateEmail($(email).val())){
        $(email).css("border-bottom", "1px solid #cb0104");
    }else{
        $(email).css("border-bottom", "");
    }
    if(!validateEmail($(email).val()) || $(email).val() != $(repeatEmail).val()){
        $(repeatEmail).css("border-bottom", "1px solid #cb0104");
    }else{
        $(repeatEmail).css("border-bottom", "");
    }
    let address = $('#address');
    if($(address).val() == ""){
        $(address).css("border-bottom", "1px solid #cb0104");
    }else{
        $(address).css("border-bottom", "");
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
// str = str.replace(/\s+/g, '');