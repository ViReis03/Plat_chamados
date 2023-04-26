<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Sun.IT</title>

    <link rel="stylesheet" href="admin/css/style.css">
    <link rel="stylesheet" href="admin/css/bootstrap.css">
    <script src="admin/js/jquery-3.6.0.js"></script>
    <script src="admin/js/bootstrap.bundle.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center" id="posiLogin">

                <form style="max-width:340px;margin:auto" method="post" onsubmit="return false">
                    <a href="_wp/wordpress/"><img class="m-5" src="admin/img/logo.png" height="72" alt="Dog"></a>

                    <label for="login" class="sr-only"></label>
                    <input type="text" class="form-control" name="login" placeholder="Login" id="login" required autofocus><br>

                    <label for="senha" class="sr-only"></label>
                    <input type="password" class="form-control" name="senha" placeholder="Senha" id="senha" required autofocus><br>

                    <div class="mt-3 d-grid gap-2">
                        <button class="btn btn-outline-success mt-3 d-grid gap-2" onclick="verificar()">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div id="resposta" class="d-none"></div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Sun.IT</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="sysMessage">

            </div>
        </div>
    </div>
    <script>
        let debuga = $("#resposta");
        let perm = "0";

        function verificar() {
            $.ajax({
                url: 'verifica.php',
                type: 'POST',
                data: {
                    txtLogin: $('#login').val(),
                    txtSenha: $('#senha').val(),
                },
                success: sucessoVerifica
            });
        }

        function sucessoVerifica(datas) {
            debuga.empty().html(datas);
            $("#sysMessage").html($('#message').html());
            $('#liveToast').toast('show');
            perm = $('#permissao').html()
            urlPerm();

        }

        function urlPerm() {
            if (perm == 3) {
                if ($(window).width() > 960) {
                    window.location.assign("admin/desktop.php?pag=dashboard")
                } else {
                    window.location.assign("admin/tablet.php?pag=dashboard")
                }
            } else if (perm == 2) {
                if ($(window).width() > 960) {
                    window.location.assign("tecnico/desktop.php?pag=dashboard")
                } else {
                    window.location.assign("tecnico/tablet.php?pag=dashboard")
                }
            } else if (perm == 1) {
                if ($(window).width() > 960) {
                    window.location.assign("solicitante/desktop.php?pag=dashboard")
                } else {
                    window.location.assign("solicitante/tablet.php?pag=dashboard")
                }
            } else {
                $("#sysMessage").html('ocorreu um erro contate o Administrador');
                $('#liveToast').toast('show');
            }

        }
    </script>
</body>

</html>