$('document').ready(iniciar);

function iniciar() {
    $('#copiar').click(copiar);
    $('#copiar').mouseout(outFunc);
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