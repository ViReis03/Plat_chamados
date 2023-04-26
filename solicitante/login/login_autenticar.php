<?php
session_start();

if ($_SESSION) {
    if (isset($_SESSION['idUsuarioSessao']) && isset($_SESSION['nomeUsuarioSessao']) && isset($_SESSION['senhaUsuarioSessao'])) {
?>

        <script>
            var idUsuarioSessao = '<?php echo $_SESSION['idUsuarioSessao']  ?>';
            var nomeUsuarioSessao = '<?php echo $_SESSION['nomeUsuarioSessao']  ?>';
            var senhaUsuarioSessao = '<?php echo $_SESSION['senhaUsuarioSessao']  ?>';
            var idEmpresaSessao = '<?php echo $_SESSION['idEmpresaSessao']  ?>';
        </script>

<?php
        $idUsuarioSessao = $_SESSION['idUsuarioSessao'];
        $nomeUsuarioSessao = $_SESSION['nomeUsuarioSessao'];
        $senhaUsuarioSessao = $_SESSION['senhaUsuarioSessao'];
        $idEmpresaSessao = $_SESSION['idEmpresaSessao'];

        if ($_SESSION['permUsuarioSessao'] != 1) {
            header("Location: login/logoff.php"); 
        }
        
    } else {
        header("Location: login/logoff.php");
    }
} else {
    header("Location: login/logoff.php");
}


?>