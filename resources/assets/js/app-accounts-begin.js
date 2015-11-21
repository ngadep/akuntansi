
(function ($) {
    //toggle `popup` / `inline` mode
    $.fn.editable.defaults.mode = 'popup';

    $('.balance').editable({
        url: 'beginning-balance',
        title: 'Enter Number',
        value: '',
        type: 'text',
        params: function (params) {
            params._token = $("#_token").data("token");
            return params;
        },
        ajaxOptions: {dataType: 'json'},
        success: function (response, newValue) {
            if (response.success) {
                return refreshValue();
            }
        }
    });

    function numberF(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function calculateSum($input) {
        var sum = 0;
        $input.each(function () {
            var value = $(this).text().replace(/,/g, '');
            if (!isNaN(value) && value.length != 0) {
                sum += parseFloat(value);
            }
        });
        return sum;
    }

    window.refreshValue =function() {
        var sumDebit = calculateSum($('.debit-value'));
        var sumCredit = calculateSum($('.credit-value'));
        var balance = sumDebit - sumCredit;
        var balanceComma = numberF(balance);

        $('#sum-debit').text(numberF(sumDebit));
        $('#sum-kredit').text(numberF(sumCredit));

        if (balance !== 0) {
            $('#alert-id').remove();
            var elemdiv = $("<div id='alert-id' class='alert alert-danger'>Saldo awal akun " +
                "<strong>TIDAK SEIMBANG</strong> jumlah <strong>AKTIVA</strong> " +
                "tidak sama dengan Jumlah <strong>PASIVA</strong> balance " +
                "<strong>Rp. " + (balanceComma) + "</strong></div>");
            $('.panel-body').prepend(elemdiv);
        } else {
            $('#alert-id').remove();
        }
    };
    refreshValue();
    //TODO: always refresh per 3 second. it should be auto refresh after commit new value from x-editable
    /*
    window.setInterval(function(){
        refreshValue();
    },3000);
    */
})(jQuery);