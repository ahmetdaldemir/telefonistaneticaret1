$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});




$('#userBasic').click(function () {
    $('#saveFormButton').text('Kaydet');
    $('#ModalTitle').text('Kullanıcı Ekle');
})


$(function () {
    var table = $('#datatable').DataTable({
        scrollX: true,
        fixedHeader: true,
        processing: true,
        serverSide: true,
        bFilter: false,
        ajax: "/user/getUsers",
        columns: [
            {data: 'id', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {
                data: 'is_status',
                name: 'is_status',
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    var status= row.is_status == 1?'checked':'';
                    var a = '<label class="switcher" >'+
                        '<input type="checkbox" class="status-change" data-id="'+row.id+'" data-status="'+row.is_status+'" '+status+'>'+
                        '<span class="switcher-toggle"></span>'+
                        '</label>';
                    return a;
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
                    url: '/user/delete?id=' + id + '',
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

    // Silme butonuna tıklama olayını dinleme
    $('#datatable').on('click', '.status-change', function () {
        var id = $(this).data('id');
        var status = $(this).data('status');
        Swal.fire({
            title: "Eminmisiniz?",
            text: "Kullanıcının durumunu değiştirmek istediğinizden",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Evet!",
            cancelButtonText: "Hayır"
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: '/user/statusupdate?id=' + id + '&status='+status+'',
                    type: 'PUT',
                    success: function (result) {
                        table.ajax.reload(null, false);
                        Swal.fire('Güncellendi');
                    },
                    error: function (xhr, status, error) {
                        // Hata mesajını göster
                        Swal.fire('Güncelleme işlemi başarısız' + error);

                    }
                });

            }
        });
    });




    $('#datatable').on('click', '.edit-button', function () {
        var data = table.row($(this).closest('tr')).data();
        console.log(data);
        $('#saveFormButton').text('Düzenle');
        $('#ModalTitle').text('Kullanıcı Düzenle');

        $('#userBasic').modal('show');
        $('#userBasic #userForm').find('input#id').val(data.id);
        $('#userBasic #userForm').find('input#name').val(data.name);
        $('#userBasic #userForm').find('input#email').val(data.email);
        $('#userBasic #userForm').find('input#password1').val(data.password);
    });
});



