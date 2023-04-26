<div class="container">
  <form action="" method="POST" id="frmUsuario" name="frmUsuario" class="mt-3" onsubmit="return false">

    <!-- Linha -->
    <div class="row">

      <!-- campo codigo -->
      <div class="col-sm-3">
        <p><label for="txtCodigo">Código</label></p>
        <p><input type="number" name="txtCodigo" id="txtCodigo" class="form-control" oninput="pesquisa()" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : '' ?>"></p>
      </div>
      <!-- fim campo codigo -->

      <div class="col-sm-6">
        <!--Espaçamento-->
      </div>

      <div class="col-sm-3">
        <p><label for="txtSubCategoria">SubCategoria</label></p>
        <p>
          <select class="form-select" id="txtSubCategoria" name="">
            <?php
            include_once "conexao.php";

            try {
              $sql = $conn->query('SELECT codigo_cat2, nome_cat2 from cat2');
              foreach ($sql as $load) {
            ?>
                <option value="<?php echo $load['codigo_cat2'] ?>"><?php echo $load['codigo_cat2'] . " - " . $load['nome_cat2'] ?></option>
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
        <p><textarea name="txtDesc" id="txtDesc" rows="5" class="form-control"></textarea></p>
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
          <button class="btn btn-outline-success" id="btoCadastrar" onclick="foi()">Cadastrar</button>
          <button class="btn btn-outline-success" id="btoAlterar" onclick="foi()">Alterar</button>
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
  var action = "catalogo/cat3/cat3_crud.php";

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
    $("#txtSubCategoria").val($("#cat2").html());
    $('#txtNome').val($('#nomecat3').html());
    $('#txtDesc').val($('#desccat3').html());
    $('#txtObs').val($('#obscat3').html());
    $('#txtStatus').val($('#statuscat3').html());
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
    if (ae) {
      return;
    }

    $.ajax({
      url: action,
      data: {
        type: 'insert',
        txtSubCategoria: $('#txtSubCategoria').val(),
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

    if (ae) {
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
        txtSubCategoria: $('#txtSubCategoria').val(),
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
  let ae = false;

  function foi() {
    var txtNome = document.getElementById('txtNome');
    var txtDesc = document.getElementById('txtDesc');
    var txtStatus = document.getElementById('txtStatus');
    var txtCat2 = document.getElementById('txtSubCategoria');

    if (txtNome.value.trim() == '') {
      $("#sysMessage").html('Preencha o campo Nome');
      $('#liveToast').toast('show');
      txtNome.focus();
      ae = true;
    } else if (txtDesc.value.trim() == '') {
      $("#sysMessage").html('Preencha o campo Descrição');
      $('#liveToast').toast('show');
      txtDesc.focus();
      ae = true;
    } else if (txtStatus.value.trim() == '') {
      $("#sysMessage").html('Preencha o campo Status');
      $('#liveToast').toast('show');
      txtStatus.focus();
      ae = true;
    } else if (txtCat2.value.trim() == '') {
      $("#sysMessage").html('Preencha o campo SubCategoria');
      $('#liveToast').toast('show');
      txtCat2.focus();
      ae = true;
    } else {
      ae = false;
    }
  }
</script>