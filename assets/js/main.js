$(document).ready(function () {
    $("#email").submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: form.serialize(),
        })
            .done(function (data) {
                $("#response").html(data);
                document.getElementById("email").reset();
                setTimeout(function () {
                    $('#return').fadeOut('fast');
                }, 10000);
            })
            .fail(function () {
                console.log("Form not sent! Please try again!");
            });
    });
});