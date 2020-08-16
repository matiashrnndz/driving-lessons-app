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
        <link rel="stylesheet" type="text/css" href="styles/table.css">
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="js/jspdf.debug.js"></script>
        <script src="js/class-list-display.js" type="text/javascript"></script>
    </head>
    <body>
        {include file="header.tpl" user=$user}
        {include file="sidenav.tpl" user_type=$user.descripcion}
        <div class="main">
            <div class="page" id="page">
                <div class="page-content" id="page-content">
                    <div class="container" id="container">
                        <div id="classes">
                            <table id="tab_classes" class="table table-striped" >
                                <colgroup>
                                    <col width="20%">
                                        <col width="20%">
                                            <col width="20%">
                                                <col width="20%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Instructor</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Usuario</th>
                                        <th>Direccion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach from=$reservations item=reservation}
                                        <tr>
                                            <td>{$reservation.nombre} {$reservation.apellido}</td>
                                            <td>{$reservation.fecha}</td>
                                            <td>{$reservation.hora}</td>
                                            <td>{$reservation.usuario_nombre} {$reservation.usuario_apellido}</td>
                                            <td>{$reservation.usuario_direccion}</td>
                                        </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </div>
                        <button>PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
