<style>
  .scrollbar-ripe-malinka::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  .scrollbar-ripe-malinka::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background-color: black;
  }

  .example-1 {
    position: relative;
    overflow-y: scroll;
    height: 100px;
  }
</style>

<div class="container">
  <form method="POST" class="mt-3" onsubmit="return false">

    <div class="row">

      <div class="col-lg-4">
        <p>
        <h4>Informações do Ticket</h4>
        </p>
      </div>

      <div class="col-lg-8 d-flex justify-content-between mb-3">
        <button class="btn btn-outline-success" onclick="deleteTicket()">Excluir</button>
        <button class="btn btn-outline-success" onclick="aguardandoTicket()">Aguardando</button>
        <button class="btn btn-outline-success" onclick="anexo()">Adicionar Anexo</button>
      </div>

    </div>

    <div id="Informacoes">
      <!-- Linha -->
      <div class="row">

        <!-- campo codigo -->
        <div class="col-lg-3">
          <p><label for="txtCodigo">Código</label></p>
          <p><input type="text" name="txtCodigo" id="txtCodigo" class="form-control" oninput="pesquisa()" disabled></p>
        </div>
        <!-- fim campo codigo -->

        <div class="col-lg-6"></div>

        <div class="col-lg-3">
          <p><label for="txtCodigo">Data de Abertura</label></p>
          <p><input type="text" name="txtAbertura" id="txtAbertura" class="form-control" disabled></p>
        </div>
      </div>

      <div class="row">

        <div class="col-lg-4">

          <p><label for="txtTipo">Tipo</label></p>
          <p>
            <select class="form-select" id="txtTipo">
              <option selected>Selecione o tipo</option>
              <option>Solicitacao</option>
              <option>Problema</option>
            </select>
          </p>


        </div>

        <div class="col-lg-4">
          <p><label>Empresa</label></p>
          <p><select class="form-select" name="txtEmpresa" id="txtEmpresa" onchange="usuario()">
              <?php
              include 'conexao.php';

              try {
                $data = $conn->query('SELECT codigo_empresa, nome_empresa FROM empresa');

                foreach ($data as $load) {
                  $id = $load['codigo_empresa'];
              ?>
                  <option value="<?php echo $id ?>"><?php echo $load['codigo_empresa'] . " - " . $load['nome_empresa'] ?></option>
              <?php

                }
              } catch (PDOException $e) {
                echo 'ERROR: ' . $e->getMessage();
              }
              ?>
            </select></p>
        </div>

        <div class="col-lg-4">
          <p><label for="txtUser">Usuario</label></p>
          <p><select class="form-select" name="txtUser" id="txtUser">

            </select></p>
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
            ?>
                <option value="<?php echo $load['codigo_cat1'] ?>"><?php echo $load['codigo_cat1'] . " - " . $load['nome_cat1'] ?></option>
            <?php
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
          <input type="text" class="form-control" id="txtAssunto" disabled>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 mt-2">
          <label for="txtDesc" class="form-label">Descrição</label>
          <textarea class="form-control" id="txtDesc" rows="5" disabled></textarea>
        </div>
      </div>
      <!-- Nova Linha -->
      <div class="row">

        <!-- Botões -->
        <div class="col-lg-12">
          <p class="text-end mt-3">
            <button class="btn btn-outline-success" id="btoSalvarInfo" onclick="alteracoes()">Salvar Alterações</button>
          </p>
        </div>
        <!-- Fim Botões -->

      </div>
      <!-- Fim Linha -->
    </div>

    <div class="row">
      <p>
      <h4>Interações</h4>
      </p>
    </div>
      <div class="row">
        <div class="col-lg-7">
          <p><label>Chat</label></p>

          <div class="form-control bg-link-light card example-1 scrollbar-ripe-malinka" style="min-height: 30vh;">
            <div class="card-body" id='chatContent'>

            </div>
          </div>

          <div class="d-flex justify-content-between mt-1">
            <input type="text" class="form-control" placeholder="Digite a Mensagem" id="txtMensagem" aria-describedby="botmensagem">
            <button class="btn btn-outline-success ms-1" type="button" id="btomensagem" onclick="salvarChat()">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
              </svg>
            </button>
          </div>



        </div>

        <div class="col-lg-5 mt-3">
          <p><label>Anexos</label></p>
          <div class="card example-1 scrollbar-ripe-malinka" style="min-height: 34.2vh;">
            <div class="card-body" id="carregarIMG">

            </div>
          </div>
        </div>
      </div>


    <div class="row mt-2">
      <div class="col-lg-4">
        <p><label>Resolução</label></p>

          <p><label>Progresso</label></p>
          <p>
            <select class="form-select" id="txtResoProgresso">
              <option value="0">0%</option>
              <option value="25">25%</option>
              <option value="50">50%</option>
              <option value="75">75%</option>
              <option value="100">100%</option>
            </select>
          </p>


          <p><label>Tempo Gasto</label></p>
          <p><input type="time" class="form-control" id="txResoTempo"></p>

      </div>

      <div class="col-lg-8">
        <p><label></label></p>

          <p><label>Descrição</label></p>
          <p><textarea class="form-control" id="txtResoDesc" rows="5"></textarea></p>


      </div>
    </div>

    <!-- Nova Linha -->
    <div class="row">

      <!-- Botões -->
      <div class="col-lg-12">
        <p class="text-end mt-3">
          <button class="btn btn-outline-success" id='btoResoSalvar' onclick="validado()"> Salvar </button>
        </p>
      </div>
      <!-- Fim Botões -->

    </div>
    <!-- Fim Linha -->
