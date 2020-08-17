{* Smarty *}

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="cache-control" content="no-cache">
        <title>Driving Lessons</title>
        <link rel="stylesheet" type="text/css" href="styles/body.css">
        <link rel="stylesheet" type="text/css" href="styles/main.css">
        <link rel="stylesheet" type="text/css" href="styles/container.css">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        {include file="header.tpl" user=null}
        {include file="sidenav.tpl" user_type="Usuario" active_users=$active_users users_with_license=$users_with_license}
        <div class="main">
            <div class="page" id="page">
                <div class="page-content" id="page-content">
                    <h1>Register to schedule your classes!</h1>
                    <h3>The cost of the courses are $ 1000 per class.</h3>
                </div>
            </div>
        </div>
    </body>
</html>