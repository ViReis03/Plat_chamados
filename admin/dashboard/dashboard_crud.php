<?php
include_once "../conexao.php";

if ($_POST['type'] == 'aberto') {

  try {
    $sql = $conn->query("
      select g.codigo_ticket, u.nome_usuario, g.assunto_ticket, g.datacadastro_ticket, g.progresso_ticket
      from geralticket as g inner join usuario as u
      ON g.codigo_usuario = u.codigo_usuario
      where status_ticket = 1
    ");
    $dashcount = 0;
    foreach ($sql as $row) {
      if ($row['codigo_ticket'] != "") {

        $data = date('d/m/Y', strtotime($row['datacadastro_ticket']));
        $dashcount += 1;
?>

        <div class="bg-dark rounded mb-2" onclick="cliquei(<?php echo $row['codigo_ticket'] ?>)">
          <div class="bg-cinza rounded position-relative ms-1">
            <div class="dashTitle text-start mx-2"><?php echo $row['assunto_ticket'] ?></div>

            <div class="progress mx-1" style="height: 5px;">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 0%"></div>
            </div>

            <div class="d-flex justify-content-between  p-2">
              <span class="dashAutor">
                <img src="img/icon_user.png" class="dashIcon">
                <?php echo $row['nome_usuario'] ?>
              </span>
              <span class="dashAutor"><?php echo $data ?></span>
            </div>
          </div>
        </div>

      <?php

      }
    }
    echo "<input id='CountAberto' value='$dashcount' class='d-none'>";
  } catch (PDOException $ex) {
    echo $ex->getMessage();
  }
}

if ($_POST['type'] == 'atendimento') {

  try {
    $sql = $conn->query("
      select g.codigo_ticket, u.nome_usuario, g.assunto_ticket, g.datacadastro_ticket, g.progresso_ticket
      from geralticket as g inner join usuario as u
      ON g.codigo_usuario = u.codigo_usuario
      where status_ticket = 2
    ");
    $dashcount = 0;
    foreach ($sql as $row) {
      if ($row['codigo_ticket'] != "") {

        $data = date('d/m/Y', strtotime($row['datacadastro_ticket']));
        $dashcount += 1;

      ?>

        <div class="bg-dark rounded mb-2" onclick="cliquei(<?php echo $row['codigo_ticket'] ?>)">
          <div class="bg-cinza rounded position-relative ms-1">
            <div class="dashTitle text-start mx-2"><?php echo $row['assunto_ticket'] ?></div>

            <div class="progress mx-1" style="height: 5px;">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: <?php echo $row['progresso_ticket'] ?>%"></div>
            </div>

            <div class="d-flex justify-content-between  p-2">
              <span class="dashAutor">
                <img src="img/icon_user.png" class="dashIcon">
                <?php echo $row['nome_usuario'] ?>
              </span>
              <span class="dashAutor"><?php echo $data ?></span>
            </div>
          </div>
        </div>

      <?php

      }
    }
    echo "<input id='CountAtendimento' value='$dashcount' class='d-none'>";
  } catch (PDOException $ex) {
    echo $ex->getMessage();
  }
}

if ($_POST['type'] == 'aguardando') {

  try {
    $sql = $conn->query("
      select g.codigo_ticket, u.nome_usuario, g.assunto_ticket, g.datacadastro_ticket, g.progresso_ticket
      from geralticket as g inner join usuario as u
      ON g.codigo_usuario = u.codigo_usuario
      where status_ticket = 3
    ");
    $dashcount = 0;
    foreach ($sql as $row) {
      if ($row['codigo_ticket'] != "") {

        $data = date('d/m/Y', strtotime($row['datacadastro_ticket']));
        $dashcount += 1;

      ?>

        <div class="bg-dark rounded mb-2" onclick="cliquei(<?php echo $row['codigo_ticket'] ?>)">
          <div class="bg-cinza rounded position-relative ms-1">
            <div class="dashTitle text-start mx-2"><?php echo $row['assunto_ticket'] ?></div>

            <div class="progress mx-1" style="height: 5px;">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: <?php echo $row['progresso_ticket'] ?>%"></div>
            </div>

            <div class="d-flex justify-content-between  p-2">
              <span class="dashAutor">
                <img src="img/icon_user.png" class="dashIcon">
                <?php echo $row['nome_usuario'] ?>
              </span>
              <span class="dashAutor"><?php echo $data ?></span>
            </div>
          </div>
        </div>

      <?php

      }
    }
    echo "<input id='CountAguardando' value='$dashcount' class='d-none'>";
  } catch (PDOException $ex) {
    echo $ex->getMessage();
  }
}

if ($_POST['type'] == 'finalizado') {

  try {
    $sql = $conn->query("
      select g.codigo_ticket, u.nome_usuario, g.assunto_ticket, g.datacadastro_ticket, g.progresso_ticket
      from geralticket as g inner join usuario as u
      ON g.codigo_usuario = u.codigo_usuario
      where status_ticket = 4
    ");
    $dashcount = 0;
    foreach ($sql as $row) {
      if ($row['codigo_ticket'] != "") {

        $data = date('d/m/Y', strtotime($row['datacadastro_ticket']));
        $dashcount += 1;

      ?>

        <div class="bg-dark rounded mb-2" onclick="cliquei(<?php echo $row['codigo_ticket'] ?>)">
          <div class="bg-cinza rounded position-relative ms-1">
            <div class="dashTitle text-start mx-2"><?php echo $row['assunto_ticket'] ?></div>

            <div class="progress mx-1" style="height: 5px;">
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 100%"></div>
            </div>

            <div class="d-flex justify-content-between  p-2">
              <span class="dashAutor">
                <img src="img/icon_user.png" class="dashIcon">
                <?php echo $row['nome_usuario'] ?>
              </span>
              <span class="dashAutor"><?php echo $data ?></span>
            </div>
          </div>
        </div>

<?php

      }
    }
    echo "<input id='CountFinalizado' value='$dashcount' class='d-none'>";
  } catch (PDOException $ex) {
    echo $ex->getMessage();
  }
}
