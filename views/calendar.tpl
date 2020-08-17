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
        <script type="text/javascript" src="js/calendar.js"></script>
        <script src="https://unpkg.com/calendarize"></script>
        <script src="https://unpkg.com/sublet"></script>
    </head>
    <body>
        {include file="header.tpl" user=$user}
        {include file="sidenav.tpl" user_type=$user.descripcion active_users=$active_users users_with_license=$users_with_license}
        <div class="main">
            <div class="page" id="page">
                <div class="page-content" id="page-content">
                    <div class="container">
                        <fieldset>
                            <div class="input">
                                <label for="month">Date:</label>
                                <select id="month">
                                    <option value="0">January</option>
                                    <option value="1">February</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                    <option value="4">May</option>
                                    <option value="5">June</option>
                                    <option value="6">July</option>
                                    <option value="7" selected>August</option>
                                    <option value="8">September</option>
                                    <option value="9">October</option>
                                    <option value="10">November</option>
                                    <option value="11">December</option>
                                </select>
                                <input id="year" type="number" min="2020" max="2025" step="1" value="2020">
                            </div>
                        </fieldset>
                        <div id="calendar">
                          <div class="labels"></div>
                          <div class="dates"></div>
                        </div>
                        <div style="align-content: center">
                            <h1>Register to schedule your classes!</h1>
                            <h3>The cost of the courses are $ 1000 per class.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
