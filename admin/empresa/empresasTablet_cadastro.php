<div class="container">
  <form action="" method="POST" id="frmUsuario" name="frmUsuario" class="mt-3" onsubmit="return false">


    <!-- Linha -->
    <div class="row">

      <!-- campo codigo -->
      <div class="col-sm-3">
        <p><label for="txtCodigo">Código</label></p>
        <p><input type="number" tabindex='0' name="txtCodigo" id="txtCodigo" class="form-control" oninput="pesquisa()" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : '' ?>"></p>
      </div>
      <!-- fim campo codigo -->

    </div>
    <!-- fim Linha -->

    <!-- Nova Linha -->
    <div class="row">
      <!-- campo nome -->
      <div class="col-sm-6">
        <p><label for="txtNome">Nome Empresa</label></p>
        <p><input type="text" tabindex='1' name="txtNome" id="txtNome" class="form-control"></p>
      </div>
      <!-- fim campo nome -->
      <div class="col-sm-6">
        <p><label for="txtNome">Razão Social</label></p>
        <p><input type="text" tabindex='2' name="txtRazao" id="txtRazao" class="form-control"></p>
      </div>
    </div>
    <!-- fim Linha -->

    <!-- nova Linha -->
    <div class="row">

      <!-- campo cep -->
      <div class="col-sm-2">
        <p><label for="txtCEP">CEP</label></p>
        <p><input type="text" tabindex='3' name="txtCEP" id="txtCEP" onkeypress="$(this).mask('00000-000')" class="form-control" onblur="apertei()"></p>
      </div>
      <!-- fim campo cep -->

      <!-- campo endereço -->
      <div class="col-sm-6">
        <p><label for="txtEndereco">Endereço</label></p>
        <p><input type="text" tabindex='4' name="txtEndereco" id="txtEndereco" class="form-control" disabled></p>
      </div>
      <!-- fim campo endereço -->

      <div class="col-sm-3">
        <p><label for="txtBairro">Bairro</label></p>
        <p><input type="text" tabindex='5' name="txtBairro" id="txtBairro" class="form-control" disabled></p>
      </div>

      <!-- campo UF -->
      <div class="col-sm-1">
        <p><label for="txtUF">UF</label></p>
        <p><input type="text" tabindex='6' name="txtUF" id="txtUF" class="form-control" disabled></p>
      </div>
      <!-- fim campo UF -->

    </div>
    <!-- fim Linha -->

    <!-- Nova Linha -->
    <div class="row">

      <div class="col-sm-3">
        <p><label for="txtCidade">Cidade</label></p>
        <p><input type="text" tabindex='7' name="txtCidade" id="txtCidade" class="form-control" disabled></p>
      </div>

      <div class="col-sm-2">
        <p><label for="txtNumero">Numero</label></p>
        <p><input type="number" tabindex='8' name="txtNumero" id="txtNumero" class="form-control"></p>
      </div>

      <div class="col-sm-3">
        <p><label for="txtCNPJ">CNPJ</label></p>
        <p><input type="text" tabindex='9' name="txtCNPJ" id="txtCNPJ" onkeypress="$(this).mask('00.000.000/0000-00')" class="form-control"></p>
      </div>

      <div class="col-sm-2">
        <p><label for="txtIE">Inscrição Estadual</label></p>
        <p><input type="text" tabindex='10' name="txtIE" id="txtIE" maxlength="11" class="form-control"></p>
      </div>

      <div class="col-sm-2">
        <p><label for="txtTipo">Tipo</label></p>
        <p>
          <select id="txtTipo" tabindex='11' class="form-select">
            <option>Matriz</option>
            <option>Filial</option>
          </select>
        </p>
      </div>

    </div>
    <!-- Fim linha -->

    <!-- nova linha -->
    <div class="row">
      <div class="col-sm-6">
        <p><label for="txtEmail">E-mail</label></p>
        <p><input type="text" tabindex='12' name="txtEmail" id="txtEmail" class="form-control"></p>
      </div>

      <div class="col-sm-3">
        <p><label for="txtTelefone">Telefone</label></p>
        <p><input type="text" tabindex='13' name="txtTelefone" id="txtTelefone" onkeypress="$(this).mask('(00) 00000-0000')" class="form-control"></p>
      </div>

      <div class="col-sm-3">
        <p><label for="txtStatus">Status</label></p>
        <p>
          <select tabindex='14' name="txtStatus" id="txtStatus" class="form-select">
            <option>Ativo</option>
            <option>Inativo</option>
          </select>
        </p>
      </div>
    </div>
    <!-- fim linha -->

    <!-- Nova LInha -->
    <div class="row">
      <!-- Campo Observação -->
      <div class="col-sm-12">
        <p><label for="txtObs">Observação</label></p>
        <p><textarea tabindex='16' name="txtObs" id="txtObs" rows="5" class="form-control"></textarea></p>
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
    <div class="toast-body" id="sysMessage">

    </div>
  </div>
