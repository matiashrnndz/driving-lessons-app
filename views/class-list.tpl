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
        <link rel="stylesheet" type="text/css" href="styles/form-right-overlay.css">
        <link rel="stylesheet" type="text/css" href="styles/forms.css">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        {include file="header.tpl" user=$user}
        {include file="sidenav.tpl" user_type=$user.descripcion}
        <div class="main">
            <div class="page" id="page">
                <div class="page-content" id="page-content">
                    <div>
                        <div class="container" id="container">
                            <div class="form-container sign-up-container">
                                <form action="controllers/ClassListController.php" method="POST">
                                    <label class="form-label" for="classlist_date">Date:</label>
                                    <input type="date" name="classlist_date">
                                    <label class="form-label" for="classlist_select_instructors" style="margin-top: 10px">Instructor:</label>
                                    <select name="classlist_select_instructors" id="classlist_select_instructors" style="margin-top: 10px">
                                        {foreach from=$instructors item=instructor}
                                            <option value={$instructor.instructor_id}>{$instructor.nombre} {$instructor.apellido}</option>
                                        {/foreach}
                                    </select>
                                    <button class='from-container-button' style="margin-top: 20px">Generate</button>
                                </form>
                            </div>
                            <div class="overlay-container">
                                <div class="overlay">
                                    <div class="overlay-panel overlay-right">
                                        {if $status == null}
                                            <h1>Generate a report!</h1>
                                        {else if $status == "err"}
                                            <h2>Oops!</h2>
                                            <p>Error: {$err_message}</p>
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
