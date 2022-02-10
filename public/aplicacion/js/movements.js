$('document').ready(iniciar);

let movementMap = L.map('movementMap').setView([40.4378698, -3.8196207], 13);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 50,
}).addTo(movementMap);
let marker = L.marker([40.4378698, -3.8196207]).addTo(movementMap);

function iniciar() {
    $('#copiar').click(copiar);
    $('#copiar').mouseout(outFunc);
    $('#anadir').click(validar);
    $('#editMovement').click(editMovement);
    $('#updateMovement').click(updateMovement);
    $('#modalMovimiento').on('show.bs.modal', function () {
        setTimeout(function () {
            let width = $(window).width();
            let height2 = $(window).height() - 5;
            console.log(width + '/' + height2);
            window.resizeTo(width, height2);
            let width3 = $(window).width();
            let height3 = $(window).height();
            console.log(width3 + '/' + height3);
            // let height = $('#movementMap').height() / 2;
            // $('.leaflet-map-pane').css('transform', 'translate3d(312px,' + height + 'px,0px)');
            movementMap.invalidateSize();
        }, 20);
    });
}



function copiar() {
    var copyText = document.getElementById("compartir");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);

    var tooltip = document.getElementById("myTooltipPersonal");
    tooltip.innerHTML = "Enlace copiado";
}

function outFunc() {
    var tooltip = document.getElementById("myTooltipPersonal");
    tooltip.innerHTML = "Copiar enlace";
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
    if (concepto == "") {
        $('#concepto').css("border-color", "red");
        $('#conceptoError').append("-Escoja o cree uno<br>");
        todoOk = false;
    } else {
        $('#concepto').css("border-color", "#ced4da");
    }
    if (fecha == "") {
        $('#fecha').css("border-color", "red");
        $('#fechaError').append("-Rellene el campo<br>");
        todoOk = false;
    } else {
        $('#fecha').css("border-color", "#ced4da");
    }
    if (!todoOk) {
        $('#anadirBoton').trigger('click');
        $('#anadirBoton').trigger('click');
        return false;
    }
}



function editMovement() {


    console.log('a');
}
