<div class="container text-center mt-3">
    <div class="row text-center mt-3">
        <div class="col-sm-5"></div>

        <div class="col-sm-2">
            <h1 class="mb-4">Usuários</h1>
        </div>

        <div class="col-sm-5 d-flex flex-row-reverse bd-highlight h-25">
            <button type="button" class="btn btn-success d-flex flex-row-reverse" data-bs-toggle="modal" data-bs-target="#myModal" onclick="$('#btoLimpar').click()"> Gerenciador de Usuarios </button>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        <table id="example" class="hover">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cadastro</th>
                    <th scope="col">Permissão</th>
                    <th scope="col">Login</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include 'conexao.php';

                try {
                    $data = $conn->query('SELECT U.codigo_usuario, U.nome_usuario, E.nome_empresa, U.login_usuario, U.cadastro_usuario, U.status_usuario, U.perm_usuario FROM usuario as U INNER JOIN empresa as E ON U.codigo_empresa = E.codigo_empresa');

                    foreach ($data as $usuario) {
                        $id = $usuario['codigo_usuario'];
                        echo "<tr onclick='cliquei($id)'>";
                        echo "<td>" . $usuario['codigo_usuario']    . "</td>";
                        echo "<td>" . $usuario['nome_empresa']    . "</td>";
                        echo "<td>" . $usuario['nome_usuario']      . "</td>";
                        $data = $usuario['cadastro_usuario'];
                        $data = date('d/m/Y  H:i:s', strtotime($data));
                        echo "<td>" . $data  . "</td>";

                        if ($usuario['perm_usuario'] == 1) {
                            $perm = "Usuario";
                        }
                        if ($usuario['perm_usuario'] == 2) {
                            $perm = "Tecnico";
                        }
                        if ($usuario['perm_usuario'] == 3) {
                            $perm = "Adminsitrador";
                        }

                        echo "<td>" . $perm      . "</td>";
                        echo "<td>" . $usuario['login_usuario']     . "</td>";
                        echo "<td>" . $usuario['status_usuario']    . "</td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo 'ERROR: ' . $e->getMessage();
                }
                ?>
            </tbody>
        </table>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    language: {
                        lengthMenu: 'Mostre _MENU_ Usuarios por Pagina',
                        zeroRecords: 'Nada Encontrado',
                        info: 'Mostrando pagina _PAGE_ de _PAGES_',
                        infoEmpty: 'Nada Cadastrado',
                        infoFiltered: '(Filtrado de _MAX_ total gravações)',
                        search: 'Pesquisar:',
                    },
                });
            });

            function cliquei(valor) {
                $("#txtCodigo").val(valor);
                $('#myModal').modal('show');
                pesquisa();

            }

            function carregar() {
                setTimeout(() => {
                    location.reload()
                }, 200);
            }
        </script>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-10">
                            <h3>Tela de Gerenciamento de Usuarios</h3>
                        </div>

                        <div class="col-sm-2 d-flex flex-row bd-highlight align-items-center">
                            <button type="button" class="btn-close bd-highlight" data-bs-dismiss="modal" onclick="carregar()"></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php include_once "usuarios/usuarios_cadastro.php" ?>
            </div>

        </div>
    </div>
</div>
<!-- fim modal -->