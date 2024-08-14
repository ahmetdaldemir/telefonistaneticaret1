$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.shippingList').on('change','.shippingStatus',function () {
    var id = $(this).data('id');
    var is_active = $(this).data('is_active');
    $.ajax({
        type: 'POST',
        url: '/shippings/companyStatusUpdate',  // Sunucuda işlenecek URL
        data: {
            id: id,
            status: is_active,
            payload: '',
            price: 0,
        },
        success: function(response) {
            Swal.fire({
                title: ''+response.title+'',
                text: response.message,
                icon: ''+response.icon+'',
                timer: 3000,
                showConfirmButton: false
            }).then(() => {
                window.location.reload();
            });

        },
        error: function(xhr, status, error) {
            console.error('Durum güncelleme hatası:', error);
            Swal.fire('Durum bir hata oluştu.');

        }
    });
})