<?php

include_once '../../conexao.php';

if ($_POST['type'] == 'insert') {
    $codigo_cat2 = $_POST['txtSubCategoria'];
    $nome_cat3 = $_POST['txtNome'];
    $desc_cat3 = $_POST['txtDesc'];
    $obs_cat3 = $_POST['txtObs'];
    $status_cat3 = $_POST['txtStatus'];

    try {
        $sql = $conn->prepare(
            "insert into cat3 (
                codigo_cat2,
                nome_cat3,
                desc_cat3,
                obs_cat3,
                status_cat3
                
            )values(
                :codigo_cat2,
                :nome_cat3,
                :desc_cat3,
                :obs_cat3,
                :status_cat3
            )"
        );

        $sql->execute(array(
            ':codigo_cat2' => $codigo_cat2,
            ':nome_cat3' => $nome_cat3,
            ':desc_cat3' => $desc_cat3,
            ':obs_cat3' => $obs_cat3,
            ':status_cat3' => $status_cat3
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
    $codigo_cat3 = $_POST['txtCodigo'];

    try {
        $sql = $conn->query("
            select * from cat3 where codigo_cat3 = $codigo_cat3
        ");

        if ($sql->rowCount() == 1) {
            foreach ($sql as $row) {
                echo "<p id='IDGerado'>" . $row['codigo_cat3'] . "</p>";
                echo "<p id='cat2'>" . $row['codigo_cat2'] . "</p>";
                echo "<p id='nomecat3'>" . $row['nome_cat3'] . "</p>";
                echo "<p id='desccat3'>" . $row['desc_cat3'] . "</p>";
                echo "<p id='obscat3'>" . $row['obs_cat3'] . "</p>";
                echo "<p id='statuscat3'>" . $row['status_cat3'] . "</p>";
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
    $codigo_cat3 = $_POST['txtCodigo'];
    $codigo_cat2 = $_POST['txtSubCategoria'];
    $nome_cat3 = $_POST['txtNome'];
    $desc_cat3 = $_POST['txtDesc'];
    $obs_cat3 = $_POST['txtObs'];
    $status_cat3 = $_POST['txtStatus'];

    try {
        $sql = $conn->prepare("
            update cat3 set
                codigo_cat2=:codigo_cat2,
                nome_cat3=:nome_cat3,
                desc_cat3=:desc_cat3,
                obs_cat3=:obs_cat3,
                status_cat3=:status_cat3
            where
                codigo_cat3=:codigo_cat3
        ");

        $sql->execute(array(
            ':codigo_cat2' => $codigo_cat2,
            ':codigo_cat3' => $codigo_cat3,
            ':nome_cat3' => $nome_cat3,
            ':desc_cat3' => $desc_cat3,
            ':obs_cat3' => $obs_cat3,
            ':status_cat3' => $status_cat3
        ));

        if ($sql->rowCount() == 1) {
            echo "<p id='message'>Dados alterados com sucesso</p>";
            echo "<p id='IDGerado'>" . $codigo_cat2 . "</p>";
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

if ($_POST['type'] == 'delete') {
    $codigo_cat3 = $_POST['txtCodigo'];

    try {
        $sql = $conn->prepare("
            delete from cat3 where codigo_cat3 = :codigo_cat3
        ");

        $sql->execute(array(
            ':codigo_cat3' => $codigo_cat3
        ));

        if ($sql->rowCount() == 1) {
            echo "<p id='message'>Dados excluidos com sucesso</p>";
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}
