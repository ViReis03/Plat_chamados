<?php
include_once '../conexao.php';

session_start();

$usuario = $_SESSION['idUsuarioSessao'];

try {

  $sql = $conn->query("select * from calendar as c
  inner join geralticket as g ON c.codigo_ticket = g.codigo_ticket
  where g.codigo_usuario = $usuario");

  foreach ($sql as $value) {
    $eventos[] = [
      'title' => $value['nome_evento'],
      'color' => $value['cor_evento'],
      'start' => $value['inicio_evento'],
      'end' => $value['final_evento'],
      'url' => $value['url_evento'],
    ];
  }

  echo json_encode($eventos);
} catch (PDOException $e) {
  echo 'ERROR: ' . $e->getMessage();
}
