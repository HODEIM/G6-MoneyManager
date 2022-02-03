$('document').ready(iniciar);

function iniciar() {
    $("#logout").click(logout);
}

function logout() {
    this.closest("form").submit();
}