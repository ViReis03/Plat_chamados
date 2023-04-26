    <div class="container text-center mt-3">
        <div class="row text-center mt-3">

            <div class="col-sm-2 "></div>
            <div class="col-sm-5">
                <h1 class="mb-4">Categorias</h1>
            </div>

            <div class="col-sm-5 d-flex flex-row-reverse bd-highlight h-25">
                <button type="button" class="btn btn-success d-flex flex-row-reverse" data-bs-toggle="modal" data-bs-target="#myModal" onclick="$('#btoLimpar').click()"> Gerenciador de Categorias </button>
            </div>
        </div>
    </div>
    <div class="container mt-3" id="carregar">
        <div class="row">

            <table id="example" class="hover">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Observação</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once 'conexao.php';

                    try {
                        $data = $conn->query('SELECT * FROM cat1');

                        foreach ($data as $servicos) {
                            $id = $servicos['codigo_cat1'];
                            echo "<tr onclick='cliquei($id)'>";
                            echo "<td>" . $servicos['codigo_cat1']    . "</td>";
                            echo "<td>" . $servicos['nome_cat1']    . "</td>";
                            echo "<td>" . $servicos['desc_cat1']      . "</td>";
                            echo "<td>" . $servicos['obs_cat1']      . "</td>";
                            echo "<td>" . $servicos['status_cat1']    . "</td>";
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
                            lengthMenu: 'Mostre _MENU_ Categorias por Pagina',
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
                                <h3>Tela de Gerenciamento de Categorias</h3>
                            </div>

                            <div class="col-sm-2 d-flex flex-row bd-highlight align-items-center">
                                <button type="button" class="btn-close bd-highlight" data-bs-dismiss="modal" onclick="carregar()"></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <?php include_once "catalogo/cat1/cat1_cadastro.php" ?>
                </div>

            </div>
        </div>
    </div>
    <!-- fim modal -->