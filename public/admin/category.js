$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#categoryBasic').click(function () {
    $('#saveFormButton').text('Kaydet');
    $('#ModalTitle').text('Kategori Ekle');
})


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
    minimumInputLength: 3
});


$(document).ready(function () {

    $('.parent_id').select2({
        ajax: {
            url: '/category/getCategoryList', // Verilerin çekileceği URL
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
        minimumInputLength: 3
    });
});
$(function () {
    var table = $('#datatable').DataTable({
        scrollX: true,
        fixedHeader: true,
        processing: true,
        serverSide: true,
        bFilter: false,
        ajax: {
            url: "/category/getcategory",
            dataSrc: function (json) {
                if (json.recordsTotal === 0) {
                    // Tabloyu kaldır ve resim göster
                    $('#datatable_wrapper').remove(); // DataTable'ı sarıcı ile birlikte kaldır
                    $('#no-data-image').show(); // Resmi göster
                } else {
                    $('#no-data-image').hide(); // Eğer veri varsa resimi gizle
                }
                return json.data; // DataTable'ın verileri işlemesi için geri dön
            }
        },
        columns: [
            {data: 'id', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {
                data: 'parent.name',
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
                    var editButton = '<a href="/category/edit?id='+data+'" class="cursor-pointer p-2 hover:text-indigo-600">' +
                        '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">' +
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>' +
                        '</svg>' +
                        '</a>';
                    var deleteButton = '<span class="cursor-pointer p-2 hover:text-red-500 delete-button" data-id="' + data + '">' +
                        '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">' +
                        '<path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>' +
                        '</svg>' +
                        '</span>';

                    return '<div class="flex justify-end text-lg">' + editButton + ' ' + deleteButton + '</div>';
                }
            }
        ]
    });


    // Silme butonuna tıklama olayını dinleme
    $('#datatable').on('click', '.delete-button', function () {
        var id = $(this).data('id');
        Swal.fire({
            title: "Eminmisiniz?",
            text: "Silinen kategoriler alt kategorileri ile birlikte silinecektir.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Evet Silmek İstiyorum !",
            cancelButtonText: "Hayır"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: '/category/delete?id=' + id + '',
                    type: 'DELETE',
                    success: function (result) {
                        table.ajax.reload(null, false);
                        Swal.fire('Silindi');
                    },
                    error: function (xhr, status, error) {
                        // Hata mesajını göster
                        Swal.fire('Silme işlemi başarısız' + error);

                    }
                });

            }
        });
    });


});


$('select[name=categories]').attr('required', 'required').empty();
$('#out_category').change(function () {
    var isChecked = $(this).is(':checked');
    var select = $('select[name=categories]');
    select.attr('disabled', isChecked).removeAttr('required').empty();
    if (!isChecked) {
        select.attr('required', 'required').empty();
    }
});


window.addEventListener('scroll', function() {
    var div = document.getElementById('stickyFooter'); // İzlemek istediğiniz div'in ID'si
    var scrollPosition = window.scrollY; // Sayfanın dikey kaydırma pozisyonu
    var divOffsetTop = div.offsetTop; // Div'in üstten olan mesafesi
    var offset = 400; // Ne kadar daha yukarıda devreye girmesini istediğinizi belirleyen piksel değeri

    if (scrollPosition > (divOffsetTop - offset)) {
        div.classList.add('border-t', 'bg-white', 'dark:bg-gray-800', 'border-gray-200', 'dark:border-gray-700'); // Eklemek istediğiniz sınıflar
    } else {
        // Scroll container dışına çıktığında classları kaldır
        div.classList.remove('border-t', 'bg-white', 'dark:bg-gray-800', 'border-gray-200', 'dark:border-gray-700');
    }
});
