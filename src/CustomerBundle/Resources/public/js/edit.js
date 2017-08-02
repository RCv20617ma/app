$(document).ready(function(){
    $("input[type=tel]").intlTelInput({
        nationalMode: false,
        hiddenInput: "full_number",
        preferredCountries: ['ma', 'fr', 'es', 'us','it'],
    });
});
