{* Smarty *}

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="cache-control" content="no-cache">
        <title>Driving Lessons</title>
        <link rel="stylesheet" type="text/css" href="styles/body.css">
        <link rel="stylesheet" type="text/css" href="styles/main.css">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        {if $user == null}
            {include file="header.tpl" user=null}
            {include file="sidenav.tpl" user_type=2}
        {else}
            {include file="header.tpl" user=$user}
            {include file="sidenav.tpl" user_type=$user.descripcion}
        {/if}
        <div class="main">
            <div class="page" id="page">
                <div class="page-content" id="page-content">
                    {if $user == null}
                        <h1>Register to schedule your classes!</h1>
                        <h3>The cost of the courses are $ 1000 per class.</h3>
                    {/if} 
                </div>
            </div>
        </div>
    </body>
</html>