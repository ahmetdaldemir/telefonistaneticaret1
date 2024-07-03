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


