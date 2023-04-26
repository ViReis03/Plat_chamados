<?php

    include_once("../conexao.php");

    if ($_POST['type'] == 'insert') {

        $nome_empresa=      $_POST['txtNome'];
        $razao_empresa=     $_POST['txtRazao'];
        $cep_empresa=       $_POST['txtCEP'];
        $endereco_empresa=  $_POST['txtEndereco'];
        $bairro_empresa=    $_POST['txtBairro'];
        $uf_empresa=        $_POST['txtUF'];
        $cidade_empresa=    $_POST['txtCidade'];
        $numero_empresa=    $_POST['txtNumero'];
        $cnpj_empresa=      $_POST['txtCNPJ'];
        $ie_empresa=        $_POST['txtIE'];
        $tipo_empresa=      $_POST['txtTipo'];
        $mail_empresa=      $_POST['txtEmail'];
        $tel_empresa=       $_POST['txtTelefone'];
        $status_empresa=    $_POST['txtStatus'];
        $obs_empresa=       $_POST['txtObs'];
    
    
        try
        {
            $sql = $conn->prepare
            (
                "insert into empresa (
                    nome_empresa,
                    razao_empresa,
                    cep_empresa,
                    endereco_empresa,
                    bairro_empresa,
                    uf_empresa,
                    numero_empresa,
                    cidade_empresa,
                    tipo_empresa,
                    cnpj_empresa,
                    ie_empresa,
                    mail_empresa,
                    tel_empresa,
                    obs_empresa,
                    status_empresa
                    
                )values(
                        :nome_empresa,
                        :razao_empresa,
                        :cep_empresa,
                        :endereco_empresa,
                        :bairro_empresa,
                        :uf_empresa,
                        :numero_empresa,
                        :cidade_empresa,
                        :tipo_empresa,
                        :cnpj_empresa,
                        :ie_empresa,
                        :mail_empresa,
                        :tel_empresa,
                        :obs_empresa,
                        :status_empresa
                )"
            );
    
            $sql->execute(array(
                ':nome_empresa'=>$nome_empresa,
                ':razao_empresa'=>$razao_empresa,
                ':cep_empresa'=>$cep_empresa,
                ':endereco_empresa'=>$endereco_empresa,
                ':bairro_empresa'=>$bairro_empresa,
                ':uf_empresa'=>$uf_empresa,
                ':numero_empresa'=>$numero_empresa,
                ':cidade_empresa'=>$cidade_empresa,
                ':tipo_empresa'=>$tipo_empresa,
                ':cnpj_empresa'=>$cnpj_empresa,
                ':ie_empresa'=>$ie_empresa,
                ':mail_empresa'=>$mail_empresa,
                ':tel_empresa'=>$tel_empresa,
                ':obs_empresa'=>$obs_empresa,
                ':status_empresa'=>$status_empresa
            ));
    
            if($sql->rowCount()==1)
            {
                echo "<p id='message'>Dados inseridos com sucesso</p>";
                echo "<p id='IDGerado'>".$conn->lastInsertId()."</p>";
            }
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }

    if ($_POST['type'] == 'search') {
        $codigo_empresa=$_POST['txtCodigo'];	

        try
        {
            $sql = $conn->query("
                select * from empresa where codigo_empresa = $codigo_empresa
            ");

            if($sql->rowCount()==1)
            {
                foreach($sql as $row)
                {
                    echo "<p id='IDGerado'>".$row['codigo_empresa']."</p>";
                    echo "<p id='nomeempresa'>".$row['nome_empresa']."</p>";
                    echo "<p id='razaoempresa'>".$row['razao_empresa']."</p>";
                    echo "<p id='cepempresa'>".$row['cep_empresa']."</p>";
                    echo "<p id='enderecoempresa'>".$row['endereco_empresa']."</p>";
                    echo "<p id='bairroempresa'>".$row['bairro_empresa']."</p>";
                    echo "<p id='ufempresa'>".$row['uf_empresa']."</p>";
                    echo "<p id='numeroempresa'>".$row['numero_empresa']."</p>";
                    echo "<p id='cidadeempresa'>".$row['cidade_empresa']."</p>";
                    echo "<p id='cnpjempresa'>".$row['cnpj_empresa']."</p>";
                    echo "<p id='ieempresa'>".$row['ie_empresa']."</p>";
                    echo "<p id='tipoempresa'>".$row['tipo_empresa']."</p>";
                    echo "<p id='mailempresa'>".$row['mail_empresa']."</p>";
                    echo "<p id='telempresa'>".$row['tel_empresa']."</p>";
                    echo "<p id='statusempresa'>".$row['status_empresa']."</p>";
                    echo "<p id='obsempresa'>".$row['obs_empresa']."</p>";
                }
                echo "<input id='message' value='hide'></input>";
            }
            else
            {
                echo "<p id='message'>Codigo não encontrado</p>";
            }
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
            echo "<input id='message' value='hide'></input>";
        }
    }

    if ($_POST['type'] == 'update'){
        $codigo_empresa=$_POST['txtCodigo'];
        $nome_empresa=$_POST['txtNome'];
        $razao_empresa=$_POST['txtRazao'];
        $cep_empresa=$_POST['txtCEP'];
        $endereco_empresa=$_POST['txtEndereco'];
        $bairro_empresa=$_POST['txtBairro'];
        $uf_empresa=$_POST['txtUF'];
        $cidade_empresa=$_POST['txtCidade'];
        $numero_empresa=$_POST['txtNumero'];
        $cnpj_empresa=$_POST['txtCNPJ'];
        $ie_empresa=$_POST['txtIE'];
        $tipo_empresa=$_POST['txtTipo'];
        $mail_empresa=$_POST['txtEmail'];
        $tel_empresa=$_POST['txtTelefone'];
        $status_empresa=$_POST['txtStatus'];
        $obs_empresa=$_POST['txtObs'];



        try
        {
            $sql = $conn->prepare
            ("
                update empresa set
                    codigo_empresa=:codigo_empresa,
                    nome_empresa=:nome_empresa,
                    razao_empresa=:razao_empresa,
                    cep_empresa=:cep_empresa,
                    endereco_empresa=:endereco_empresa,
                    bairro_empresa=:bairro_empresa,
                    uf_empresa=:uf_empresa,
                    numero_empresa=:numero_empresa,
                    cidade_empresa=:cidade_empresa,
                    tipo_empresa=:tipo_empresa,
                    cnpj_empresa=:cnpj_empresa,
                    ie_empresa=:ie_empresa,
                    mail_empresa=:mail_empresa,
                    tel_empresa=:tel_empresa,
                    obs_empresa=:obs_empresa,
                    status_empresa=:status_empresa
                where
                    codigo_empresa=:codigo_empresa
            ");

            $sql->execute(array(
                ':codigo_empresa'=>$codigo_empresa,
                ':nome_empresa'=>$nome_empresa,
                ':razao_empresa'=>$razao_empresa,
                ':cep_empresa'=>$cep_empresa,
                ':endereco_empresa'=>$endereco_empresa,
                ':bairro_empresa'=>$bairro_empresa,
                ':uf_empresa'=>$uf_empresa,
                ':numero_empresa'=>$numero_empresa,
                ':cidade_empresa'=>$cidade_empresa,
                ':tipo_empresa'=>$tipo_empresa,
                ':cnpj_empresa'=>$cnpj_empresa,
                ':ie_empresa'=>$ie_empresa,
                ':mail_empresa'=>$mail_empresa,
                ':tel_empresa'=>$tel_empresa,
                ':obs_empresa'=>$obs_empresa,
                ':status_empresa'=>$status_empresa
            ));

            if($sql->rowCount()==1){
                echo "<p id='message'>Dados alterados com sucesso</p>";
                echo "<p>Dados alterados com sucesso</p>";
            }
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }

    if ($_POST['type'] == 'delete') {
        $codigo_empresa=$_POST['txtCodigo'];

        try
        {
            $sql = $conn->prepare
            ("
                delete from empresa where codigo_empresa = :codigo_empresa
            ");

            $sql->execute(array(
                ':codigo_empresa'=>$codigo_empresa
            ));

            if($sql->rowCount()==1)
            {
                echo "<p id='message'>Dados excluidos com sucesso</p>";
                echo "<p>Dados excluidos com sucesso</p>";
            }
        }
        catch(PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }
?>