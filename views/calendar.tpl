{* Smarty *}

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="cache-control" content="no-cache">
        <title>Driving Lessons</title>
        <link rel="stylesheet" type="text/css" href="styles/body.css">
        <link rel="stylesheet" type="text/css" href="styles/main.css">
        <link rel="stylesheet" type="text/css" href="styles/calendar.css">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="https://unpkg.com/calendarize"></script>
        <script src="https://unpkg.com/sublet"></script>
        <script type="text/javascript" src="js/load-calendar.js"></script>
        <script type="text/javascript" src="js/calendar.js"></script>
    </head>
    <body>
        {include file="header.tpl" user=$user}
        {include file="sidenav.tpl" user_type=$user.descripcion active_users=$active_users users_with_license=$users_with_license}
        <div class="main">
            <div class="page" id="page">
                <div class="page-content" id="page-content">
                    <div class="container">
                        <h1 style="margin-top: 30px">August 2020</h1>
                        <div id="calendar">
                          <div class="labels"></div>
                          <div class="dates"></div>
                        </div>
                        {if $user == null}
                            <div style="align-content: center">
                                <h1>Register to schedule your classes!</h1>
                                <h3>The cost of the courses are $ 1000 per class.</h3>
                            </div>
                        {/if}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
