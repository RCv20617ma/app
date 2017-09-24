$(document).ready(function(){
    function intlTelInput($selector) {
        $($selector).intlTelInput({
            nationalMode: false,
            hiddenInput: "full_number",
            preferredCountries: ['ma', 'fr', 'es', 'us','it'],
        });
    }

    intlTelInput("input[type=tel]");

    /** add phone input */
    var $phoneAdd = $('<a href="#" class="btn btn-primary btn-xs pull-right" role="button"><i class="fa fa-plus" ></i></a>');
    var $collectionCustomerPhoneHolder = $('#customer_phones');
    $collectionCustomerPhoneHolder.append($phoneAdd);
    $collectionCustomerPhoneHolder.data('index', $collectionCustomerPhoneHolder.find(':input').length);

    $phoneAdd.on('click', function(e) {
        e.preventDefault();
        addCustomerPhoneForm($collectionCustomerPhoneHolder, $phoneAdd);
    });

    // add a delete link to all of the existing tag form li elements
    $collectionCustomerPhoneHolder.find('div.customer-phone-block').each(function() {
        addFormDeleteLink($(this));
    });

    function addCustomerPhoneForm() {
        var prototype = $collectionCustomerPhoneHolder.data('prototype');
        var index = $collectionCustomerPhoneHolder.data('index');

        // Replace '__name__' in the prototype's HTML to
        var newForm = prototype.replace(/__name__/g, index);

        $collectionCustomerPhoneHolder.data('index', index + 1);

        var $newFormBlock = $('<div class="customer-phone-block"></div>').append(newForm);
        intlTelInput($newFormBlock.find("input[type=tel]"));
        $phoneAdd.before($newFormBlock);
        addFormDeleteLink($newFormBlock);
    }

    /** add Email input */
    var $emailAdd = $('<a href="#" class="btn btn-primary btn-xs pull-right" role="button"><i class="fa fa-plus" ></i></a>');
    var $collectionCustomerEmailHolder = $('#customer_emails');
    $collectionCustomerEmailHolder.append($emailAdd);
    $collectionCustomerEmailHolder.data('index', $collectionCustomerEmailHolder.find(':input').length);

    $emailAdd.on('click', function(e) {
        e.preventDefault();
        addCustomerEmailForm($collectionCustomerEmailHolder, $emailAdd);
    });

    // add a delete link to all of the existing tag form li elements
    $collectionCustomerEmailHolder.find('div.customer-email-block').each(function() {
        addFormDeleteLink($(this));
    });

    function addCustomerEmailForm() {
        var prototype = $collectionCustomerEmailHolder.data('prototype');
        var index = $collectionCustomerEmailHolder.data('index');

        // Replace '__name__' in the prototype's HTML to
        var newForm = prototype.replace(/__name__/g, index);

        $collectionCustomerEmailHolder.data('index', index + 1);

        var $newFormBlock = $('<div class="customer-email-block"></div>').append(newForm);
        $emailAdd.before($newFormBlock);
        addFormDeleteLink($newFormBlock);
    }

    //////////////////////
    function addFormDeleteLink($formBlock) {
        var $removeFormLink = $('<a href="#" class="btn-xs btn-danger" ><i class="fa fa-minus" ></i></a>');
        $formBlock.find('.button-container').html($removeFormLink);
        $removeFormLink.on('click', function(e) {
            // prevent the link from creating a "#" on the URL
            e.preventDefault();

            $formBlock.remove();
        });
    }

    // unCheck all mains checkbox main and check this
    $('.customer-email-main, .customer-phone-main').on('change', function(e) {
        var currentClass = $(this).attr('class');
        $('.'+currentClass).prop('checked', false);
        $(this).prop( "checked", true );
    });


});
