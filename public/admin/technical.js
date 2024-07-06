
    $('.side-nav').addClass('side-nav-collapsed');

$('body #priceUpdate').click(function () {
    $('#technicalUpdateForm').find("#id").val($(this).data("id"));
});

    $(document).ready(function(){
        $(document).on('change','#statusSelect',function(){
            var id = $(this).data('id');
            var selectedValue = $(this).val();
            $.ajax({
                url: '/order/technicalOrder_status?id='+id+'&value='+selectedValue,
                type: 'GET',
                success: function(response) {
                  handleAlert(response);
                },
                error: function(xhr, status, error) {
                    console.error('İstek hatası:', status, error);
                }
            });
        });
    });
