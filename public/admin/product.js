document.addEventListener('DOMContentLoaded', function() {
    // HTML'deki gizli input alanlarından değerleri alın
    var productBrand = document.getElementById('productBrand').value;
    var productModel = document.getElementById('productModel').value;

    getModel(productBrand, productModel);
});

function getModel(brand, model) {
    if (brand != 0) {
        getBrand(brand); // getBrand fonksiyonunu çağırın

        // `setTimeout` kullanarak `val` ve `trigger` işlemlerinin yapılmasını sağlıyoruz
        setTimeout(function() {
            $('#model').val(model);
            console.log("Value set to:", $('#model').val()); // Seçim kutusunun değerini loglayın
            $('#model').trigger('change');
        }, 1000); // 100 ms gecikme
    }
}

$('#model').on('change', function() {
    console.log("Model changed to:", $(this).val());
});

$('#brand').change(function () {
    $('#model').html('');
    getBrand($(this).val());
})

function getBrand(id) {
    $.ajax({
        url: '/model/getBrand?id=' + id + '', // İstek yapılacak URL
        type: 'GET', // İstek tipi (GET, POST, PUT, DELETE gibi)
        success: function (response) {
            $.each(response, function (i, v) {
                $('#model').append('<option value="' + v.id + '">' + v.name + '</option>');
            })
        },
        error: function (xhr, status, error) {
            // İstek başarısız olduğunda çalışacak fonksiyon
            console.error('İstek hatası:', status, error);
        }
    });
}


$('#product-list-data-table').on('change', '#mounthdeal', function () {

    var id = $(this).data('id');
    var status = $(this).data('status');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/product/mounthdeal/' + id + '/' + status + '', // İstek yapılacak URL
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            handleAlert(response);
        },
        error: function (xhr, status, error) {
            handleAlert(xhr.responseJSON);

        }
    });

})

$('#product-list-data-table').on('change', '#freeShipping', function () {

    var id = $(this).data('id');
    var status = $(this).data('status');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/product/update/' + id + '', // İstek yapılacak URL
        type: 'POST',
        data: {
            freeShipping: status
        },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            handleAlert(response);
        },
        error: function (xhr, status, error) {
            handleAlert(xhr.responseJSON);

        }
    });

})




