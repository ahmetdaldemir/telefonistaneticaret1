$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {

    document.addEventListener('DOMContentLoaded', function () {
        // HTML'deki gizli input alanlarından değerleri alın
        var productBrand = document.getElementById('productBrand').value;
        var productModel = document.getElementById('productModel').value;

        getModel(productBrand, productModel);
    });

    function getModel(brand, model) {
        if (brand != 0) {
            getBrand(brand); // getBrand fonksiyonunu çağırın

            // `setTimeout` kullanarak `val` ve `trigger` işlemlerinin yapılmasını sağlıyoruz
            setTimeout(function () {
                $('#model').val(model);
                console.log("Value set to:", $('#model').val()); // Seçim kutusunun değerini loglayın
                $('#model').trigger('change');
            }, 1000); // 100 ms gecikme
        }
    }

    $('#model').on('change', function () {
        console.log("Model changed to:", $(this).val());
    });



    $(document).ready(function () {

        $('.product-categories').select2({
            ajax: {
                url: '/product/getCategories', // Verilerin çekileceği URL
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return {
                                id: item.id,
                                text: item.name
                            };
                        })
                    };
                }
            },
            placeholder: 'Kategori seçiniz',
            minimumInputLength: 3 // En az bir karakter yazıldığında arama yapar
        });
    });


    $('#product-list-data-table').DataTable();

    $('select').select2();



});


function priceStockUpdate() {
    // Seçili inputların value değerlerini al
    var selectedProducts = $('.productList input[name="product_id"]:checked').map(function() {
        return $(this).val();
    }).get();

    if (selectedProducts.length > 0) {
        // Seçili ürün ID'lerini cache (localStorage) içine kaydet
        localStorage.setItem('selectedProductIds', JSON.stringify(selectedProducts));

        // Modal içeriğini güncelle
        $('#selectedProductsList').html(selectedProducts.join(', '));

        // Modalı aç
        $('#priceStockUpdate').modal('show');
    } else {
        Swal.fire('Lütfen en az bir ürün seçiniz.');
    }
}

function updatePriceStock() {
    // Cache'den seçilen ürün ID'lerini al
    var selectedProductIds = JSON.parse(localStorage.getItem('selectedProductIds'));

    if (selectedProductIds && selectedProductIds.length > 0) {
        // AJAX isteği ile sunucuya gönder
        $.ajax({
            type: 'POST',
            url: '/product/update_price_stock',  // Sunucuda işlenecek URL
            data: {
                product_ids: selectedProductIds,
                retail_price: $('#priceStockUpdate').find('input[name=retail_price]').val(),
                price:  $('#priceStockUpdate').find('input[name=price]').val(),
                quantity:  $('#priceStockUpdate').find('input[name=quantity]').val(),
            },
            success: function(response) {
                Swal.fire({
                    title: ''+response.title+'',
                    text: response.message,
                    icon: ''+response.icon+'',
                    timer: 3000,
                    showConfirmButton: false
                }).then(() => {
                    if(response.succcess)
                    {
                        localStorage.removeItem('selectedProductIds');
                        location.reload();
                    }
                });

             },
            error: function(xhr, status, error) {
                console.error('Fiyat ve stok güncelleme hatası:', error);
                Swal.fire('Güncelleme sırasında bir hata oluştu.');

            }
        });
    } else {
        Swal.fire('Güncellemek için herhangi bir ürün seçilmedi.');
    }
}

$('.productList').on('change','.productStatus',function () {
    var id = $(this).data('id');
    var is_active = $(this).data('is_active');
    $.ajax({
        type: 'POST',
        url: '/product/update_variant_status',  // Sunucuda işlenecek URL
        data: {
            id: id,
            is_active: is_active,
        },
        success: function(response) {
            Swal.fire({
                title: ''+response.title+'',
                text: response.message,
                icon: ''+response.icon+'',
                timer: 3000,
                showConfirmButton: false
            }).then(() => {

            });

        },
        error: function(xhr, status, error) {
            console.error('Durum güncelleme hatası:', error);
            Swal.fire('Durum bir hata oluştu.');

        }
    });
})