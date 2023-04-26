<div class="container text-center mt-3">
    <div class="row text-center mt-3">
        <div class="col-sm-5"></div>

        <div class="col-sm-2">
            <h1 class="mb-4">Empresas</h1>
        </div>

        <div class="col-sm-5 d-flex flex-row-reverse bd-highlight h-25">

            <button type="button" class="btn btn-success d-flex flex-row-reverse" data-bs-toggle="modal" data-bs-target="#myModal" onclick="$('#btoLimpar').click()"> Gerenciador de Empresas </button>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <table id="example" class="hover">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Razão Social</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">IE</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'conexao.php';

                try {
                    $data = $conn->query('SELECT * FROM empresa');



                    foreach ($data as $empresa) {
                        $id = $empresa['codigo_empresa'];
                        echo "<tr onclick='cliquei($id)'>";
                        echo "<td>" . $empresa['codigo_empresa']    . "</td>";
                        echo "<td>" . $empresa['razao_empresa']    . "</td>";
                        echo "<td>" . $empresa['nome_empresa']      . "</td>";
                        echo "<td>" . $empresa['tipo_empresa']      . "</td>";
                        echo "<td>" . $empresa['cnpj_empresa']     . "</td>";
                        echo "<td>" . $empresa['ie_empresa']     . "</td>";
                        echo "<td>" . $empresa['status_empresa']    . "</td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo 'ERROR: ' . $e->getMessage();
                }
                ?>
            </tbody>
        </table>

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
                            <h3>Tela de Gerenciamento de Empresas</h3>
                        </div>

                        <div class="col-sm-2 d-flex flex-row bd-highlight align-items-center">
                            <button type="button" class="btn-close bd-highlight" data-bs-dismiss="modal" onclick="carregar()"></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php include_once "empresa/empresas_cadastro.php" ?>
            </div>

        </div>
    </div>
</div>
<!-- fim modal -->