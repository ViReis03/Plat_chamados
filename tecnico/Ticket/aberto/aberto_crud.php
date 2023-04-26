<?php

include_once '../../conexao.php';

if ($_POST['type'] == 'search') {
    $codigo = $_POST['txtCodigo'];

    try {
        $sql = $conn->query("
            select * from geralticket where codigo_ticket = $codigo
        ");

        if ($sql->rowCount() == 1) {
            foreach ($sql as $row) {
                echo "<p id='IDGerado'>" . $row['codigo_ticket'] . "</p>";
                echo "<p id='data'>" . $row['datacadastro_ticket'] . "</p>";
                echo "<p id='tipo'>" . $row['tipo_ticket'] . "</p>";
                echo "<p id='user'>" . $row['codigo_usuario'] . "</p>";
                echo "<p id='cat1'>" . $row['codigo_cat1'] . "</p>";
                echo "<p id='cat2'>" . $row['codigo_cat2'] . "</p>";
                echo "<p id='cat3'>" . $row['codigo_cat3'] . "</p>";
                echo "<p id='assunto'>" . $row['assunto_ticket'] . "</p>";
                echo "<p id='desc'>" . $row['desc_ticket'] . "</p>";
                echo "<p id='progress'>" . $row['progresso_ticket'] . "</p>";
                echo "<p id='empresa'>" . $row['codigo_empresa'] . "</p>";
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

if ($_POST['type'] == 'historic') {

    $codigo = $_POST['txtCodigo'];
    $usuario = $_POST['usuario'];
    $desc = $_POST['descricao'];
    $tempo = $_POST['tempo'];
    $progress = $_POST['progresso'];

    try {
        $sql = $conn->prepare("
            insert into historico
            (codigo_ticket, codigo_usuario, desc_historico, progresso_historico, tempo_historico)
            VALUES
            (:codigo_ticket, :codigo_usuario, :desc_historico, :progresso_historico, :tempo_historico)
        ");

        $sql->execute(array(
            ':codigo_ticket' => $codigo,
            ':codigo_usuario' => $usuario,
            ':desc_historico' => $desc,
            ':progresso_historico' => $progress,
            ':tempo_historico' => $tempo
        ));

        if ($sql->rowCount() == 1) {
            echo "<p id='message'>Dados inseridos com sucesso</p>";

            if ($progress == 100) {
                $data = $conn->query('update geralTicket set status_ticket = 4, progresso_ticket = ' . $progress . ' where codigo_ticket =' . $codigo);
            } else {
                $data = $conn->query('update geralTicket set status_ticket = 2, progresso_ticket = ' . $progress . ' where codigo_ticket =' . $codigo);
            }
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        echo "<input id='message' value='hide'></input>";
    }
}

if ($_POST['type'] == 'carregarHistorico') {
    try {
        $data = $conn->query('
        select h.codigo_ticket, u.nome_usuario, h.desc_historico, h.datacadastro_historico, h.progresso_historico, h.tempo_historico 
        from historico as h
        inner join usuario as u
        ON h.codigo_usuario = u.codigo_usuario
        where h.codigo_ticket =' . $_POST['txtCodigo']);

        foreach ($data as $ticket) {
?>
            <div class="bg-light my-2">
                <div class="d-flex justify-content-between rounded-top p-2">
                    <div> <?php echo 'Tecnico: ' . $ticket['nome_usuario'] ?> </div>
                    <div> <?php echo $ticket['datacadastro_historico'] ?> </div>
                </div>
                <hr class="m-2 p-0">

                <div class="m-2"><?php echo $ticket['desc_historico'] ?></div>

                <hr class="m-2 p-0">

                <div class="d-flex justify-content-between rounded-top p-2">
                    <div> <?php echo 'Concluido: ' . $ticket['progresso_historico'] . '%' ?> </div>
                    <div> <?php echo 'Tempo Gasto: ' . $ticket['tempo_historico'] ?> </div>
                </div>

            </div>
            <?php
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

if ($_POST['type'] == 'update') {

    $codigo = $_POST['txtCodigo'];
    $empresa = $_POST['empresa'];
    $usuario = $_POST['usuario'];
    $tipo = $_POST['tipo'];
    $cat1 = $_POST['cat1'];
    $cat2 = $_POST['cat2'];
    $cat3 = $_POST['cat3'];

    try {
        $sql = $conn->prepare("
                update geralticket set
                    codigo_empresa=:codigo_empresa,
                    codigo_usuario=:codigo_usuario,
                    tipo_ticket=:tipo_ticket,
                    codigo_cat1=:codigo_cat1,
                    codigo_cat2=:codigo_cat2,
                    codigo_cat3=:codigo_cat3 
                where codigo_ticket=:codigo_ticket
            ");

        $sql->execute(array(
            ':codigo_ticket' => $codigo,
            ':codigo_usuario' => $usuario,
            ':codigo_empresa' => $empresa,
            ':tipo_ticket' => $tipo,
            ':codigo_cat1' => $cat1,
            ':codigo_cat2' => $cat2,
            ':codigo_cat3' => $cat3,
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
    $codigo_ticket = $_POST['txtCodigo'];

    try {
        $conn->query('delete from historico where codigo_ticket = ' . $codigo_ticket);

        $sql = $conn->prepare("
            delete from geralticket where codigo_ticket = :codigo_ticket
        ");

        $sql->execute(array(
            ':codigo_ticket' => $codigo_ticket
        ));

        if ($sql->rowCount() == 1) {
            echo "<p id='message'>Dados excluidos com sucesso</p>";
            echo "<p>Dados excluidos com sucesso</p>";

            $conn->query('delete from calendar where codigo_ticket = ' . $codigo_ticket);
            $conn->query('delete from notification where codigo_ticket = ' . $codigo_ticket);
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

if ($_POST['type'] == 'sAguardar') {
    $sql = $conn->query('update geralTicket set status_ticket = 3 where codigo_ticket =' . $_POST['txtCodigo']);

    echo "<p id='message'>Status Definido como Aguardando</p>";
}

if ($_POST['type'] == 'insertChat') {

    $chatMensagem = $_POST['mensagem'];
    $chatUser = $_POST['usuario'];
    $chatTicket = $_POST['txtCodigo'];

    try {
        $sql = $conn->query("INSERT INTO CHAT (mensagem_chat, codigo_usuario, codigo_ticket) VALUES ('$chatMensagem', '$chatUser', '$chatTicket')");
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

if ($_POST['type'] == 'carregarChat') {

    $chatUser = $_POST['usuario'];
    $chatTicket = $_POST['txtCodigo'];

    try {
        $sql = $conn->query("
        SELECT c.mensagem_chat, c.codigo_usuario, u.nome_usuario 
        FROM CHAT as c 
        INNER JOIN usuario as u ON
        c.codigo_usuario =  u.codigo_usuario
        WHERE codigo_ticket = $chatTicket");

        foreach ($sql as $row) {
            if ($row['codigo_usuario'] == $chatUser) {
            ?>
                <div class="d-flex flex-column">
                    <span class="chatAutor d-flex justify-content-end pb-1">
                        <img src="img/icon_user.png" class="chatIcon">
                        Você ( <?php echo $row['nome_usuario'] ?> )
                    </span>
                    <div class="d-flex align-items-baseline text-end justify-content-end mb-4">
                        <div class="card card-text d-inline-block p-2 px-3 m-1"><?php echo $row['mensagem_chat'] ?></div>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="d-flex flex-column">
                    <span class="chatAutor pb-1">
                        <img src="img/icon_user.png" class="chatIcon">
                        <?php echo $row['nome_usuario'] ?>
                    </span>
                    <div>
                        <div class="card card-text d-inline-block p-2 px-3 m-1"><?php echo $row['mensagem_chat'] ?></div>
                    </div>
                </div>
<?php
            }
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}
