<div class="container">
  <form action="" method="POST" id="frmUsuario" name="frmUsuario" class="mt-3" onsubmit="return false">

    <!-- Linha -->
    <div class="row">

      <!-- campo codigo -->
      <div class="col-sm-3">
        <p><label for="txtCodigo">Código</label></p>
        <p><input type="text" name="txtCodigo" id="txtCodigo" class="form-control" oninput="pesquisa()" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : '' ?>"></p>
      </div>
      <!-- fim campo codigo -->

      <div class="col-sm-6">
        <!--Espaçamento-->
      </div>

      <div class="col-sm-3">
        <p><label for="txtCategoria">Categoria</label></p>
        <p>
          <select class="form-select" id="txtCategoria" name="">
            <?php
            include_once "conexao.php";

            try {
              $sql = $conn->query('SELECT codigo_cat1, nome_cat1 from cat1');

              foreach ($sql as $load) {
            ?>
                <option value="<?php echo $load['codigo_cat1'] ?>"><?php echo $load['codigo_cat1'] . " - " . $load['nome_cat1'] ?></option>
            <?php
              }
            } catch (PDOException $e) {
              echo $e;
            }
            ?>
          </select>
        </p>
      </div>

    </div>
    <!-- fim Linha -->

    <!-- Nova Linha -->
    <div class="row">
      <!-- campo nome -->
      <div class="col-sm-10">
        <p><label for="txtNome">Nome</label></p>
        <p><input type="text" name="txtNome" id="txtNome" class="form-control"></p>
      </div>
      <!-- fim campo nome -->

      <div class="col-sm-2">
        <p><label for="txtStatus">Status</label></p>
        <p>
          <select name="txtStatus" id="txtStatus" class="form-control">
            <option>Ativo</option>
            <option>Inativo</option>
          </select>
        </p>
      </div>
    </div>
    <!-- fim Linha -->

    <!-- Nova LInha -->
    <div class="row">
      <!-- Campo Observação -->
      <div class="col-sm-12">
        <p><label for="txtObs">Descrição</label></p>
        <p><textarea name="txtObs" id="txtDesc" rows="5" class="form-control"></textarea></p>
      </div>
      <!-- Fim campo observação -->
    </div>
    <!-- Fim Linha -->

    <!-- Nova LInha -->
    <div class="row">
      <!-- Campo Observação -->
      <div class="col-sm-12">
        <p><label for="txtObs">Observação</label></p>
        <p><textarea name="txtObs" id="txtObs" rows="5" class="form-control"></textarea></p>
      </div>
      <!-- Fim campo observação -->
    </div>
    <!-- Fim Linha -->

    <!-- Nova Linha -->
    <div class="row">

      <!-- Botões -->
      <div class="col-sm-12">
        <p class="text-end">
          <button class="btn btn-outline-success" id="btoCadastrar" onclick="validar()">Cadastrar</button>
          <button class="btn btn-outline-success" id="btoAlterar" onclick="validar()">Alterar</button>
          <button class="btn btn-outline-success" id="btoLimpar" type="reset">Limpar</button>
          <button class="btn btn-outline-success" id="btoExcluir">Excluir</button>
        </p>
      </div>
      <!-- Fim Botões -->

    </div>
    <!-- Fim Linha -->
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
  var action = "catalogo/cat2/cat2_crud.php";

  function carregando(datas) {
    debuga.empty().html("Carregando....");
  }

  function sucesso(datas) {
    debuga.empty().html(datas);
    $("#sysMessage").html($('#message').html());
    $("#txtCodigo").val($("#IDGerado").html());
    $('#liveToast').toast('show');
  }


  function errosend(datas) {
    debuga.empty().html("Erro ao enviar os dados");
  }

  function sucessoPesquisa(datas) {
    debuga.empty().html(datas);
    $("#sysMessage").html($('#message').html());
    $("#txtCategoria").val($("#idcat1").html());
    $('#txtNome').val($('#nomecat2').html());
    $('#txtDesc').val($('#desccat2').html());
    $('#txtObs').val($('#obscat2').html());
    $('#txtStatus').val($('#statuscat2').html());
    if ($('#message').val() == 'hide') {
      $('#liveToast').toast('hide');
    } else {
      $('#liveToast').toast('show');
    }
  }

  $.ajaxSetup({
    type: 'POST',
    beforeSend: carregando,
    error: errosend,
    success: sucesso
  })

  $("#btoCadastrar").click(function() {

    if (cadastroValidar) {
      return
    }

    $.ajax({
      url: action,
      data: {
        type: 'insert',
        txtCategoria: $('#txtCategoria').val(),
        txtNome: $('#txtNome').val(),
        txtDesc: $('#txtDesc').val(),
        txtObs: $('#txtObs').val(),
        txtStatus: $('#txtStatus').val()
      }
    });
  })

  $("#btoAlterar").click(function() {

    let codigo = $('#txtCodigo').val();
    codigo = codigo.trim();

    if (cadastroValidar) {
      return
    }

    if (codigo == "") {
      $("#sysMessage").html('Preencha o codigo');
      $('#liveToast').toast('show');
      return;
    }

    $.ajax({
      url: action,
      data: {
        type: 'update',
        txtCodigo: $('#txtCodigo').val(),
        txtCat1: $('#txtCategoria').val(),
        txtNome: $('#txtNome').val(),
        txtDesc: $('#txtDesc').val(),
        txtObs: $('#txtObs').val(),
        txtStatus: $('#txtStatus').val()
      }
    });
  })

  $("#btoExcluir").click(function() {
    let codigo = $('#txtCodigo').val();
    codigo = codigo.trim();

    if (codigo == "") {
      $("#sysMessage").html('Preencha o codigo');
      $('#liveToast').toast('show');
      return;
    }
    $.ajax({
      url: action,
      data: {
        type: 'delete',
        txtCodigo: $('#txtCodigo').val()
      }
    });
  })

  function pesquisa() {
    $.ajax({
      url: action,
      data: {
        type: 'search',
        txtCodigo: $('#txtCodigo').val()
      },
      success: sucessoPesquisa
    });
  }

  let cadastroValidar = false;

  function validar() {

    var txtNome = document.getElementById('txtNome');
    var txtCat = document.getElementById('txtCategoria');
    var txtDesc = document.getElementById('txtDesc');
    var txtStatus = document.getElementById('txtStatus');

    if (txtNome.value.trim() == '') {
      $("#sysMessage").html('Preencha o campo Nome');
      $('#liveToast').toast('show');
      txtNome.focus();
      cadastroValidar = true;
    } else if (txtCat.value.trim() == '') {
      $("#sysMessage").html('Preencha a Categoria');
      $('#liveToast').toast('show');
      txtCat.focus();
      cadastroValidar = true;
    } else if (txtDesc.value.trim() == '') {
      $("#sysMessage").html('Preencha a descrição');
      $('#liveToast').toast('show');
      txtDesc.focus();
      cadastroValidar = true;
    } else if (txtStatus.value.trim() == '') {
      $("#sysMessage").html('Preencha o Status');
      $('#liveToast').toast('show');
      txtStatus.focus();
      cadastroValidar = true;
    } else {
      cadastroValidar = false;
    }
  }
</script>