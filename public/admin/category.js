$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});




$('#categoryBasic').click(function () {
    $('#saveFormButton').text('Kaydet');
    $('#ModalTitle').text('Kategori Ekle');
})


$(function () {
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
                render: function(data, type, row, meta) {
                    return row.parent?row.parent.name: 'Ana Kategori';
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

    $('#datatable').on('click', '.edit-button', function () {
        var data = table.row($(this).closest('tr')).data();
        console.log(data);
        $('#saveFormButton').text('Düzenle');
        $('#ModalTitle').text('Kategori Düzenle');

        $('#categoryBasic').modal('show');
        $('#categoryBasic #categoryForm').find('input#id').val(data.id);
        $('#categoryBasic #categoryForm').find('input#name').val(data.names);
        $('#categoryBasic #categoryForm select#parent_id').val(data.parent?data.parent.id:0).trigger('change');

    });
});



