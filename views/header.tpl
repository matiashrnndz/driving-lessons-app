{* Smarty *}

<!DOCTYPE html>

<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/header.css">
        <script type="text/javascript" src="js/header.js"></script>
    </head>
    <body>
        <div class="header">
            <a href="#default" class="logo">Driving Lessons</a>
            <div class="header-right">
                {if $user == null}
                    <a id="signinLink" name="authenticationLink">Sign in</a>
                    <a id="signupLink" name="authenticationLink">Join now</a>
                {else}
                    <a id="signoutLink" name="authenticationLink">Sign out</a>
                {/if}
            </div>
        </div>
    </body>
</html>
