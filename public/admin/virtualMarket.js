$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function () {
    $('#trendyol-categories').select2({
        ajax: {
            url: '/virtual_market/getCategories', // Verilerin çekileceği URL
            dataType: 'json',
            processResults: function (data) {
                // API'den gelen verileri Select2 formatına dönüştürme
                return {
                    results: data.map(function (item) {
                        return {
                            id: item.virtual_market_category_id,
                            text: item.name
                        };
                    })
                };
            }
        },
        placeholder: 'Kategori seçiniz',
        minimumInputLength: 1 // En az bir karakter yazıldığında arama yapar
    });
});


$(document).ready(function () {
    $('#my-categories').select2({
        ajax: {
            url: '/virtual_market/myCategories', // Verilerin çekileceği URL
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
        minimumInputLength: 1 // En az bir karakter yazıldığında arama yapar
    });
});


$(document).ready(function () {

    $('#match-categories').on('click', function () {
        const trendyolCategories = $('#trendyol-categories').val();
        const myCategories = $('#my-categories').val();
        console.log('Eşleştirilen Kategoriler:', {trendyolCategories, myCategories});
        $.ajax({
            url: '/virtual_market/saveCompare', // İstek yapılacak URL
            type: 'POST', // İstek tipi (GET, POST, PUT, DELETE gibi)
            data:{trendyolCategories:trendyolCategories, myCategories: myCategories},
            success: function(response) {
                handleAlert(response);
            },
            error: function(xhr, status, error) {
                console.error('İstek hatası:', status, error);
            }
        });
    });
});


var table = $('#datatable').DataTable({
    scrollX: true,
    fixedHeader: true,
    processing: true,
    serverSide: true,
    bFilter: false,
    ajax: "/category/getcategory",
    columns: [
        {data: 'id', name: 'DT_RowIndex'},
        {data: 'name', name: 'name'},
        { // Parent name sütunu
            data: parent.name,
            name: 'parent_name',
            render: function (data, type, row, meta) {
                return row.parent ? row.parent.name : 'Ana Kategori';
            }
        },
        {data:'virtual_market_category_id',name:'virtual_market_category_id'},
        {
            data: 'id',
            name: 'delete',
            orderable: false,
            searchable: false,
            render: function (data, type, row, meta) {
                var a = '<span class="cursor-pointer p-2 hover:text-indigo-600 edit-button">' +
                    '<svg stroke="currentColor" fill="none"  stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em"  width="1em" xmlns="http://www.w3.org/2000/svg">' +
                    '<path stroke-linecap="round"  stroke-linejoin="round"  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>' +
                    '</svg>' +
                    '</span>';
                var b = '<span class="cursor-pointer p-2 hover:text-red-500 delete-button"  data-id="' + data + '">' +
                    '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em"  width="1em"  xmlns="http://www.w3.org/2000/svg">' +
                    '<path stroke-linecap="round"  stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>' +
                    '</svg>' +
                    '</span>';


                return '<div class="flex justify-end text-lg">' + a + ' ' + b + '</div>';
            }
        }
    ]
});


var table = $('#attributedatatable').DataTable({
    scrollX: true,
    fixedHeader: true,
    processing: true,
    serverSide: true,
    bFilter: false,
    ajax: "/product_attribute/getattribute",
    columns: [
        {data: 'id', name: 'DT_RowIndex'},
        {data: 'name', name: 'name'},
        { // Parent name sütunu
            data: parent.name,
            name: 'parent_name',
            render: function (data, type, row, meta) {
                return row.parent ? row.parent.name : 'Ana Kategori';
            }
        },
        {
            data: 'id',
            name: 'delete',
            orderable: false,
            searchable: false,
            render: function (data, type, row, meta) {
                var a = '<span class="cursor-pointer p-2 hover:text-indigo-600 edit-button">' +
                    '<svg stroke="currentColor" fill="none"  stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em"  width="1em" xmlns="http://www.w3.org/2000/svg">' +
                    '<path stroke-linecap="round"  stroke-linejoin="round"  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>' +
                    '</svg>' +
                    '</span>';
                var b = '<span class="cursor-pointer p-2 hover:text-red-500 delete-button"  data-id="' + data + '">' +
                    '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em"  width="1em"  xmlns="http://www.w3.org/2000/svg">' +
                    '<path stroke-linecap="round"  stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>' +
                    '</svg>' +
                    '</span>';


                return '<div class="flex justify-end text-lg">' + a + ' ' + b + '</div>';
            }
        }
    ]
});


$(document).ready(function () {
    $('#trendyol-attributes').select2({
        ajax: {
            url: '/virtual_market/getAttributes', // Verilerin çekileceği URL
            dataType: 'json',
            processResults: function (data) {
                // API'den gelen verileri Select2 formatına dönüştürme
                return {
                    results: data.map(function (item) {
                        return {
                            id: item.virtual_market_category_id,
                            text: item.name
                        };
                    })
                };
            }
        },
        placeholder: 'Kategori seçiniz',
        minimumInputLength: 1 // En az bir karakter yazıldığında arama yapar
    });
});


$(document).ready(function () {
    $('#my-attributes').select2({
        ajax: {
            url: '/virtual_market/myAttributes', // Verilerin çekileceği URL
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
        minimumInputLength: 1 // En az bir karakter yazıldığında arama yapar
    });
});



$('.virtualMarketList').on('change','.virtualMarketStatus',function () {
    var id = $(this).data('id');
    var is_active = $(this).data('is_active');
    $.ajax({
        type: 'POST',
        url: '/virtual_market/virtual_market_setting/companyStatusUpdate',  // Sunucuda işlenecek URL
        data: {
            id: id,
            is_active: is_active,
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