$(document).ready(function () {
    function intlTelInput($selector) {
        $($selector).intlTelInput({
            utilsScript: vendorDir + "/intl-tel-input/build/js/utils.js?13",
            nationalMode: false,
            hiddenInput: "full_number",
            preferredCountries: ['ma', 'fr', 'es', 'us', 'it'],
        });
    }

    intlTelInput("input[type=tel]");

    var phone_container = $('div#customer_phones');
    var index = phone_container.find(':input').length;
    $('#add_phone').click(function (e) {
        addField(phone_container);
        e.preventDefault();
        return false;
    });

    var email_container = $('div#customer_emails');
    var index = email_container.find(':input').length;
    $('#add_email').click(function (e) {
        addField(email_container);
        e.preventDefault();
        return false;
    });

    function addField($container) {
        var template = $container.attr('data-prototype')
            .replace(/__name__/g, index)
        ;
        var $prototype = $(template);
        $container.append($prototype);
        intlTelInput("input[type=tel]");
        index++;
    }

    $('body').on('click', '.btnDelete', function (e) {
        e.preventDefault();
        $(this).parents(".fieldRow").remove();
    });
});