</div>

<script>
  function apertei() {
    var cep = $("#txtCEP").val().replace(/\D/g, '')
    console.log(cep);

    if (cep != "") {
      //Expressão regular para validar o CEP.
      var validacep = /^[0-9]{8}$/;

      //Valida o formato do CEP.
      if (validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        $("#txtEndereco").val("...");
        $("#txtBairro").val("...");
        $("#txtCidade").val("...");
        $("#txtUF").val("...");

        //Consulta o webservice viacep.com.br/
        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

          if (!("erro" in dados)) {
            //Atualiza os campos com os valores da consulta.
            $("#txtEndereco").val(dados.logradouro);
            $("#txtBairro").val(dados.bairro);
            $("#txtCidade").val(dados.localidade);
            $("#txtUF").val(dados.uf);
          } //end if.
          else {
            //CEP pesquisado não foi encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
          }
        });
      } //end if.
      else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
      }
    } //end if.
    else {
      //cep sem valor, limpa formulário.
      limpa_formulário_cep();
    }
  }



  // ajax
  var debuga = $("#resposta");
  var action = "empresa/empresa_crud.php";

  function carregando(datas) {
    debuga.empty().html("Carregando....");
  }

  function sucesso(datas) {
    debuga.empty().html(datas);
    $("#sysMessage").html($('#message').html());
    $("#txtCodigo").val($("#IDGerado").html());
    $('#liveToast').toast('show');
  }

  function sucessoPesquisa(datas) {
    debuga.empty().html(datas);
    $("#sysMessage").html($('#message').html());
    $("#txtNome").val($("#nomeempresa").html());
    $('#txtRazao').val($('#razaoempresa').html());
    $('#txtCEP').val($('#cepempresa').html());
    $('#txtEndereco').val($('#enderecoempresa').html());
    $('#txtBairro').val($('#bairroempresa').html());
    $('#txtUF').val($('#ufempresa').html());
    $('#txtCidade').val($('#cidadeempresa').html());
    $('#txtNumero').val($('#numeroempresa').html());
    $('#txtCNPJ').val($('#cnpjempresa').html());
    $('#txtIE').val($('#ieempresa').html());
    $('#txtTipo').val($('#tipoempresa').html());
    $('#txtEmail').val($('#mailempresa').html());
    $('#txtTelefone').val($('#telempresa').html());
    $('#txtStatus').val($('#statusempresa').html());
    $('#txtObs').val($('#obsempresa').html());
    if ($('#message').val() == 'hide') {
      $('#liveToast').toast('hide');
    } else {
      $('#liveToast').toast('show');
    }
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

    debuga.empty().html("Apertei no botão Cadastrar");

    $.ajax({
      url: action,
      data: {
        type: 'insert',
        txtNome: $('#txtNome').val(),
        txtRazao: $('#txtRazao').val(),
        txtCEP: $('#txtCEP').val(),
        txtEndereco: $('#txtEndereco').val(),
        txtBairro: $('#txtBairro').val(),
        txtUF: $('#txtUF').val(),
        txtNumero: $('#txtNumero').val(),
        txtCidade: $('#txtCidade').val(),
        txtTipo: $('#txtTipo').val(),
        txtCNPJ: $('#txtCNPJ').val(),
        txtIE: $('#txtIE').val(),
        txtEmail: $('#txtEmail').val(),
        txtTelefone: $('#txtTelefone').val(),
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
    
    if(codigo == ""){
      $("#sysMessage").html('Preencha o codigo');
      $('#liveToast').toast('show');
      return;
    }

    $.ajax({
      url: action,
      data: {
        type: 'update',
        txtCodigo: $('#txtCodigo').val(),
        txtNome: $('#txtNome').val(),
        txtRazao: $('#txtRazao').val(),
        txtCEP: $('#txtCEP').val(),
        txtEndereco: $('#txtEndereco').val(),
        txtBairro: $('#txtBairro').val(),
        txtUF: $('#txtUF').val(),
        txtNumero: $('#txtNumero').val(),
        txtCidade: $('#txtCidade').val(),
        txtTipo: $('#txtTipo').val(),
        txtCNPJ: $('#txtCNPJ').val(),
        txtIE: $('#txtIE').val(),
        txtEmail: $('#txtEmail').val(),
        txtTelefone: $('#txtTelefone').val(),
        txtObs: $('#txtObs').val(),
        txtStatus: $('#txtStatus').val()
      }
    });
  })

  $("#btoExcluir").click(function() {
    let codigo = $('#txtCodigo').val();
    codigo = codigo.trim();

    if(codigo == ""){
      $("#sysMessage").html('Preencha o codigo');
      $('#liveToast').toast('show');
      return;
    }

    $.ajax({
      url: action,
      data: {
        type: 'delete',
        txtCodigo: $('#txtCodigo').val()
      },
    });

    $('#btoLimpar').click()
  })

  let cadastroValidar = false;

  function validar() {

    var txtNome = document.getElementById('txtNome');
    var txtRazao = document.getElementById('txtRazao');
    var txtCEP = document.getElementById('txtCEP');
    var txtEndereco = document.getElementById('txtEndereco');
    var txtBairro = document.getElementById('txtBairro');
    var txtUF = document.getElementById('txtUF');
    var txtCidade = document.getElementById('txtCidade');
    var txtNumero = document.getElementById('txtNumero');
    var txtCNPJ = document.getElementById('txtCNPJ');
    var txtIE = document.getElementById('txtIE');
    var txtTipo = document.getElementById('txtTipo');
    var txtEmail = document.getElementById('txtEmail');
    var txtTelefone = document.getElementById('txtTelefone');
    var txtStatus = document.getElementById('txtStatus');

    if (txtNome.value.trim() == '') {

      $("#sysMessage").html('Preencha o campo Nome');
      $('#liveToast').toast('show');
      txtNome.focus();
      cadastroValidar = true;
    }
    else if(txtRazao.value.trim() == '') {

      $("#sysMessage").html('Preencha Razão Social');
      $('#liveToast').toast('show');
      txtRazao.focus();
      cadastroValidar = true;
    }
    else if (txtCEP.value.trim() == '') {
      $("#sysMessage").html('Preencha o CEP');
      $('#liveToast').toast('show');
      txtCEP.focus();
      cadastroValidar = true;
    }
    else if (txtNumero.value.trim() == '') {
      $("#sysMessage").html('Preencha Número');
      $('#liveToast').toast('show');
      txtNumero.focus();
      cadastroValidar = true;
    }
    else if (txtCNPJ.value.trim() == '') {
      $("#sysMessage").html('Preencha o CNPJ');
      $('#liveToast').toast('show');
      txtCNPJ.focus();
      cadastroValidar = true;
    }
    else if (txtIE.value.trim() == '') {
      $("#sysMessage").html('Preencha a Inscrição Estadual');
      $('#liveToast').toast('show');
      txtIE.focus();
      cadastroValidar = true;
    }
    else if (txtTipo.value.trim() == '') {
      $("#sysMessage").html('Preencha o Tipo de Empresa');
      $('#liveToast').toast('show');
      txtTipo.focus();
      cadastroValidar = true;
    }
    else if (txtEmail.value.trim() == '') {
      $("#sysMessage").html('Preencha o Email');
      $('#liveToast').toast('show');
      txtEmail.focus();
      cadastroValidar = true;
    }
    else if (txtTelefone.value.trim() == '') {
      $("#sysMessage").html('Preencha o Telefone');
      $('#liveToast').toast('show');
      txtTelefone.focus();
      cadastroValidar = true;
    }
    else if (txtStatus.value.trim() == '') {
      $("#sysMessage").html('Preencha o Status');
      $('#liveToast').toast('show');
      txtStatus.focus();
      cadastroValidar = true;
    }
    else{
      cadastroValidar = false;
    }
  }
</script>

<script src="js/jquery.mask.js"></script>