{* Smarty *}

<!DOCTYPE html>

<html>
    <head>
        <title>Driving Lessons</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles/body.css">
        <link rel="stylesheet" type="text/css" href="styles/main.css">
        <link rel="stylesheet" type="text/css" href="styles/card.css">
        <link rel="stylesheet" type="text/css" href="styles/grid-container.css">
        <link rel="stylesheet" type="text/css" href="styles/button.css">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/client-approval" type="text/javascript"></script>
    </head>
    <body>
        {include file="header.tpl" user=$user}
        {include file="sidenav.tpl" user_type=$user.descripcion}
        <div class="main">
            <div class="page" id="page">
                <div class="page-content" id="page-content">
                    <div class="grid-container">
                        {foreach from=$users item=u}
                            <div class="grid-item">
                                <div class="card">
                                    <img src="img/generic-avatar.png" alt="Avatar">
                                    <div class="container">
                                        <h4><b>{$u.email}</b></h4>
                                        <p class="card_p">{$u.nombre}</p>
                                        <p class="card_p">{$u.apellido}</p>
                                        <p class="card_p">{$u.ci}</p>
                                        <p class="card_p">{$u.direccion}</p>
                                        <p class="card_p">{$u.fecha_nacimiento}</p>
                                        <button value={$u.email}>Approve</button>
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
