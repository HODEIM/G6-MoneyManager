$('document').ready(iniciar);
/**** When you click on the user in the list of users you will edit that user and open accounts ****/
function iniciar() {
    $('#accountsTable tr').click(account);
}
function account() {
    $idAccount = $(this).children().first();
    window.location.href = '/movement/' + $($idAccount).html();
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