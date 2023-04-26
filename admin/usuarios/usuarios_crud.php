<?php
include_once("../conexao.php");

if ($_POST['type'] == 'insert') {
  $codigo_empresa = $_POST['codempresa'];
  $nome_usuario = $_POST['txtNome'];
  $img_usuario = $_POST['txtImagem'];
  $perm_usuario = $_POST['txtperm'];
  $login_usuario = $_POST['txtLogin'];
  $senha_usuario = sha1($_POST['txtSenha']);
  $obs_usuario = $_POST['txtObs'];
  $status_usuario = $_POST['txtStatus'];

  try {
    $sql = $conn->prepare(
      "insert into usuario (
        codigo_empresa,
        nome_usuario,
        img_usuario,
        perm_usuario,
        login_usuario,
        senha_usuario,
        obs_usuario,
        status_usuario
                
      )values(
        :codigo_empresa,
        :nome_usuario,
        :img_usuario,
        :perm_usuario,
        :login_usuario,
        :senha_usuario,
        :obs_usuario,
        :status_usuario
      )"
    );

    $sql->execute(array(
      ':codigo_empresa' => $codigo_empresa,
      ':nome_usuario' => $nome_usuario,
      ':img_usuario' => $img_usuario,
      ':perm_usuario' => $perm_usuario,
      ':login_usuario' => $login_usuario,
      ':senha_usuario' => $senha_usuario,
      ':obs_usuario' => $obs_usuario,
      ':status_usuario' => $status_usuario
    ));

    if ($sql->rowCount() == 1) {
      echo "<p id='message'>Dados inseridos com sucesso</p>";
      echo "<p id='IDGerado'>" . $conn->lastInsertId() . "</p>";
    }
  } catch (PDOException $ex) {
    echo $ex->getMessage();
  }
}



if ($_POST['type'] == 'search') {
  $codigo_usuario = $_POST['txtCodigo'];

  try {
    $sql = $conn->query("
            select * from usuario where codigo_usuario = $codigo_usuario
        ");

    if ($sql->rowCount() == 1) {
      foreach ($sql as $row) {
        echo "<p id='IDGerado'>" . $row['codigo_usuario'] . "</p>";
        echo "<p id='codEmpresa'>" . $row['codigo_empresa'] . "</p>";
        echo "<p id='nomeusuario'>" . $row['nome_usuario'] . "</p>";
        echo "<p id='permusuario'>" . $row['perm_usuario'] . "</p>";
        echo "<p id='loginusuario'>" . $row['login_usuario'] . "</p>";
        echo "<p id='obsusuario'>" . $row['obs_usuario'] . "</p>";
        echo "<p id='statususuario'>" . $row['status_usuario'] . "</p>";
      }
      echo "<input id='message' value='hide'></input>";
    } else {
      echo "<p id='message'>Codigo não encontrado</p>";
    }
  } catch (PDOException $ex) {
    echo $ex->getMessage();
    echo "<input id='message' value='hide'></input>";
  }
}



if ($_POST['type'] == 'update') {
  echo "<pre>";
  print_r($_POST);
  "</pre>";

  $codigo_usuario = $_POST['txtCodigo'];
  $codigo_empresa = $_POST['codempresa'];
  $nome_usuario = $_POST['txtNome'];
  $perm_usuario = $_POST['txtperm'];
  $login_usuario = $_POST['txtLogin'];
  $senha_usuario = sha1($_POST['txtSenha']);
  $obs_usuario = $_POST['txtObs'];
  $status_usuario = $_POST['txtStatus'];



  try {
    $sql = $conn->prepare("
            update usuario set
                codigo_empresa=:codigo_empresa,
                nome_usuario=:nome_usuario,
                perm_usuario=:perm_usuario,
                login_usuario=:login_usuario,
                senha_usuario=:senha_usuario,
                obs_usuario=:obs_usuario,
                status_usuario=:status_usuario
            where
                codigo_usuario=:codigo_usuario
        ");

    $sql->execute(array(
      ':codigo_usuario' => $codigo_usuario,
      ':codigo_empresa' => $codigo_empresa,
      ':nome_usuario' => $nome_usuario,
      ':perm_usuario' => $perm_usuario,
      ':login_usuario' => $login_usuario,
      ':senha_usuario' => $senha_usuario,
      ':obs_usuario' => $obs_usuario,
      ':status_usuario' => $status_usuario
    ));

    if ($sql->rowCount() == 1) {
      echo "<p id='message'>Dados alterados com sucesso</p>";
      echo "<p>Dados alterados com sucesso</p>";
    }
  } catch (PDOException $ex) {
    echo $ex->getMessage();
  }
}

if ($_POST['type'] == 'delete') {
  $codigo_usuario = $_POST['txtCodigo'];

  try {
    $sql = $conn->prepare("
            delete from usuario where codigo_usuario = :codigo_usuario
        ");

    $sql->execute(array(
      ':codigo_usuario' => $codigo_usuario
    ));

    if ($sql->rowCount() == 1) {
      echo "<p id='message'>Dados excluidos com sucesso</p>";
      echo "<p>Dados excluidos com sucesso</p>";
    }
  } catch (PDOException $ex) {
    echo $ex->getMessage();
  }
}
