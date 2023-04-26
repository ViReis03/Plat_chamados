<div class="container mt-3">
    <div class="row text-center mt-3">

        <div class="col-sm-2 "></div>
        <div class="col-sm-5">
            <h1 class="mb-4">Categorias de terceiro nivel</h1>
        </div>

        <div class="col-sm-5 d-flex flex-row-reverse bd-highlight h-25">
            <button type="button" class="btn btn-success d-flex flex-row-reverse" data-bs-toggle="modal" data-bs-target="#myModal" onclick="$('#btoLimpar').click()"> Gerenciador de Empresas </button>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">

            <table id="example" class="hover">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">SubCategoria</th>
                        <th scope="col">Categoria de Terceiro nivel</th>
                        <th scope="col">Observação</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once 'conexao.php';

                    try {
                        $data = $conn->query(
                            'SELECT cat3.codigo_cat3, cat1.nome_cat1, cat2.nome_cat2, cat3.nome_cat3, cat3.obs_cat3, cat3.status_cat3
                            from cat3 
                            inner join cat2 
                            ON cat3.codigo_cat2 = cat2.codigo_cat2 
                            inner join cat1 
                            ON cat2.codigo_cat1 = cat1.codigo_cat1'
                        );

                        foreach ($data as $cat3) {
                            $id = $cat3['codigo_cat3'];
                            echo "<tr onclick='cliquei($id)'>";
                            echo "<td>" . $cat3['codigo_cat3']    . "</td>";
                            echo "<td>" . $cat3['nome_cat1']      . "</td>";
                            echo "<td>" . $cat3['nome_cat2']      . "</td>";
                            echo "<td>" . $cat3['nome_cat3']    . "</td>";
                            echo "<td>" . $cat3['obs_cat3']    . "</td>";
                            echo "<td>" . $cat3['status_cat3']    . "</td>";
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
                                <h3>Tela de Gerenciamento de Sub Categorias</h3>
                            </div>

                            <div class="col-sm-2 d-flex flex-row bd-highlight align-items-center">
                                <button type="button" class="btn-close bd-highlight" data-bs-dismiss="modal" onclick="carregar()"></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <?php include_once "catalogo/cat3/cat3_cadastro.php" ?>
                </div>

            </div>
        </div>
    </div>
    <!-- fim modal -->