</div>
<p>
<h4>Historico</h4>
</p>

<div id="txtHistorico" class="form-control mb-3"></div>
</form>

</div>

<div id="resposta" class="d-none"></div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Sun.IT</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" id="sysMessage"></div>
  </div>
</div>



<script>
  var debuga = $("#resposta");
  var action = "Ticket/aberto/aberto_crud.php";

  function deleteTicket() {
    $.ajax({
      url: action,
      data: {
        type: 'delete',
        txtCodigo: $('#txtCodigo').val()
      },
      success: sucessodel
    });
  }

  function confirmHistoric(datas) {
    debuga.empty().html(datas);
    $("#sysMessage").html($('#message').html());
    $('#liveToast').toast('show');
    console.log(datas)
    carregarHistorico();
  }

  function errosend(datas) {
    debuga.empty().html("Erro ao enviar os dados");
  }

  function sucessoPesquisa(datas) {
    debuga.empty().html(datas);
    $("#sysMessage").html($('#message').html());
    $("#txtAbertura").val($("#data").html());
    $('#txtTipo').val($('#tipo').html());
    $('#txtEmpresa').val($('#empresa').html());
    $('#txtCat1').val($('#cat1').html());
    $('#txtCat1').val($('#cat1').html());
    $('#txtResoProgresso').val($('#progress').html())

    categoria('carregar');
    carregarHistorico();
    usuario();
    carregarIMG();
    carregarChat();

    $('#txtAssunto').val($('#assunto').html());
    $('#txtDesc').val($('#desc').html());
    if ($('#message').val() == 'hide') {
      $('#liveToast').toast('hide');
    } else {
      $('#liveToast').toast('show');
    }
  }

  $.ajaxSetup({
    type: 'POST',
    error: errosend,
    success: sucessoPesquisa
  })

  function errosend(datas) {
    debuga.empty().html("Erro ao enviar os dados");
  }

  $('#btoResoSalvar').click(function historico() {
    if (tatatinha) {
      return;
    }

    $.ajax({
      url: action,
      data: {
        type: 'historic',
        txtCodigo: $('#txtCodigo').val(),
        usuario: idUsuarioSessao,
        descricao: $('#txtResoDesc').val(),
        tempo: $('#txResoTempo').val(),
        progresso: $('#txtResoProgresso').val()
      },
      success: confirmHistoric
    });
  })

  function pesquisa() {
    $.ajax({
      url: action,
      data: {
        type: 'search',
        txtCodigo: $('#txtCodigo').val()
      },
    });
  }

  function categoria(value) {
    $.post("Ticket/abrir/cat_select.php", {
      txtcat1: $("#txtCat1").val()
    }, function(result) {
      $("#txtCat2").html(result);
    });

    if (value == 'carregar') {
      setTimeout(() => {
        $('#txtCat2').val($('#cat2').html())
        $('#txtUser').val($('#user').html());
        subcategoria();
        setTimeout(() => {
          $('#txtCat3').val($('#cat3').html())

        }, 100);
      }, 100);
    }
  }

  function subcategoria() {
    $.post("Ticket/abrir/cat_select.php", {
      txtcat2: $("#txtCat2").val()
    }, function(result) {
      $("#txtCat3").html(result);
    });
  }

  function usuario() {
    $.post("Ticket/abrir/cat_select.php", {
      txtEmpresa: $("#txtEmpresa").val()
    }, function(result) {
      $("#txtUser").html(result);
    });
  }

  function carregarHistorico() {
    $.ajax({
      url: action,
      data: {
        type: 'carregarHistorico',
        txtCodigo: $('#txtCodigo').val()
      },
      success: loadHistorico
    });

  }

  function loadHistorico(datas) {
    $('#txtHistorico').empty().html(datas);
  }

  function sucesso(datas) {
    debuga.empty().html(datas);
    $("#sysMessage").html($('#message').html());
    $('#liveToast').toast('show');
  }

  function sucessodel(datas) {
    debuga.empty().html(datas);
    $("#sysMessage").html($('#message').html());
    $('#liveToast').toast('show');
    carregar();
  }

  function alteracoes() {
    $.ajax({
      url: action,
      data: {
        type: 'update',
        txtCodigo: $('#txtCodigo').val(),
        usuario: $('#txtUser').val(),
        empresa: $("#txtEmpresa").val(),
        cat1: $('#txtCat1').val(),
        cat2: $('#txtCat2').val(),
        cat3: $('#txtCat3').val(),
        tipo: $('#txtTipo').val()
      },
      success: sucesso
    });
  }

  function aguardandoTicket() {
    $.ajax({
      url: action,
      data: {
        type: 'sAguardar',
        txtCodigo: $('#txtCodigo').val(),
      },
      success: sucesso
    });
  }



  function carregarIMG() {

    IMGaction = 'Ticket/aberto/carregar.php'

    $.ajax({
      url: IMGaction,
      data: {
        id: $('#txtCodigo').val()
      },
      success: sucessoIMG
    });
  }

  function sucessoIMG(datas) {
    console.log(datas);
    $("#carregarIMG").empty().html(datas);
    console.log("dados" + datas)
  }

  function anexo() {
    window.location.assign('Ticket/abrir/arquivo?id=' + $('#txtCodigo').val());
  }

  function salvarChat() {
    $.ajax({
      url: action,
      data: {
        type: 'insertChat',
        txtCodigo: $('#txtCodigo').val(),
        usuario: idUsuarioSessao,
        mensagem: $('#txtMensagem').val(),

      },
      success: carregarChat
    });
  }

  function carregarChat() {
    $.ajax({
      url: action,
      data: {
        type: 'carregarChat',
        txtCodigo: $('#txtCodigo').val(),
        usuario: idUsuarioSessao,
      },
      success: sucessoSalvarChat
    });
  }

  setInterval(carregarChat, 5000);

  function sucessoSalvarChat(datas) {
    $('#chatContent').html(datas);
  }

  function validado() {
    var txtResoProgresso = document.getElementById('txtResoProgresso');
    var txResoTempo = document.getElementById('txResoTempo');
    var txtResoDesc = document.getElementById('txtResoDesc');

    if (txtResoProgresso.value.trim() == '') {
      $("#sysMessage").html('Preencha o campo Progresso de Resolução');
      $('#liveToast').toast('show');
      txtResoProgresso.focus;
      tatatinha = true;
    } else if (txResoTempo.value.trim() == '') {
      $("#sysMessage").html('Preencha o campo do Tempo de Resolução');
      $('#liveToast').toast('show');
      txResoTempo.focus;
      tatatinha = true;
    } else if (txtResoDesc.value.trim() == '') {
      $("#sysMessage").html('Preencha o campo da Descrição da Resolução');
      $('#liveToast').toast('show');
      txtResoDesc.focus;
      tatatinha = true;
    }else {
      tatatinha = false;
    }
  }
</script>