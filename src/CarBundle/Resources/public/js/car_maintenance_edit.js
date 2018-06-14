$(document).ready(function () {

    var $container = $('div#car_maintenance_outgo');
    var index = $container.find(':input').length;
    $('#add_outgo').click(function (e) {
        addPaymentOutgo($container);
        e.preventDefault();
        return false;
    });

    function addPaymentOutgo($container) {
        var template = $container.attr('data-prototype')
            .replace(/__name__label__/g, 'Payment Outgo n°' + (index + 1))
            .replace(/__name__/g, index)
        ;
        var $prototype = $(template);
        addDeleteLink($prototype);
        $container.append($prototype);
        index++;
    }

    function addDeleteLink($prototype) {
        var $deleteLink = $('<a href="#" class="btn btn-danger pull-right"><i class="fa fa-trash" ></i></a>');
        $prototype.find('.button-container').html($deleteLink);
        $deleteLink.click(function (e) {
            $prototype.remove();
            e.preventDefault();
            return false;
        });
    }
});