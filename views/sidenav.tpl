{* Smarty *}

<!DOCTYPE html>

<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/sidenav.css">
        <script type="text/javascript" src="js/sidenav.js"></script>
    </head>
    <body>
        <div class="sidenav">
            {if $user_type != null && $user_type == "Cliente"}
                <a id="enrollLink" name="enrollLink">Enroll</a>
            {else if $user_type != null && $user_type == "Administrador"}
                <a id="enrollLink" name="enrollLink">Enroll</a>
                <a id="instructorRegistrationLink" name="instructorRegistrationLink">Instructor Registration</a>
                <a id="clientApprovalLink" name="clientApprovalLink">Client Approval</a>
                <a id="confirmLicenseLink" name="confirmLicenseLink">Confirm License</a>
                <a id="classListLink" name="classListLink">Class List</a>
            {/if}
        </div>
    </body>
</html>
