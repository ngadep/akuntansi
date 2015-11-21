(function($) {
    var infoModal = $('#myModal');
    $('.buka-modal').on('click', function(){
        $.getJSON('/journals/show/'+$(this).data('id'),function( data ) {
            var items ='';
            var debit=0;
            var credit = 0;
            $.each(data, function(key, val) {
                items+="<tr>";
                $.each(val, function(k, v){
                    items+="<td>"+v+"</td>";
                    debit+= (k=='debit') ? v : 0;
                    credit+= (k=='credit') ? v : 0;
                });
                items+="</tr>";
            });
            items+="<tr class='success'><td class='text-center' colspan='2'>Total :</td>" +
                "<td>"+debit+"</td><td>"+credit+"</td></tr>";

            $('#data-jurnal-detail').html(items);
            infoModal.modal('show');
        });
    });
})(jQuery);