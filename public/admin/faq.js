function faqEdit(id) {
    $('#faqBasic').modal('show');
    $.ajax({
        url: '/faq/get?id='+id+'', // İstek yapılacak URL
        type: 'GET', // İstek tipi (GET, POST, PUT, DELETE gibi)
        success: function(response) {
            $('#faqBasic').find('#name').val(response.name)
            $('#faqBasic').find('#id').val(id)
            tinymce.get('value').setContent(response.value);

        },
        error: function(xhr, status, error) {
            console.error('İstek hatası:', status, error);
        }
    });

}
