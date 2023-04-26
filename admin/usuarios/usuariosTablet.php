<div class="container text-center mt-3">
        <div class="row text-center mt-3">
            <div class="col-sm-12 d-flex justify-content-between">
                <h1 class="mb-4">Usuarios</h1>
                <button type="button" class="btn btn-success d-flex flex-row-reverse" style="height: 40px;" data-bs-toggle="modal" data-bs-target="#myModal" onclick="$('#btoLimpar').click()">Gerenciador</button>
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
                    <th scope="col">Login</th>
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
                        echo "<td>" . $usuario['login_usuario']     . "</td>";
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
        <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-between">
                                <h3>Tela de Gerenciamento de Usuarios</h3>
                                <button type="button" class="btn-close bd-highlight" data-bs-dismiss="modal" onclick="carregar()"></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <?php include_once "usuarios/usuariosTablet_cadastro.php" ?>
                </div>

            </div>
        </div>
    </div>

