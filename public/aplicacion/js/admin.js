$('document').ready(iniciar);

function iniciar() {
    $('tbody tr').click(abrir);
}

function abrir() {
    $id = $(this).children().first();
    window.location.href = '/admin/'+$($id).html()+'/edit';
    console.log($($id).html());
}