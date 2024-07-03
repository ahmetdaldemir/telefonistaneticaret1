function attributeGroupEdit(id) {
    $('#attributeGroupBasic').modal('show');
    $.ajax({
        url: '/product_attribute/group/get?id='+id+'', // İstek yapılacak URL
        type: 'GET', // İstek tipi (GET, POST, PUT, DELETE gibi)
        success: function(response) {
            $('#attributeGroupBasic').find('#name').val(response.name)
            $('#attributeGroupBasic').find('#id').val(id)
        },
        error: function(xhr, status, error) {
            console.error('İstek hatası:', status, error);
        }
    });

}

function attributeBasicEdit(id) {
    $('#attributeBasic').modal('show');
    $.ajax({
        url: '/product_attribute/get?id='+id+'', // İstek yapılacak URL
        type: 'GET', // İstek tipi (GET, POST, PUT, DELETE gibi)
        success: function(response) {
            $('#attributeBasic').find('#name').val(response.name)
            $('#attributeBasic').find('#id').val(id)
        },
        error: function(xhr, status, error) {
            console.error('İstek hatası:', status, error);
        }
    });

}
