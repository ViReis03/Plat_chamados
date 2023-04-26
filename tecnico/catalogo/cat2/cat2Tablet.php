<div class="container text-center mt-3">
        <div class="row text-center mt-3">
            <div class="col-sm-12 d-flex justify-content-between">
                <h1 class="mb-4">SubCategorias</h1>
                <button type="button" class="btn btn-success d-flex flex-row-reverse" style="height: 40px;" data-bs-toggle="modal" data-bs-target="#myModal" onclick="$('#btoLimpar').click()">Gerenciador</button>
            </div>
        </div>
    </div>
<div class="container mt-3">
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
                    $data = $conn->query('select cat2.codigo_cat2, cat1.nome_cat1, cat2.nome_cat2, cat2.obs_cat2, cat2.status_cat2 from cat2 inner join cat1 ON cat2.codigo_cat1 = cat1.codigo_cat1');

                    foreach ($data as $cat2) {
                        $id = $cat2['codigo_cat2'];
                        echo "<tr onclick='cliquei($id)'>";
                        echo "<td>" . $cat2['codigo_cat2']    . "</td>";
                        echo "<td>" . $cat2['nome_cat2']      . "</td>";
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
    <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-between">
                            <h3>Tela de Gerenciamento de Subcategorias</h3>
                            <button type="button" class="btn-close bd-highlight" data-bs-dismiss="modal" onclick="carregar()"></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php include_once "catalogo/cat2/cat2Tablet_cadastro.php" ?>
            </div>

        </div>
    </div>
</div>
<!-- fim modal -->