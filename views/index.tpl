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

                </div>
            </div>
        </div>
    </body>
</html>