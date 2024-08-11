
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function brandEdit(id) {
    $('#brandBasic').click(function () {
        $('#saveFormButton').text('Düzenle');
        $('#ModalTitle').text('Marka Düzenle');
    })

    $('#brandBasic').modal('show');
    $.ajax({
        url: '/brand/get?id='+id+'', // İstek yapılacak URL
        type: 'GET', // İstek tipi (GET, POST, PUT, DELETE gibi)
        success: function(response) {
            $('#brandBasic').find('#name').val(response.name)
            $('#brandBasic').find('#id').val(id)
        },
        error: function(xhr, status, error) {
            console.error('İstek hatası:', status, error);
        }
    });

}


$('#brandBasic').click(function () {
    $('#saveFormButton').text('Kaydet');
    $('#ModalTitle').text('Kategori Ekle');
})


$('#product-list-data-table').DataTable();

$('.brandList').on('change','.brandStatus',function () {
    var id = $(this).data('id');
    var is_status = $(this).data('is_status');
    $.ajax({
        type: 'POST',
        url: '/brand/update_status',  // Sunucuda işlenecek URL
        data: {
            id: id,
            is_status: is_status,
        },
        success: function(response) {
            Swal.fire({
                title: ''+response.title+'',
                text: response.message,
                icon: ''+response.icon+'',
                timer:  2000,
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
