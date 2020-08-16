
$(document).ready(function () {
    
    $("button").click(function () {
        usuario_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "controllers/LicenseConfirmationController.php",
            data: { usuario_id: usuario_id }
        }).done(function(message) {
            window.location = "LicenseConfirmation.php";
        });
    });

});
