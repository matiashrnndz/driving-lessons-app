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
        <link rel="stylesheet" type="text/css" href="styles/instructor-registration.css">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        {include file="header.tpl"}
        {include file="sidenav.tpl"}
        <div class="main">
            <div class="page" id="page">
                <div class="page-content" id="page-content">
                    <div class="container" id="container">
                        <div class="form-container sign-up-container">
                            <form action="controllers/InstructorRegistrationController.php" method="POST">
                                <h1>Sign up</h1>
                                <input type="text" name="instructor_name" placeholder="Name" />
                                <input type="text" name="instructor_lastname" placeholder="Lastname" />
                                <input type="text" name="instructor_document" placeholder="Document Number" />
                                <label class="form-label" for="instructor_birthday">Birthday:</label>
                                <input type="date" name="instructor_birthday">
                                <label class="form-label" for="instructor_license_expiration">Driving License Expiration:</label>
                                <input type="date" name="instructor_license_expiration">
                                <button>Sign Up</button>
                            </form>
                        </div>
                        <div class="overlay-container">
                            <div class="overlay">
                                <div class="overlay-panel overlay-right">
                                    <h1>Instructor Registration</h1>
                                    {if $err_message != null}
                                        <h2>Oops!</h2>
                                        <p>Error: {$err_message}</p>
                                    {else}
                                        <p>Enter the details!</p>
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
