<?php
include_once '../conexao.php';

try {

  $sql = $conn->query('select * from calendar');

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
