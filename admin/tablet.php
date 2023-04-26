<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <title>Home | Sun.IT</title>

    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js//bootstrap.bundle.js"></script>

</head>

<body>

    <?php include_once "login/login_autenticar.php" ?>

    <div class="container-fluid"  id="viewMobile">

        <!-- Topbar -->
        <?php
        include_once "menus/topbarTablet.php";
        ?>
        <!-- fim topbar -->

        <div class="row">
            <div class="col-sm-12">

                <?php

                if ($_GET) {

                    // tickets
                    if ($_GET['pag'] == 'ticket') {
                        include_once "Ticket/home_ticket.php";
                    }

                    // pag Abrir ticket
                    if ($_GET['pag'] == 'ticket_open') {
                        include_once "Ticket/abrir/abrir_ticketTablet.php";
                    }

                    // fim pag abrir ticket

                    // em aberto
                    if ($_GET['pag'] == 'ticket_aberto') {
                        include_once "Ticket/aberto/abertoTablet.php";
                    }
                    // fim em aberto

                    // fechado
                    if ($_GET['pag'] == 'ticket_fechado') {
                        include_once "Ticket/fechado/fechadoTablet.php";
                    }
                    // fim fechado
                    // fim ticket

                    // pag catalogo
                    if ($_GET['pag'] == 'catalogo') {
                        include_once "catalogo/home_catalogo.php";
                    }

                    if ($_GET['pag'] == 'catalogo_cat1') {
                        include_once 'catalogo/cat1/cat1Tablet.php';
                    }

                    if ($_GET['pag'] == 'catalogo_cat2') {
                        include_once 'catalogo/cat2/cat2Tablet.php';
                    }


                    if ($_GET['pag'] == 'catalogo_cat3') {
                        include_once 'catalogo/cat3/cat3Tablet.php';
                    }


                    // fim pag catalogo

                    // pag usuarios
                    if ($_GET['pag'] == 'usuarios') {
                        include_once "usuarios/usuariosTablet.php";
                    }
                    // fim pag usuarios

                    // pag empresas
                    if ($_GET['pag'] == 'empresas') {
                        include_once "empresa/empresasTablet.php";
                    }
                    // fim pag empresas

                    // dashboard
                    if ($_GET['pag'] == 'dashboard') {
                        include_once 'dashboard/dashboardTablet.php';
                    }
                    // fim dashboard

                    if ($_GET['pag'] == 'configuracoes') {
                        include_once 'configuracoes/configuracoesTablet.php';
                    }
                }

                ?>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>