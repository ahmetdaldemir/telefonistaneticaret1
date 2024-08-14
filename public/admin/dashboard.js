$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function() {
    // Datepicker ayarları
    $('#start_date, #end_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    // Başlangıçta grafik oluştur
    var salesChart = new ApexCharts(document.querySelector("#sales-chart"), {
        chart: {
            type: 'line',
            height: 350
        },
        series: [],
        xaxis: {
            categories: []
        }
    });

    salesChart.render();

    chechData();

    function chechData()
    {
        var startDate = $('input[name=start_date]').val();
        var endDate = $('input[name=end_date]').val();
        $.ajax({
            url: '/dashboard_data',
            method: 'POST',
            data: {
                start_date: startDate,
                end_date: endDate
            },
            success: function(data) {
                var categories = data.map(item => item.date);
                var seriesData = data.map(item => item.total);

                salesChart.updateOptions({
                    xaxis: {
                        categories: categories
                    },
                    series: [{
                        name: 'Toplam Satış',
                        data: seriesData
                    }]
                });
            }
        });
    }


    // Filtre butonuna tıklandığında
    $('#filter').on('click', function() {
        chechData();
    });
});
