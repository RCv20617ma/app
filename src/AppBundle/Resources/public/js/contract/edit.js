$('#contract_startDate').datetimepicker({
    locale: appLocale,
    sideBySide: true,
    minDate: new Date(),
    format: 'DD/MM/YYYY HH:mm',
    stepping: 15
});

$('#contract_endDate').datetimepicker({
    locale: appLocale,
    sideBySide: true,
    minDate: new Date(),
    format: 'DD/MM/YYYY HH:mm',
    stepping: 15
});

$('#contract_startDate').on('dp.change', function (e) {
    calculateDiff();
    $('#contract_endDate').data('DateTimePicker').minDate(e.date);
});
$('#contract_endDate').on('dp.change', function (e) {
    calculateDiff();
    $('#contract_startDate').data('DateTimePicker').maxDate(e.date);
});

function calculateDiff() {
    var start = $('#contract_startDate').data("DateTimePicker").date();
    var end = $('#contract_endDate').data("DateTimePicker").date();
    var timeDiff = 0;
    if (end) {
        timeDiff = (end - start) / 1000;
    }
    var DateDiff = Math.floor(timeDiff / (60 * 60 * 24));
    var hourDiff = (timeDiff - (DateDiff * (60 * 60 * 24))) / 3600;
    if (hourDiff > 2) {
        DateDiff = DateDiff + 1;
    }
    $('#contract_numberDays').val(DateDiff);
}


$(".contract_fuelLevel_icon")
    .mouseenter(function() {
        if($('#contract_fuelLevel').val() != $(this).attr('data-value')) {
            $(this).addClass('text-success')
            $(this).removeClass('text-muted')
        }
    })
    .mouseleave(function() {
        if($('#contract_fuelLevel').val() != $(this).attr('data-value')) {
            $(this).removeClass('text-success')
            $(this).addClass('text-muted')
        }
    })
    .click(function () {
        $(".contract_fuelLevel_icon").removeClass('text-success')
        $(".contract_fuelLevel_icon").addClass('text-muted')
        $(this).addClass('text-success')
        $('#contract_fuelLevel').val($(this).attr('data-value'))
    })
;

$("#contract_car").on('change', function (e) {
    var selectedId = $(this).val();
    $.get(Routing.generate('api_car_get', {id: selectedId}), function (data) {
        $("#contract_priceDay").val(data['price_day']);
        $("#contract_startKms").val(data['current_km']);
    }).fail(function() {
        alert(failMsg);
    });
});