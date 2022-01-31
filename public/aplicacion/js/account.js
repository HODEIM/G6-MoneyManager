$('document').ready(iniciar);

function iniciar() {
    $('#create').click(validar);
}
function validar() {
    var nombre = $('#name').val();
    var descripcion = $('#description').val();

    var todoOk = true;

    $('#nameError').text("");
    $('#descriptionError').text("");

    if (nombre == "") {
        $('#name').css("border-color", "red");
        $('#nameError').append("-El campo no puede estar vacio<br>");
        todoOk = false;
    }else {
        $('#name').css("border-color", "#ced4da");
    }

    if (descripcion == "") {
        $('#description').css("border-color", "red");
        $('#descriptionError').append("-El campo no puede estar vacio<br>");
        todoOk = false;
    }else {
        $('#description').css("border-color", "#ced4da");
    }

    if (!todoOk)
        return false;


}