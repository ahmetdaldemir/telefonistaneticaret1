var csrfToken = $('meta[name="csrf-token"]').attr('content');

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

    $(document).ready(function () {
        $('.product-categories').select2({
            ajax: {
                url: '/product/getCategories', // Verilerin çekileceği URL
                dataType: 'json',
                processResults: function (data) {
                    // API'den gelen verileri Select2 formatına dönüştürme
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


    $('#categories').change(function () {
        $('#required-true').empty();
        $('#required-false').empty();
        var val = $(this).val();
        $.ajax({
            url: '/product/getAttributeList?id=' + val,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                const variantArray = [];
                var length = Object.keys(response).length;
                if (length > 0) {
                    $('.required-false-preview').addClass('required-false-preview-hide');
                    const requiredTrueDiv = document.getElementById('required-true');
                    const requiredFalseDiv = document.getElementById('required-false');
                    itemDiv = '';
                    response.forEach(item => {
                        const itemDiv = document.createElement('div');
                        itemDiv.className = 'col-span-1';
                        itemDiv.innerHTML = `<label class="form-label mb-2">${item.name}</label>`;
                        if (item.attributeValues.length > 0) {
                            const selectBox = document.createElement('select');
                            selectBox.required = item.required === "true"; // Set the required attribute based on item.required
                            selectBox.className = "input";
                            selectBox.name = "attribute[]";
                            selectBox.dataset.slicer = item.slicer;
                            selectBox.dataset.varianter = item.varianter;
                            selectBox.dataset.id = item.id;
                            selectBox.dataset.name = item.name;
                            if (item.slicer === 'true' || item.varianter === 'true') {
                                selectBox.multiple = true; // Multiple selection for varianter or slicer
                                selectBox.classList.add('varianterPayload'); // Add class for varianter or slicer
                            }
                            item.attributeValues.forEach(val => {
                                const option = document.createElement('option');
                                option.value = val.id;
                                option.textContent = val.name;
                                selectBox.appendChild(option);
                            });
                            itemDiv.appendChild(selectBox);
                        } else {
                            if (item.slicer === 'true' || item.varianter === 'true') {
                                var newClass = (item.required) ? 'varianterPayload' : '';
                            }
                            var required = (item.required) ? 'required' : '';
                            var tagId = 'tags' + item.id;
                            itemDiv.innerHTML += '<input name="attribute[]" id="' + tagId + '" data-slicer="' + item.slicer + '" data-name="' + item.name + '" data-id="' + item.id + '"  data-varianter="' + item.varianter + '"  data-role="tagsinput" class="input ' + newClass + '" ' + required + '/>';
                        }

                        if (item.required === "true" && (item.slicer === "true" || item.varianter === "true")) {
                            requiredTrueDiv.appendChild(itemDiv);
                            variantArray.push({
                                'id': item.name, 'value': item.name, 'slicer': item.slicer,
                                'varianter': item.varianter,
                                'data': ''
                            });
                        } else {
                            requiredFalseDiv.appendChild(itemDiv);
                        }

                        // Tagsinput'i input elementlerine uygulayın
                        var tagInput = $('#tags' + item.id);
                        tagInput.tagsinput({
                            confirmKeys: [44, 32], // Virgül (44) ve Boşluk (32) tuşları
                            tagClass: 'badge bg-info',
                            allowDuplicates: true,
                            cancelConfirmKeysOnEmpty: true
                        });

                        // Select2'yi select elementlerine uygulayın
                        if (item.varianter === "true" || item.slicer === "true") {
                            $('select').select2();
                        }
                    });
                    variant(val, variantArray,0);
                }else {
                    variant(val, variantArray,1);
                }
            },
            error: function (xhr, status, error) {
                handleAlert(xhr.responseJSON);
            }
        });
    });


    function variant(selectedCategoryId, variantArray,dataset) {
        localStorage.setItem('selectedCategoryId', selectedCategoryId);



        $.ajax({
            url: '/product/getCategoryDetails?id=' + selectedCategoryId+'&dataSet='+dataset+'', // Kategori detaylarını getirecek URL
            type: 'POST',
            data: {variants: variantArray},
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                $('.required-false-preview-category').addClass('required-false-preview-hide');
                $('#category-details').html(response);
            },
            error: function (xhr, status, error) {
                console.log("Bir hata oluştu: " + error);
            }
        });
    }




});

$(document).ready(function () {
    var variantArray = [];
    var selectedCategoryId = localStorage.getItem('selectedCategoryId');

    $('body').on('change', '.varianterPayload', function () {
        // Değişiklik olduğunda variantArray'ı temizle
        variantArray = [];

        // .varianterPayload sınıfına sahip tüm elementleri gez
        $('.varianterPayload').each(function () {
            var item = $(this);
            console.log(item.val());
            variantArray.push({
                'id': item.data('id'), // veya item.data('id') gibi, ihtiyacınıza göre düzenleyin
                'value': item.data('name'), // veya item.data('id') gibi, ihtiyacınıza göre düzenleyin
                'slicer': item.data('slicer'), // veya item.data('id') gibi, ihtiyacınıza göre düzenleyin
                'varianter': item.data('varianter'), // veya item.data('id') gibi, ihtiyacınıza göre düzenleyin
                'name': item.data('name'), // veya item.data('id') gibi, ihtiyacınıza göre düzenleyin
                'data': Array.isArray(item.val()) ? item.val() : item.val().split(',')
            });
        });

        // AJAX isteğini gönder
        $.ajax({
            url: '/product/getCategoryDetails?id=' + selectedCategoryId+'&dataSet=1', // Kategori detaylarını getirecek URL
            type: 'POST',
            contentType: 'application/json', // Gönderilecek verinin türü JSON olarak belirlenir
            data: JSON.stringify({variants: variantArray}), // Gönderilecek veri JSON string olarak
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                $('.required-false-preview-category').addClass('required-false-preview-hide');
                $('#category-details').html(response);
            },
            error: function (xhr, status, error) {
                console.log("Bir hata oluştu: " + error);
            }
        });
    });
});

