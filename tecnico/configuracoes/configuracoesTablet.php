<div class="container">
    <div class="row text-center mt-3">
        <div class="col-sm-12">
            <h1 class="mb-4">Configurações</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <p class="h4">Alterar Senha</p>
        </div>
    </div>

    <div class="row border border-1 rounded pt-1 mb-3">
        <div class="col-sm-4">
            <p><label for="">Senha Atual</label></p>
            <p><input class="form-control" id="txtSenhaAtual"></p>
        </div>

        <div class="col-sm-4">
            <p><label for="">Nova Senha</label></p>
            <p><input class="form-control" id="txtSenhaNova"></p>
        </div>

        <div class="col-sm-4">
            <p><label for="">Confirme Nova Senha</label></p>
            <p><input class="form-control" id="txtSenhaConfirm"></p>
        </div>

        <p class="text-end"><button class="btn btn-outline-success w-auto" onclick="trocaSenha()">Salvar</button></p>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <p class="h4">Alterar Nome</p>
        </div>
    </div>

    <div class="row border border-1 rounded pt-1 mb-3">
        <div class="col-sm-12">
            <p><label for="">Alterar Nome</label></p>
            <p><input class="form-control" id="txtAlterarNome"></p>
        </div>

        <p class="text-end"><button class="btn btn-outline-success w-auto" onclick="trocaNome()">Salvar</button></p>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <p class="h4">Parametros</p>
        </div>
    </div>

    <div class="row border border-1 rounded pt-1 mb-3 ">
        <div class="col-sm-12 d-flex justify-content-start">
            <a href="desktop.php?pag=configuracoes"><button class="btn btn-outline-success w-auto mx-1 mt-2">Alterar para modo Desktop</button></p>
            <a href="login/logoff.php"><button class="btn btn-outline-success w-auto mx-1 mt-2">Sair do sistema</button></p>
        </div>

    </div>

</div>

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
    function trocaSenha() {

        var senhaAtual = document.getElementById('txtSenhaAtual');
        var senhaNova = document.getElementById('txtSenhaNova');
        var senhaConfirm = document.getElementById('txtSenhaConfirm');

        if (senhaAtual.value.trim() == '') {
            $("#sysMessage").html('Preencha a Senha Atual');
            $('#liveToast').toast('show');
            senhaAtual.focus;
            return;
        } else if (senhaNova.value.trim() == '') {
            $("#sysMessage").html('Preencha a nova senha');
            $('#liveToast').toast('show');
            senhaNova.focus;
            return;
        } else if (senhaConfirm.value.trim() == '') {
            $("#sysMessage").html('Preencha a confirmação de senha');
            $('#liveToast').toast('show');
            senhaConfirm.focus;
            return;
        }

        $.ajax({
            url: 'configuracoes/configuracoes_crud.php',
            type: 'POST',
            data: {
                type: 'trocaSenha',
                atualsenha: senhaUsuarioSessao,
                senhaDigitada: $("#txtSenhaAtual").val(),
                novaSenha: $("#txtSenhaNova").val(),
                confirmSenha: $("#txtSenhaConfirm").val(),
                userLogado: idUsuarioSessao,
            },
            success: trocaSucesso
        });
    }

    function trocaNome() {

        var novoNome = document.getElementById('txtAlterarNome');

        if (novoNome.value.trim() == '') {
            $("#sysMessage").html('Preencha o nome');
            $('#liveToast').toast('show');
            novoNome.focus;
            return;
        }

        $.ajax({
            url: 'configuracoes/configuracoes_crud.php',
            type: 'POST',
            data: {
                type: 'alterarNome',
                AlterarNome: $('#txtAlterarNome').val(),
                userLogado: idUsuarioSessao,
            },
            success: trocaSucesso
        });
    }

    function trocaSucesso(result) {
        $("#sysMessage").html(result);
        $('#liveToast').toast('show');
    };
</script>