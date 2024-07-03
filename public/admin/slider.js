
$('#slider-list-data-table').on('change','#status',function () {

    var id = $(this).data('id');
    var field = $(this).data('field');
    var value = $(this).data('value');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/slider/update/'+id+'', // İstek yapılacak URL
        type: 'PUT',
        data: {
            field: field,
            value: value,
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
            handleAlert(response);
        },
        error: function(xhr, status, error) {
            // İstek başarısız olduğunda çalışacak fonksiyon
            console.error('İstek hatası:', status, error);
        }
    });

})



