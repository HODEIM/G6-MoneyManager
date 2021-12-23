$('document').ready(function(){
    $('#registerSubmit').click(registerValidation);
});

function registerValidation(){
    var form = $('#registerFrom input');
    for(let a of form){
        if($(a).attr('type') == 'password'){
            $(a).val();
        }
        console.log($(a).attr('type'));
    }
}