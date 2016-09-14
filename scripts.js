$(document).ready(function(){
    $('input.date').focusin(function() {
        $('.tooltip').show();
    });
    $('input.date').focusout(function() {
        $('.tooltip').hide();
    })
});