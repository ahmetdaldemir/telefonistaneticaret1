$(document).ready(function(){
    $('#orderTrackingForm').submit(function(e){
        e.preventDefault(); // Formun normal submit işlemini engelle
        var formData = $(this).serialize(); // Form verilerini al
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'), // Formun action özelliğine göre URL'ye istek yap
            data: formData, // Form verilerini isteğe ekle
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {

                $(this).prev().html(' <div class="alert__wrapper">\n' +
                    '                                <div class="alert alert-danger alert-dismissible fade show" role="alert">\n' +
                    '                                    '+response+'\n' +
                    '                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>\n' +
                    '                                </div>\n' +
                    '                            </div>');
            },
            error: function(xhr, status, error) {
                // İstek başarısız olduğunda burası çalışır
                console.error('İstek hatası:', status, error);
            }
        });
    });
});
