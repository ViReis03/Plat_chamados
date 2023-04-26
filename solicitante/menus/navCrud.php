<?php

include '../conexao.php';

if ($_POST['type'] == 'carregar') {

  try {
    $data = $conn->query('SELECT * from notification where codigo_usuario = ' . $_POST['usuario']);

    $count = $data->rowCount();

    foreach ($data as $tata) {

      $id = $tata['codigo_ticket'];
?>
      <div class="m-1 bg-light">
        <div class="d-flex justify-content-between align-items-center">
          <span class="notTittle">Nova Notificação</span>
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x notificationbtn" viewBox="0 0 16 16" onclick="deleteNotify('<?php echo $tata['id'] ?>')">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
          </svg>
        </div>

        <hr class="p-0 m-0">

        <div class="align-items-center notificationbtn">
          <a onclick="abrirNotification('<?php echo $id ?>')"><?php echo $tata["text"] ?> - <?php echo $id ?></a>
        </div>
      </div>

<?php
    }
    echo '<input class="d-none" id="contador" value="' . $count . '">';
  } catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
  }
}

if ($_POST['type'] == 'delete') {

  try {
    $data = $conn->prepare("DELETE FROM notification WHERE id = " . $_POST['deletar']);

    $data->execute();
  } catch (PDOException $e) {
    echo 'ERROR:  ' . $e->getMessage();
  }
}
?>