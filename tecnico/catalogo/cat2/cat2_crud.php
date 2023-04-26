<?php

include_once '../../conexao.php';

if ($_POST['type'] == 'insert') {
    $codigo_cat1 = $_POST['txtCategoria'];
    $nome_cat2 = $_POST['txtNome'];
    $desc_cat2 = $_POST['txtDesc'];
    $obs_cat2 = $_POST['txtObs'];
    $status_cat2 = $_POST['txtStatus'];

    try {
        $sql = $conn->prepare(
            "insert into cat2 (
                codigo_cat1,
                nome_cat2,
                desc_cat2,
                obs_cat2,
                status_cat2
                
            )values(
                :codigo_cat1,
                :nome_cat2,
                :desc_cat2,
                :obs_cat2,
                :status_cat2
            )"
        );

        $sql->execute(array(
            ':codigo_cat1' => $codigo_cat1,
            ':nome_cat2' => $nome_cat2,
            ':desc_cat2' => $desc_cat2,
            ':obs_cat2' => $obs_cat2,
            ':status_cat2' => $status_cat2
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
    $codigo_cat2 = $_POST['txtCodigo'];

    try {
        $sql = $conn->query("
            select * from cat2 where codigo_cat2 = $codigo_cat2
        ");

        if ($sql->rowCount() == 1) {
            foreach ($sql as $row) {
                echo "<p id='IDGerado'>" . $row['codigo_cat2'] . "</p>";
                echo "<p id='idcat1'>" . $row['codigo_cat1'] . "</p>";
                echo "<p id='nomecat2'>" . $row['nome_cat2'] . "</p>";
                echo "<p id='desccat2'>" . $row['desc_cat2'] . "</p>";
                echo "<p id='obscat2'>" . $row['obs_cat2'] . "</p>";
                echo "<p id='statuscat2'>" . $row['status_cat2'] . "</p>";
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
    $codigo_cat2 = $_POST['txtCodigo'];
    $codigo_cat1 = $_POST['txtCat1'];
    $nome_cat2 = $_POST['txtNome'];
    $desc_cat2 = $_POST['txtDesc'];
    $obs_cat2 = $_POST['txtObs'];
    $status_cat2 = $_POST['txtStatus'];

    try {
        $sql = $conn->prepare("
            update cat2 set
                codigo_cat1=:codigo_cat1,
                nome_cat2=:nome_cat2,
                desc_cat2=:desc_cat2,
                obs_cat2=:obs_cat2,
                status_cat2=:status_cat2
            where
                codigo_cat2=:codigo_cat2
        ");

        $sql->execute(array(
            ':codigo_cat2' => $codigo_cat2,
            ':codigo_cat1' => $codigo_cat1,
            ':nome_cat2' => $nome_cat2,
            ':desc_cat2' => $desc_cat2,
            ':obs_cat2' => $obs_cat2,
            ':status_cat2' => $status_cat2
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
    $codigo_cat2 = $_POST['txtCodigo'];

    try {
        $sql = $conn->prepare("
            delete from cat2 where codigo_cat2 = :codigo_cat2
        ");

        $sql->execute(array(
            ':codigo_cat2' => $codigo_cat2
        ));

        if ($sql->rowCount() == 1) {
            echo "<p id='message'>Dados excluidos com sucesso</p>";
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}
