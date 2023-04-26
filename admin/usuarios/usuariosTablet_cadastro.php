  <div class="container">
    <form action="" method="POST" id="frmUsuario" name="frmUsuario" class="mt-3" onsubmit="return false">

      <!-- Linha -->
      <div class="row">

        <!-- campo codigo -->
        <div class="col-lg-3">
          <p><label for="txtCodigo">Código</label></p>
          <p><input type="text" name="txtCodigo" id="txtCodigo" class="form-control" oninput="pesquisa()" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : '' ?>"></p>
        </div>
        <!-- fim campo codigo -->

        <div class="col-lg-6">
          <!--Espaçamento-->
        </div>

        <div class="col-lg-3">
          <p><label class="form-label">Empresa</label></p>
          <p><select class="form-select" id="txtEmpresa">
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

      </div>
      <!-- fim Linha -->

      <!-- Nova Linha -->
      <div class="row">
        <!-- campo nome -->
        <div class="col-lg-12">
          <p><label for="txtNome">Nome</label></p>
          <p><input type="text" name="txtNome" id="txtNome" class="form-control"></p>
        </div>
        <!-- fim campo nome -->
      </div>
      <!-- fim Linha -->

      <!-- nova Linha -->
      <div class="row">

        <!-- Campo Login -->
        <div class="col-lg-6">
          <p><label for="txtLogin">Login</label></p>
          <p><input type="text" name="txtLogin" id="txtLogin" class="form-control"></p>
        </div>
        <!-- fim campo Login -->

        <!-- Campo Senha -->
        <div class="col-lg-6  ">
          <p><label for="txtSenha">Senha</label></p>
          <p><input type="password" name="txtSenha" id="txtSenha" class="form-control"></p>
        </div>
        <!-- Fim campo senha -->

      </div>
      <!-- fim Linha -->

      <!-- Nova Linha -->
      <div class="row">

        <!-- Campo Status -->
        <div class="col-lg-6">
          <p><label for="txtStatus">Status</label></p>
          <p>
            <select name="txtStatus" id="txtStatus" class="form-control">
              <option>Ativo</option>
              <option>Inativo</option>
            </select>
          </p>
        </div>
        <!-- Fim campo Status -->

        <div class="col-lg-6">
          <p><label class="form-la">Permissão</label></p>
          <p>
            <select class="form-control mb-3" name="perm" id="txtperm">
              <option value="1">Usuario</option>
              <option value="2">Tecnico</option>
              <option value="3">Administrador</option>
            </select>
          </p>
        </div>
      </div>
      <!-- Fim linha -->

      <!-- Nova LInha -->
      <div class="row">
        <!-- Campo Observação -->
        <div class="col-lg-12">
          <p><label for="txtObs">Observação</label></p>
          <p><textarea name="txtObs" id="txtObs" rows="5" class="form-control"></textarea></p>
        </div>
        <!-- Fim campo observação -->
      </div>
      <!-- Fim Linha -->

      <!-- Nova Linha -->
      <div class="row">

        <!-- Botões -->
        <div class="col-lg-12">
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
      <div class="toast-body" id="sysMessage">

      </div>
    </div>
  </div>

  <script>
    var debuga = $("#resposta");
    var action = "usuarios/usuarios_crud.php";

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
      $("#txtEmpresa").val($('#codEmpresa').html());
      $('#txtNome').val($('#nomeusuario').html());
      $('#txtperm').val($('#permusuario').html());
      $('#txtLogin').val($('#loginusuario').html());
      $('#txtObs').val($('#obsusuario').html());
      $('#txtStatus').val($('#statususuario').html());
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

    $("#btoCadastrar").click(function() {

      if (cadastroValidar) {
        return
      }

      $.ajax({
        url: action,
        data: {
          type: 'insert',
          codempresa: $('#txtEmpresa').val(),
          txtNome: $('#txtNome').val(),
          txtImagem: 'icon_user.png',
          txtperm: $('#txtperm').val(),
          txtLogin: $('#txtLogin').val(),
          txtSenha: $('#txtSenha').val(),
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
          codempresa: $('#txtEmpresa').val(),
          txtNome: $('#txtNome').val(),
          txtperm: $('#txtperm').val(),
          txtLogin: $('#txtLogin').val(),
          txtSenha: $('#txtSenha').val(),
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

      $('#btoLimpar').click()
    })

    let cadastroValidar = false;

    function validar() {
      var empresa = document.getElementById('txtEmpresa');
      var nome = document.getElementById('txtNome');
      var perm = document.getElementById('txtperm');
      var login = document.getElementById('txtLogin');
      var senha = document.getElementById('txtSenha');
      var status = document.getElementById('txtStatus');

      if (empresa.value.trim() == "") {
        $("#sysMessage").html('Empresa não Informada');
        $('#liveToast').toast('show');
        empresa.focus();
        cadastroValidar = true;
      } else if (nome.value.trim() == "") {
        $("#sysMessage").html('Nome não Informado');
        $('#liveToast').toast('show');
        nome.focus();
        cadastroValidar = true;
      } else if (perm.value.trim() == "") {
        $("#sysMessage").html('Permissão não Informada');
        $('#liveToast').toast('show');
        perm.focus();
        cadastroValidar = true;
      } else if (login.value.trim() == "") {
        $("#sysMessage").html('Login não Informado');
        $('#liveToast').toast('show');
        login.focus();
        cadastroValidar = true;
      } else if (senha.value.trim() == "") {
        $("#sysMessage").html('Senha não Informada');
        $('#liveToast').toast('show');
        senha.focus();
        cadastroValidar = true;
      } else if (status.value.trim() == "") {
        $("#sysMessage").html('Status não Informado');
        $('#liveToast').toast('show');
        status.focus();
        cadastroValidar = true;
      } else {
        cadastroValidar = false;
      }
    }
  </script>

  <!-- Fim Validação -->