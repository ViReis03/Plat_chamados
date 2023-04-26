    <div class="container text-center mt-3">
        <div class="row text-center mt-3">
            <div class="col-sm-12 d-flex justify-content-between">
                <h1 class="mb-4">Categorias</h1>
                <button type="button" class="btn btn-success d-flex flex-row-reverse" style="height: 40px;" data-bs-toggle="modal" data-bs-target="#myModal" onclick="$('#btoLimpar').click()">Gerenciador</button>
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
        <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-between">
                                <h3>Tela de Gerenciamento de Categorias</h3>
                                <button type="button" class="btn-close bd-highlight" data-bs-dismiss="modal" onclick="carregar()"></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <?php include_once "catalogo/cat1/cat1Tablet_cadastro.php" ?>
                </div>

            </div>
        </div>
    </div>
    <!-- fim modal -->