$('document').ready(iniciar);
/**** User edit validation****/
function iniciar() {
    $("#guardar").click(comprobar);
}

function comprobar() {
    var id = $('#id').val();
    var name = $('#name').val();
    var surname = $('#surname').val();
    var password = $('#password').val();
    var password2 = $('#password_confirmation').val();
    var telephone = $('#telephone').val();
    var email = $('#emailInput').val();
    var address = $('#address').val();
    var rol = $('#rol :selected').val();
    var locked = $('#locked').is(":checked");
    var correcto = true;

    $('#nameError').text("");
    $('#surnameError').text("");
    $('#emailError').text("");
    $('#passwordError').text("");
    $('#password2Error').text("");

    if (name == "") {
        $('#name').css("border-color", "red");
        $('#nameError').append("-El nombre no puede estar vacio<br>");
        correcto = false;
    }else {
        $('#name').css("border-color", "#ced4da");
    }

    if (surname == "") {
        $('#surname').css("border-color", "red");
        $('#surnameError').append("-El apellido no puede estar vacio<br>");
        correcto = false;
    }else {
        $('#surname').css("border-color", "#ced4da");
    }

    if (email == "") {
        $('#emailInput').css("border-color", "red");
        $('#emailError').append("-El correo no puede estar vacio<br>");
        correcto = false;
    } else if (!validateEmail(email)) {
        $('#emailInput').css("border-color", "red");
        $('#emailError').append("-El formato del correo no es correcto<br>");
        correcto = false;
    } else {
        $('#emailInput').css("border-color", "#ced4da");
    }

    if (password != "") {
        if (password2 != password) {
            $('#password').css("border-color", "red");
            $('#password_confirmation').css("border-color", "red");
            $('#password2Error').append("-Las contraseñas no coinciden<br>");
            correcto = false;
        } else if (!validatePassword(password)) {
            $('#password').css("border-color", "red");
            $('#password_confirmation').css("border-color", "red");
            $('#passwordError').append("-La contraseña no cumple los requisitos minimos<br>");
            correcto = false;
        }else {
            $('#password').css("border-color", "#ced4da");
            $('#password_confirmation').css("border-color", "#ced4da");
        }
    }else {
        $('#password').css("border-color", "#ced4da");
        $('#password_confirmation').css("border-color", "#ced4da");
    }

    return correcto;
}

function validatePassword(password) {
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return regex.test(password);
}
function validateEmail(email) {
    var regex = /[a-zA-Z0-9_\-\.\+]+\@[a-zA-Z0-9-]+\.[a-zA-Z]+/;
    return regex.test(email);
}
/**** End User edit validation****/
