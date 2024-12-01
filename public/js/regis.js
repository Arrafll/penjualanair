$('.regis-form').each(function(){
    $(this).on('keyup', function(){
        $(this).removeClass('is-invalid');
    });
});

$('#registration-form').on('submit', function(event){
    if(!$('#checkbox-terms-regis').prop('checked')) {
        $('#alert-danger-register').removeClass('d-none')
        event.preventDefault();    
    } else {
        $('#alert-danger-register').addClass('d-none')
    }

})

//#terms-condition-regis