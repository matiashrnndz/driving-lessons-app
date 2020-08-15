
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
                                <form action="controllers/EnrollController.php" method="POST">
                                    <label class="form-label" for="enroll_date">Date:</label>
                                    <input type="date" name="enroll_date">
                                    <label class="form-label" for="enroll_select_time">Hora:</label>
                                    <select name="enroll_select_time" id="enroll_select_time" style="margin-top: 10px">
                                        <option value=7>07:00 - 08:00</option>
                                        <option value=8>08:00 - 09:00</option>
                                        <option value=9>09:00 - 10:00</option>
                                        <option value=10>10:00 - 11:00</option>
                                        <option value=11>11:00 - 12:00</option>
                                        <option value=12>12:00 - 13:00</option>
                                        <option value=13>13:00 - 14:00</option>
                                        <option value=14>14:00 - 15:00</option>
                                        <option value=15>15:00 - 16:00</option>
                                        <option value=16>16:00 - 17:00</option>
                                        <option value=17>17:00 - 18:00</option>
                                        <option value=18>18:00 - 19:00</option>
                                        <option value=19>19:00 - 20:00</option>
                                        <option value=20>20:00 - 21:00</option>
                                    </select>
                                    <label class="form-label" for="enroll_select_instructors" style="margin-top: 10px">Instructor:</label>
                                    <select name="enroll_select_instructors" id="enroll_select_instructors" style="margin-top: 10px">
                                        {foreach from=$instructors item=instructor}
                                            <option value={$instructor.instructor_id}>{$instructor.nombre} {$instructor.apellido}</option>
                                        {/foreach}
                                    </select>
                                    <button class='from-container-button' style="margin-top: 20px">Enroll</button>
                                </form>
                            </div>
                            <div class="overlay-container">
                                <div class="overlay">
                                    <div class="overlay-panel overlay-right">
                                        {if $status == null}
                                            <h1>Enroll for a driving course!</h1>
                                        {else if $status == "err"}
                                            <h2>Oops!</h2>
                                            <p>Error: {$err_message}</p>
                                        {else if $status == "ok"}
                                            <h1>Thanks for your enrrollment!</h1>
                                            <h2>Your course was schedulled!</h2>
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
