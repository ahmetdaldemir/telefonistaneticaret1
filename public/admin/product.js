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


$('#brand').change(function () {
    $('.jsonBody').empty();
    var val = $(this).val();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/product/getVirtualBrandList?id=' + val + '', // İstek yapılacak URL
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            if (response.length > 0) {
                // Initialize the options string with a default option
                var options = '<option selected>Choose a country</option>';

                // Append options from the response to the options string
                $.each(response, function (i, v) {
                    options += '<option value="' + v.id + '">' + v.name + '</option>';
                });

                // Create the HTML for the card body and insert the options into the select
                var trendyolHtml = `
                            <div class="card-body">
                                <h5>Trendyol Markalar</h5>
                                <div class="form-item vertical">
                                    <select class="input" name="virtualBrand[trendyol][0]">
                                        ${options}
                                    </select>
                                </div>
                            </div>
                        `;

                // Update the .jsonBody element with the new HTML
                $('.jsonBrandBody').html(trendyolHtml);
            }

        },
        error: function (xhr, status, error) {
            handleAlert(xhr.responseJSON);
        }
    });
})

$('#category').change(function () {
    $('.jsonBody').empty();
    var val = $(this).val();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/product/getVirtualAttributeList?id=' + val,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            var length = Object.keys(response).length;
            if (length > 0) {
                var trendyolHtml = '<div class="card-body"><h4>Trendyol Özellikler</h4>';

                $.each(response, function (a, b) {
                    var title = b.attribute.name;
                    var options = `<option selected>${title}</option>`;
                    $.each(b.attributeValues, function (i, v) {
                        options += '<option value="' + v.id + '">' + v.name + '</option>';
                    });
                    var attributeId =b.attribute.id;
                     trendyolHtml += `
                        <div class="form-item vertical">
                        <input type="hidden" value="${attributeId}" name="virtualAttribute[trendyol][${a}]['Id]">
                            <select class="input" name="virtualAttributeValue[trendyol][${a}]['Id]">
                                ${options}
                            </select>
                        </div>
                    `;
                });

                trendyolHtml += '</div>'; // Closing the card-body div
                $('.jsonCategoryBody').html(trendyolHtml);
            }
        },
        error: function (xhr, status, error) {
            handleAlert(xhr.responseJSON);
        }
    });
});






