
$('document').ready(function () {
    let height = $(window).height();
    height = height - 311.59;
    let top = height / 2;
    let bottom = height / 2;
    $('.masthead').css({ 'padding-top': top, 'padding-bottom': bottom });
    $('#enviar').click(validarLogin);
});


function validarLogin(event) {
    var email = $('#emailLogin').val();
    var password = $('#passwordLogin').val();
    var falso = true;
    if (email == "" || !checkEmail()) {
        $('#padreEmailLogin').css("border", "1px solid #cb0104");
        emailIncorrecto();
        falso = false;
    } else {
        $('#padreEmailLogin').css("border", "1px solid #b5b5b5");
    }
    if (password == "") {
        $('#padrePasswordLogin').css("border", "1px solid #cb0104");
        falso = false;
    } else {
        $('#padrePasswordLogin').css("border", "1px solid #b5b5b5");
    }
    if (!falso) {
        event.preventDefault();
        return false;
    }

}

function emailIncorrecto() {
    $("#error").text("El email no tiene buen formato");
}

function checkEmail() {
    var regex = /[a-zA-Z0-9_\-\.\+]+\@[a-zA-Z0-9-]+\.[a-zA-Z]+/;
    return regex.test($('#emailLogin').val());
}
