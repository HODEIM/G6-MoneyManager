$('document').ready(iniciar);
/**** When you click on the user in the list of users you will edit that user and open accounts ****/
function iniciar() {
    $('#accountsTable tr').click(account);
    $('#anadir').click(validar);
}
function account() {
    $idAccount = $(this).children().first();
    window.location.href = '/account/' + $($idAccount).html();
    console.log($($idAccount).html());
}

var coll = document.getElementsByClassName("collapsibleCollapse");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }
    });
}

function validar() {
    var tipo = $('#tipo').val();
    var importe = $('#importe').val();
    var concepto = $('#concepto').val();
    var fecha = $('#fecha').val();

    $('#tipoError').text("");
    $('#importeError').text("");
    $('#conceptoError').text("");
    $('#fechaError').text("");

    var todoOk = true;

    if (tipo != "Ingreso" && tipo != "Gasto") {
        $('#tipo').css("border-color", "red");
        $('#tipoError').append("-Escoja uno<br>");
        todoOk = false;
    } else {
        $('#tipo').css("border-color", "#ced4da");
    }
    if (importe == "") {
        $('#importe').css("border-color", "red");
        $('#importeError').append("-Rellene el campo y asegurate de que es un número<br>");
        todoOk = false;
    } else {
        $('#importe').css("border-color", "#ced4da");
    }
    if(concepto == ""){
        $('#concepto').css("border-color", "red");
        $('#conceptoError').append("-Escoja o cree uno<br>");
        todoOk = false;
    }else {
        $('#concepto').css("border-color", "#ced4da");
    }
    if(fecha == ""){
        $('#fecha').css("border-color", "red");
        $('#fechaError').append("-Rellene el campo<br>");
        todoOk = false;
    }else {
        $('#fecha').css("border-color", "#ced4da");
    }
    if (!todoOk) {
        $('#anadirBoton').trigger('click');
        $('#anadirBoton').trigger('click');
        return false;
    }
}

