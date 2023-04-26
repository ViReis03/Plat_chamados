<div class="container">

    <div class="row mt-2">
        <div class="col-sm-12 d-flex justify-content-between">
            <span class="pagTitle">Abrir Ticket</span>
            <a href="?pag=ticket" class="btn btn-outline-success">Voltar</a>
        </div>
    </div>
</div>

<div class="container mt-5">

    <form onsubmit="return false">
        <div class="row">

            <div class="col-lg-4">

                <label for="tipo" class="form-label">Tipo de Ticket</label>

                <select class="form-select" aria-label="Default select example" id="txtTipo">
                    <option selected>Selecione o tipo</option>
                    <option>Solicitacao</option>
                    <option>Problema</option>
                </select>

            </div>

        </div>

        <div class="row">
            <div class="col-lg-4 mt-2">

                <!-- cat1 -->
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" aria-label="Default select example" id="txtCat1" onchange="categoria()">
                    <option selected>Selecione a Categoria</option>
                    <?php
                    include 'conexao.php';

                    try {
                        $data = $conn->query('SELECT codigo_cat1, nome_cat1 FROM cat1');

                        foreach ($data as $load) {
                    ?> <option value="<?php echo $load['codigo_cat1'] ?>"><?php echo $load['codigo_cat1'] . " - " . $load['nome_cat1'] ?></option> <?php
                                                                                                                                                }
                                                                                                                                            } catch (PDOException $e) {
                                                                                                                                                echo 'ERROR: ' . $e->getMessage();
                                                                                                                                            }
                                                                                                                                                    ?>
                </select>
                <!-- fim cat1 -->


            </div>

            <div class="col-lg-4 mt-2">
                <label for="data" class="form-label">SubCategoria</label>
                <select class="form-select" aria-label="Default select example" id="txtCat2" onchange="subcategoria()">
                    <option selected>Selecione a Subcategoria</option>
                </select>
            </div>

            <div class="col-lg-4 mt-2">
                <label for="data" class="form-label">Categoria de terceiro nivel</label>
                <select class="form-select" aria-label="Default select example" id="txtCat3">
                    <option selected>Selecione a categoria de terceiro nivel</option>
                </select>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 mt-2">
                <label for="assunto" class="form-label">Assunto</label>
                <input type="text" class="form-control" id="txtAssunto">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-2">
                <label for="txtDesc" class="form-label">Descrição</label>
                <textarea class="form-control" id="txtDesc" rows="5"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-row-reverse bd-highlight">
                    <button id="btoCadastrar" class="p-2 bd-highlight btn btn-outline-success mt-3" onclick="Validou()">Abrir Ticket</button>
                </div>
            </div>
        </div>

    </form>

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

<div id="resposta" class="d-none"></div>

<script>
    var debuga = $("#resposta");

    function carregando(datas) {
        debuga.empty().html("Carregando....");
    }

    function sucesso(datas) {
        debuga.empty().html(datas);
        $("#sysMessage").html($('#message').html());
        $("#txtCodigo").val($("#IDGerado").html());
        $('#liveToast').toast('show');
        $('#anexos').modal('show');

        console.log(datas)

        // console.log(datas)
    }

    function errosend(datas) {
        debuga.empty().html("Erro ao enviar os dados");
    }

    $.ajaxSetup({
        type: 'POST',
        beforeSend: carregando,
        error: errosend,
        success: sucesso,
    })

    $("#btoCadastrar").click(function() {
        action = "Ticket/abrir/crudAbrir_ticket.php";

        if (ihu) {
            return;
        }

        $.ajax({
            url: action,
            data: {
                txtTipo: $('#txtTipo').val(),
                txtCat1: $('#txtCat1').val(),
                txtCat2: $('#txtCat2').val(),
                txtCat3: $('#txtCat3').val(),
                txtAssunto: $('#txtAssunto').val(),
                txtDesc: $('#txtDesc').val(),
                codigoUser: idUsuarioSessao,
                codigoEmpresa: idEmpresaSessao
            },
        });
    })

    function categoria() {
        $.post("Ticket/abrir/cat_select.php", {
            txtcat1: $("#txtCat1").val()
        }, function(result) {
            $("#txtCat2").html(result);
        });
    }

    function subcategoria() {
        $.post("Ticket/abrir/cat_select.php", {
            txtcat2: $("#txtCat2").val()
        }, function(result) {
            $("#txtCat3").html(result);
        });
    }

    function Validou() {
        var txtTipo = document.getElementById('txtTipo');
        var txtCat1 = document.getElementById('txtCat1');
        var txtCat2 = document.getElementById('txtCat2');
        var txtCat3 = document.getElementById('txtCat3');
        var txtAssunto = document.getElementById('txtAssunto');
        var txtDesc = document.getElementById('txtDesc');

        if (txtTipo.value.trim() == '') {
            $("#sysMessage").html('Preencha o campo Tipo');
            $('#liveToast').toast('show');
            txtTipo.focus;
            ihu = true;
        } else if (txtCat1.value.trim() == '') {
            $("#sysMessage").html('Preencha o campo da primeira Categoria');
            $('#liveToast').toast('show');
            txtCat1.focus;
            ihu = true;
        } else if (txtCat2.value.trim() == '') {
            $("#sysMessage").html('Preencha o campo da segunda Categoria');
            $('#liveToast').toast('show');
            txtCat2.focus;
            ihu = true;
        } else if (txtCat3.value.trim() == '') {
            $("#sysMessage").html('Preencha o campo da terceira Categoria');
            $('#liveToast').toast('show');
            txtCat3.focus;
            ihu = true;
        } else if (txtAssunto.value.trim() == '') {
            $("#sysMessage").html('Preencha o campo Assunto');
            $('#liveToast').toast('show');
            txtAssunto.focus;
            ihu = true;
        } else if (txtDesc.value.trim() == '') {
            $("#sysMessage").html('Preencha o campo Descrição');
            $('#liveToast').toast('show');
            txtDesc.focus;
            ihu = true;
        } else {
            ihu = false;
        }
    }
</script>

<div class="modal" tabindex="-1" id='anexos'>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body d-flex align-items-center">
                <p>
                <h3>Gostaria de Adicionar Anexos?</h3>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="window.location.assign('ticket/abrir/arquivo?id=' + $('#IDGerado').html())">Adicionar</button>
            </div>
        </div>
    </div>
</div>