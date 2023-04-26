<?php

include_once("../../conexao.php");

if ($_POST['type'] == 'insert') {
    $nome_cat1 = $_POST['txtNome'];
    $desc_cat1 = $_POST['txtDesc'];
    $obs_cat1 = $_POST['txtObs'];
    $status_cat1 = $_POST['txtStatus'];

    try {
        $sql = $conn->prepare(
            "insert into cat1 (
                nome_cat1,
                desc_cat1,
                obs_cat1,
                status_cat1
                
            )values(
                :nome_cat1,
                :desc_cat1,
                :obs_cat1,
                :status_cat1
            )"
        );

        $sql->execute(array(
            ':nome_cat1' => $nome_cat1,
            ':desc_cat1' => $desc_cat1,
            ':obs_cat1' => $obs_cat1,
            ':status_cat1' => $status_cat1
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
    $codigo_cat1 = $_POST['txtCodigo'];

    try {
        $sql = $conn->query("
            select * from cat1 where codigo_cat1 = $codigo_cat1
        ");

        if ($sql->rowCount() == 1) {
            foreach ($sql as $row) {
                echo "<p id='IDGerado'>" . $row['codigo_cat1'] . "</p>";
                echo "<p id='nomeCat1'>" . $row['nome_cat1'] . "</p>";
                echo "<p id='descCat1'>" . $row['desc_cat1'] . "</p>";
                echo "<p id='obsCat1'>" . $row['obs_cat1'] . "</p>";
                echo "<p id='statusCat1'>" . $row['status_cat1'] . "</p>";
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
    $codigo_cat1 = $_POST['txtCodigo'];
    $nome_cat1 = $_POST['txtNome'];
    $desc_cat1 = $_POST['txtDesc'];
    $obs_cat1 = $_POST['txtObs'];
    $status_cat1 = $_POST['txtStatus'];

    try {
        $sql = $conn->prepare("
            update cat1 set
                nome_cat1=:nome_cat1,
                desc_cat1=:desc_cat1,
                obs_cat1=:obs_cat1,
                status_cat1=:status_cat1
            where
                codigo_cat1=:codigo_cat1
        ");

        $sql->execute(array(
            ':codigo_cat1' => $codigo_cat1,
            ':nome_cat1' => $nome_cat1,
            ':desc_cat1' => $desc_cat1,
            ':obs_cat1' => $obs_cat1,
            ':status_cat1' => $status_cat1
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
    $codigo_cat1 = $_POST['txtCodigo'];

    try {
        $sql = $conn->prepare("
            delete from cat1 where codigo_cat1 = :codigo_cat1
        ");

        $sql->execute(array(
            ':codigo_cat1' => $codigo_cat1
        ));

        if ($sql->rowCount() == 1) {
            echo "<p id='message'>Dados excluidos com sucesso</p>";
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}
