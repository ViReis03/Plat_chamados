<?php
$tipo    = $_POST['txtTipo'];
$cat1    = $_POST['txtCat1'];
$cat2    = $_POST['txtCat2'];
$cat3    = $_POST['txtCat3'];
$assunto = $_POST['txtAssunto'];
$desc    = $_POST['txtDesc'];
$usuario = $_POST['codigoUser'];
$empresa = $_POST['codigoEmpresa'];
$status  = 1;

include '../../conexao.php';

try {
    $data = $conn->prepare('INSERT INTO 
        geralTicket ( 
            codigo_cat1,
            codigo_cat2,
            codigo_cat3,
            codigo_usuario,
            codigo_empresa,
            assunto_ticket,
            desc_ticket,
            tipo_ticket,
            status_ticket)
            
            VALUES(
            :codigo_cat1,
            :codigo_cat2,
            :codigo_cat3,
            :codigo_usuario,
            :codigo_empresa,
            :assunto_ticket,
            :desc_ticket,
            :tipo_ticket,
            :status_ticket
        )');

    $data->execute(array(
        ':codigo_cat1'    => $cat1,
        ':codigo_cat2'    => $cat2,
        ':codigo_cat3'    => $cat3,
        ':codigo_usuario' => $usuario,
        ':codigo_empresa' => $empresa,
        ':assunto_ticket' => $assunto,
        ':desc_ticket'    => $desc,
        ':tipo_ticket'    => $tipo,
        ':status_ticket'   => $status
    ));

    if ($data->rowCount() == 1) {

        $id = $conn->lastInsertId();

        echo "<p id='message'>Ticket Aberto com Sucesso</p>";
        echo "<p id='IDGerado'>" . $id . "</p>";

        $conn->query("INSERT INTO notification(text, status, codigo_usuario, codigo_ticket) 
        VALUES('Ticket Aberto','0','$usuario','$id') ");

        $sql = $conn->query('INSERT INTO calendar(nome_evento, cor_evento, url_evento, codigo_ticket) 
        VALUES ("Ticket Criado ID: ' . $id . '","#198754","?pag=ticket_aberto&idTicket=' . $id . '", "'.$id.'")');

        print_r($sql);
    }
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
