var csrfToken = $('meta[name="csrf-token"]').attr('content');
var product_id = $('input[name="id"]').val();
$(function () {

    var product_categories = $('.product-categories');
    var product_list_data_table = $('#product-list-data-table');
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


    product_list_data_table.on('change', '#mounthdeal', function () {

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

    product_list_data_table.on('change', '#freeShipping', function () {

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

    $(document).ready(function () {
        var productId = product_categories.data('id'); // data-id değerini alır

        $.ajax({
            url: '/product/getCategory?id=' + productId,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                var selectedCategory = response; // Backend'den gelen kategori verisi
                if (selectedCategory) {
                    var option = new Option(selectedCategory.name, selectedCategory.category_id, true, true);
                    product_categories.append(option).trigger('change');
                }
            }
        });

        product_categories.select2({
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
            disabled: true,
            placeholder: 'Kategori seçiniz',
            minimumInputLength: 3 // En az üç karakter yazıldığında arama yapar
        });
    });


    $('#categories').change(function () {
        $('#required-true').empty();
        $('#required-false').empty();
        var val = $(this).val();
        $.ajax({
            url: '/product/getAttributeListEdit?id=' + val + '&product_id=' + product_id,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                var length = Object.keys(response).length;
                console.log(length);

                if (length > 0) {
                    $('.required-false-preview').addClass('required-false-preview-hide');
                    const requiredTrueDiv = document.getElementById('required-true');
                    const requiredFalseDiv = document.getElementById('required-false');
                    var i = 0;
                    if (!Array.isArray(response)) {
                        response = [response];
                    }
                    response.forEach(item => {
                        const itemDiv = document.createElement('div');
                        itemDiv.className = 'col-span-1';
                        itemDiv.innerHTML = `
                        <label class="form-label mb-2">
                            ${item.name} ${item.required === true || item.required === "true" ? '*' : ''}
                        </label>
                    `;

                        if (item.attributeValues.length > 0) {
                            const selectBox = document.createElement('select');
                            selectBox.required = item.required === "true"; // Set the required attribute based on item.required
                            selectBox.className = "input";
                            selectBox.name = `attribute[${i}][${item.id}]`;
                            selectBox.dataset.slicer = item.slicer;
                            selectBox.dataset.varianter = item.varianter;
                            selectBox.dataset.id = item.id;
                            selectBox.dataset.name = item.name;
                            if (item.slicer === 'true' || item.varianter === 'true') {
                                selectBox.multiple = true; // Multiple selection for varianter or slicer
                             }
                            item.attributeValues.forEach(val => {
                                const option = document.createElement('option');
                                option.value = val.id;
                                option.textContent = val.name;

                                // Eğer selectedattributeValue objesindeki attribute ve attribute_values eşleşiyorsa selected ekle
                                if (val.id == ''+item.selectedattributeValue.attribute_values+'') {
                                    option.selected = true;
                                }

                                selectBox.appendChild(option);
                            });



                            itemDiv.appendChild(selectBox);
                        } else {
                            var newClass = (item.required) ? 'varianterPayload' : '';
                            var required = (item.required) ? 'required' : '';
                            var tagId = 'tags' + item.id;

                            itemDiv.innerHTML += '<input name="attribute[' + i + '][' + item.id + ']" id="' + tagId + '" data-slicer="' + item.slicer + '" data-name="' + item.name + '" data-id="' + item.id + '"  data-varianter="' + item.varianter + '"  data-role="tagsinput" class="input ' + newClass + '" ' + required + '/>';
                        }

                        if (item.required === "true" && item.slicer === "false") {
                            requiredTrueDiv.appendChild(itemDiv);
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

                        i++; // Increment the index after each iteration
                    });
                }
            },
            error: function (xhr, status, error) {
                handleAlert(xhr.responseJSON);
            }
        });
    });



});




