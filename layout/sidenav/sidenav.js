
$(document).ready(function () {
    
    $('#enrollLink').click(function () {
        $("#page-content").load("blank.html");
    });
    
    $('#instructorRegistrationLink').click(function () {
        $("#page-content").load("features/instructor/instructor-registration.html");
    });
    
    $('#approveClientLink').click(function () {
        $("#page-content").load("blank.html");
    });
    
    $('#confirmLicenseLink').click(function () {
        $("#page-content").load("blank.html");
    });
    
    $('#classListLink').click(function () {
        $("#page-content").load("blank.html");
    });
    
});
