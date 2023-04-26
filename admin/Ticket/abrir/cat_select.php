<?php
    include '../../conexao.php';

    if ($_POST['txtcat1']) {

        $categoria = $_POST['txtcat1'];

        try {
            $data = $conn->query('SELECT codigo_cat2, nome_cat2 FROM cat2 where codigo_cat1 = '.$categoria);
        
            foreach($data as $load) {
                echo '<option value="'. $load['codigo_cat2'].'">'. $load['codigo_cat2']. " - " .$load['nome_cat2'].'</option>';      
            }
        } catch ( PDOException $e ) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    if ($_POST['txtcat2']) {

        $categoria = $_POST['txtcat2'];

        try {
            $data = $conn->query('SELECT codigo_cat3, nome_cat3 FROM cat3 where codigo_cat2 = '.$categoria);
        
            foreach($data as $load) {
                echo '<option value="'. $load['codigo_cat3'].'">'. $load['codigo_cat3']. " - " .$load['nome_cat3'].'</option>';      
            }
        } catch ( PDOException $e ) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    if ($_POST['txtEmpresa']) {

        $empresa = $_POST['txtEmpresa'];

        try {
            $data = $conn->query('SELECT codigo_usuario, nome_usuario FROM usuario where codigo_empresa = '.$empresa);

            foreach ($data as $load) {
              $id = $load['codigo_usuario'];
          ?>
              <option value="<?php echo $id ?>"><?php echo $load['codigo_usuario'] . " - " . $load['nome_usuario'] ?></option>
          <?php

            }
          } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
          }
    }
?>