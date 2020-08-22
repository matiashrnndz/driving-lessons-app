
$(document).ready(function () {
    
    $("button").click(function () {
        email = $(this).val();
        $.ajax({
            type: "POST",
            url: "controllers/ClientApprovalController.php",
            data: { email: email }
        }).done(function(message) {
            window.location = "ClientApproval.php";
        });
    });

});
