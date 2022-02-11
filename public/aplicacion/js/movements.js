$('document').ready(iniciar);

let movementMap = L.map('movementMap').setView([40.416729, -3.703339], 14);
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 50,
}).addTo(movementMap);
movementMap.doubleClickZoom.disable();
let marker = L.marker([40.416729, -3.703339]).addTo(movementMap);
movementMap.on('dblclick', function (e) {
    lat = e.latlng.lat;
    lon = e.latlng.lng;

    if (marker != undefined) {
        movementMap.removeLayer(marker);
    };

    //Add a marker to show where you clicked.
    marker = L.marker([lat, lon]).addTo(movementMap);
});

function iniciar() {
    $('#copiar').click(copiar);
    $('#copiar').mouseout(outFunc);
    $('#anadir').click(validar);
    $('#updateMovement').click(updateMovement);
    $('#modalMovimiento').on('shown.bs.modal', function (e) {
        movementMap.invalidateSize();
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

function validarPermisos() {
    var usuario = $('#usuario').val();
    var permiso = $('#permission').val();

    $('#usuarioError').text("");
    $('#permisosError').text("");

    var todoOk = true;

    if (usuario == "") {
        $('#usuario').css("border-color", "red");
        $('#usuarioError').append("-Escoja uno");
        todoOk = false;
    } else {
        $('#usuario').css("border-color", "#ced4da");
    }
    if (permiso == "") {
        $('#permission').css("border-color", "red");
        $('#permisosError').append("-Escoja o cree uno<br>");
        todoOk = false;
    } else {
        $('#permission').css("border-color", "#ced4da");
    }

    if (!todoOk) {
        $('#administrar').trigger('click');
        $('#administrar').trigger('click');
        return false;
    }
}

function validarDetach() {
    var usuario = $('#usuario').val();

    $('#usuarioError').text("");

    var todoOk = true;

    if (usuario == "") {
        $('#usuario').css("border-color", "red");
        $('#usuarioError').append("-Escoja usuario a eliminar");
        todoOk = false;
    } else {
        $('#usuario').css("border-color", "#ced4da");
        $('#destroyUser').val(usuario);
    }

    if (!todoOk) {
        $('#administrar').trigger('click');
        $('#administrar').trigger('click');
        return false;
    }
}

function editMovement(id) {
    // let requestUrl = location.origin + '/api/movement/' + $(this).attr('data-id');
    let requestUrl = location.origin + '/api/movement/' + id;
    console.log(requestUrl);
    $.ajax({
        type: "GET",
        contentType: "application/json",
        url: requestUrl,
        data: {},
        dataType: "json",
        success: function (result) {
            $('#idMovement').val(result.id);
            $('#importe2').val(result.amount);
            $('#tipo2 option[value=' + result.type + ']');
            $('#concepto2 option[value=' + result.id_concept + ']');
            $('#descripcion2 ').val(result.description);
            $('#fecha2').val(result.date);
            movementMap.setView([result.latitude, result.longitude], 14);
            marker.setLatLng([result.latitude, result.longitude]);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}

function updateMovement() {
    let id = $('#idMovement').val();
    let requestUrl = location.origin + '/api/movement/' + id;
    let LatLng = marker.getLatLng();
    var type = $('#tipo2').val();
    var amount = $('#importe2').val();
    var description = $('#descripcion2').val();
    var date = $('#fecha2').val();
    var id_concept = $('#concepto2').val();
    var latitude = LatLng.lat;
    var longitude = LatLng.lng;


    $.ajax({
        type: "PUT",
        url: requestUrl,
        data: {
            type: type,
            amount: amount,
            description: description,
            date: date,
            id_concept: id_concept,
            latitude: latitude,
            longitude: longitude
        },
        dataType: "json",
        success: function (result) {
            alert('Guardado con existo');
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        }
    });
}
