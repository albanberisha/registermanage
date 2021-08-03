$(function() {

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $('#wide-class').addClass('col-md-6 col-md-offset-3');

        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $('#wide-class').removeClass('col-md-6 col-md-offset-3');
        $(this).addClass('active');
        e.preventDefault();
    });

});