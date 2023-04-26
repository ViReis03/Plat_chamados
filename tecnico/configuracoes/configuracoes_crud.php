<?php

include_once "../conexao.php";

if ($_POST['type'] == 'trocaSenha') {
  if ($_POST['atualsenha'] != sha1($_POST['senhaDigitada'])) {
    echo "Digite Sua senha Atual Correta!";
  } elseif ($_POST['novaSenha'] != $_POST['confirmSenha']) {
    echo "Senha de confirmação diferente!";
  } else {
    $conn->query("UPDATE usuario SET senha_usuario = '" . sha1($_POST['novaSenha']) . "' where codigo_usuario = " . $_POST['userLogado']);

    echo "Senha alterada com sucesso!";
  }
}

if ($_POST['type'] == 'alterarNome') {

  $conn->query("UPDATE usuario SET nome_usuario = '".$_POST["AlterarNome"]."' where codigo_usuario = " . $_POST['userLogado']);

  echo "Nome Alterado com sucesso!";
}
