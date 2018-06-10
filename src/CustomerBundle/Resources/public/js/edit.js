$(document).ready(function () {
    /*
     function intlTelInput($selector) {
         $($selector).intlTelInput({
             nationalMode: false,
             hiddenInput: "full_number",
             preferredCountries: ['ma', 'fr', 'es', 'us','it'],
         });
     }

     intlTelInput("input[type=tel]");


     // RealEstate translation collection management
     var $addcustomerPhoneLink = $('<a href="#" class="btn btn-primary" role="button"><i class="fa fa-plus" ></i></a>');
     var $newcustomerPhoneLink = $('<div class="text-center"></div>').append($addcustomerPhoneLink);
     var $collectionCustomerPhoneHolder = $('#customer_phones');

     // add the "add a tag" anchor and li to the tags ul
     $collectionCustomerPhoneHolder.append($newcustomerPhoneLink);

     // count the current form inputs we have (e.g. 2), use that as the new
     // index when inserting a new item (e.g. 2)
     $collectionCustomerPhoneHolder.data('index', $collectionCustomerPhoneHolder.find(':input').length);

     $addcustomerPhoneLink.on('click', function (e) {
         // prevent the link from creating a "#" on the URL
         e.preventDefault();
         // add a new tag form (see next code block)
         addcustomerPhoneForm($collectionCustomerPhoneHolder, $newcustomerPhoneLink);
     });

     // add a delete link to all of the existing tag form li elements
     $collectionCustomerPhoneHolder.find('div.customer-phone-block').each(function () {
         addcustomerPhoneFormDeleteLink($(this));
     });

     function addcustomerPhoneForm() {
         // Get the data-prototype explained earlier
         var prototype = $collectionCustomerPhoneHolder.data('prototype');

         // get the new index
         var index = $collectionCustomerPhoneHolder.data('index');

         // Replace '__name__' in the prototype's HTML to
         // instead be a number based on how many items we have
         var newForm = prototype.replace(/__name__/g, index);

         // increase the index with one for the next item
         $collectionCustomerPhoneHolder.data('index', index + 1);

         // Display the form in the page, before the "Add" button
         var $newFormBlock = $('<div class="customer-phone-block"></div>').append(newForm);
         intlTelInput($newFormBlock.find("input[type=tel]"));

         $newcustomerPhoneLink.before($newFormBlock);

         // add a delete link to the new form
         addcustomerPhoneFormDeleteLink($newFormBlock);
     }

     function addcustomerPhoneFormDeleteLink($formBlock) {
         var $removeFormLink = $('<a href="#" ><i class="fa fa-minus" ></i></a>');

         $formBlock.find('.button-container').html($removeFormLink);

         $removeFormLink.on('click', function (e) {
             // prevent the link from creating a "#" on the URL
             e.preventDefault();

             $formBlock.remove();
         });
     }
 */

    $('#customer_documents').on('change', 'input[type=file]', function () {
        $fileChanged = $(this).parents('.block_document').find('.file_changed');
        $fileChanged.val(0);
    });

});
