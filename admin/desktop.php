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

    <div class="container-fluid" id="viewDesktop">

        <!-- Topbar -->
        <?php
        include_once "menus/topbar.php"
        ?>
        <!-- fim topbar -->

        <div class="row">
            <?php include_once "menus/sidebar.php" ?>
            <!-- fim menu -->

            <div class="col-sm-10">
                <?php

                if ($_GET) {

                    // tickets
                    if ($_GET['pag'] == 'ticket') {
                        include_once "Ticket/home_ticket.php";
                        echo "<script>active('btoTicket')</script>";
                    }

                    // pag Abrir ticket
                    if ($_GET['pag'] == 'ticket_open') {
                        include_once "Ticket/abrir/abrir_ticket.php";
                        echo "<script>active('btoTicket')</script>";
                    }
                    // fim pag abrir ticket

                    // em aberto
                    if ($_GET['pag'] == 'ticket_aberto') {
                        include_once "Ticket/aberto/aberto.php";
                        echo "<script>active('btoTicket')</script>";
                    }
                    // fim em aberto

                    // fechado
                    if ($_GET['pag'] == 'ticket_fechado') {
                        include_once "Ticket/fechado/fechado.php";
                        echo "<script>active('btoTicket')</script>";
                    }
                    // fim fechado

                    // fim ticket

                    // pag catalogo
                    if ($_GET['pag'] == 'catalogo') {
                        include_once "catalogo/home_catalogo.php";
                        echo "<script>active('btoCatalogo')</script>";
                    }

                    if ($_GET['pag'] == 'catalogo_cat1') {
                        include_once 'catalogo/cat1/cat1.php';
                        echo "<script>active('btoCatalogo')</script>";
                    }

                    if ($_GET['pag'] == 'catalogo_cat2') {
                        include_once 'catalogo/cat2/cat2.php';
                        echo "<script>active('btoCatalogo')</script>";
                    }


                    if ($_GET['pag'] == 'catalogo_cat3') {
                        include_once 'catalogo/cat3/cat3.php';
                        echo "<script>active('btoCatalogo')</script>";
                    }


                    // fim pag catalogo

                    // pag usuarios
                    if ($_GET['pag'] == 'usuarios') {
                        include_once "usuarios/usuarios.php";
                        echo "<script>active('btoUsuarios')</script>";
                    }
                    // fim pag usuarios

                    // pag empresas
                    if ($_GET['pag'] == 'empresas') {
                        include_once "empresa/empresas.php";
                        echo "<script>active('btoEmpresas')</script>";
                    }
                    // fim pag empresas

                    // calendario
                    if ($_GET['pag'] == 'calendario') {
                        include_once 'calendario/calendar.php';
                        echo "<script>active('btoCalendario')</script>";
                    }
                    // fim calendario

                    // dashboard
                    if ($_GET['pag'] == 'dashboard') {
                        include_once 'dashboard/dashboard.php';
                        echo "<script>active('btoDashboard')</script>";
                    }
                    // fim dashboard

                    if ($_GET['pag'] == 'configuracoes') {
                        include_once 'configuracoes/configuracoes.php';
                        echo "<script>active('btoConfiguracoes')</script>";
                    }
                }

                ?>

            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>