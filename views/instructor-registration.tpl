{* Smarty *}

<!DOCTYPE html>

<html>
    <head>
        <title>Driving Lessons</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/body.css">
        <link rel="stylesheet" type="text/css" href="styles/main.css">
        <link rel="stylesheet" type="text/css" href="styles/button.css">
        <link rel="stylesheet" type="text/css" href="styles/container.css">
        <link rel="stylesheet" type="text/css" href="styles/forms.css">
        <link rel="stylesheet" type="text/css" href="styles/form-right-overlay.css">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        {include file="header.tpl" user=$user}
        {include file="sidenav.tpl" user_type=$user.descripcion active_users=$active_users users_with_license=$users_with_license}
        <div class="main">
            <div class="page" id="page">
                <div class="page-content" id="page-content">
                    <div class="container" id="container">
                        <div class="form-container sign-up-container">
                            <form action="controllers/InstructorRegistrationController.php" method="POST">
                                <input type="text" name="instructor_name" placeholder="Name" />
                                <input type="text" name="instructor_lastname" placeholder="Lastname" />
                                <input type="text" name="instructor_document" placeholder="Document Number" />
                                <label class="form-label" for="instructor_birthday">Birthday:</label>
                                <input type="date" name="instructor_birthday">
                                <label class="form-label" for="instructor_license_expiration">Driving License Expiration:</label>
                                <input type="date" name="instructor_license_expiration">
                                <button>Register</button>
                            </form>
                        </div>
                        <div class="overlay-container">
                            <div class="overlay">
                                <div class="overlay-panel overlay-right">
                                    {if $status == null}
                                        <h1>Instructor Registration</h1>
                                        <p>Enter the details!</p>
                                    {else if $status == "err"}
                                        <h2>Oops!</h2>
                                        <p>{$err_message}</p>
                                    {else if $status == "ok"}
                                        <h1>Welcome!</h1>
                                        <h2>Your user was created successfully</h2>
                                    {/if}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
