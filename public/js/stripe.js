var $form = $('#payment-form');

$form.submit(function (event) {
    $form.find('button').prop('disable', true);

})

