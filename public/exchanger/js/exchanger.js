$('document').ready(function () {
    $.ajax({
        url: "https://api.exchangerate.host/latest",
        success: function (json) {
            addCoins(json);
        }
    });
    $('#importe').keyup(convert);
});

function addCoins(json) {
    $.each(json.rates, function (k, v) {
        $('#from').append($('<option>', {
            value: k,
            text: k
        }));
        $('#to').append($('<option>', {
            value: k,
            text: k
        }));
    });
    $('#from option[value=EUR]').prop('selected', 'true');
    $('#to option[value=USD]').prop('selected', 'true');


}
function convert() {
    let from = $('#from').val();
    let to = $('#to').val();
    let amount = parseFloat($(this).val());
    if (isNaN(amount)) {
        $('#amountError').text("Invalid Input");
    } else {
        $('#amountError').text("")
        $.ajax({
            url: "https://api.exchangerate.host/convert?from=" + from + "&to=" + to + "&amount=" + amount + "&format=json",
            success: function (json) {
                $('#result .h3').text(amount + ' ' + from + ' =');
                $('#result h2').text(json.result + ' ' + to);
                $('.exchange').text('1 ' + from + ' = ' + json.info.rate + ' ' + to);
            }
        });
    }
}


