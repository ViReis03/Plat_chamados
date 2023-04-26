<?php
        include "admin/conexao.php";

        $_login = $_POST['txtLogin'];
        $_pw = sha1($_POST['txtSenha']);

        $sql = $conn->query("select codigo_usuario, nome_usuario , senha_usuario, perm_usuario, codigo_empresa from usuario where login_usuario = '" . $_login . "' and senha_usuario = '" . $_pw . "'");

        if ($sql->rowCount() > 0) {
            session_start();

            foreach ($sql as $row) {
                $_SESSION['idUsuarioSessao'] = $row[0];
                $_SESSION['nomeUsuarioSessao'] = $row[1];
                $_SESSION['senhaUsuarioSessao'] = $row[2];
                $_SESSION['permUsuarioSessao'] = $row[3];
                $_SESSION['idEmpresaSessao'] = $row[4];
            }

            if ($_SESSION['permUsuarioSessao'] == 3) {
              echo "<p id='message'>Login Realizado admin</p>";
              echo "<p id='permissao'>".$_SESSION['permUsuarioSessao']."</p>";
            } elseif ($_SESSION['permUsuarioSessao'] == 2) {
              echo "<p id='message'>Login Realizado tecnico</p>";
              echo "<p id='permissao'>".$_SESSION['permUsuarioSessao']."</p>";
            } else {
              echo "<p id='message'>Login Realizado Solicitante</p>";
              echo "<p id='permissao'>".$_SESSION['permUsuarioSessao']."</p>";
            }
        } else {
          echo "<p id='message'>Usuario ou Senha incorreto</p>";
        }
    
    ?>