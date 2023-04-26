<div class="container text-center mt-3">
    <div class="row text-center mt-3">
        <div class="col-sm-3"></div>

        <div class="col-sm-6">
            <h1 class="mb-4">Tickets em Aberto</h1>
        </div>

        <div class="col-sm-3 d-flex flex-row-reverse bd-highlight h-25"></div>
    </div>
</div>

<div class="container">
    <div class="row">

        <table id="example" class="hover">
            <thead>
                <tr>
                    <th scope="col">Codigo Ticket</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Data Abertura</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include 'conexao.php';

                if (isset($_GET['idTicket'])) {
                ?>
                    <script>
                        valorTicket = <?php echo $_GET["idTicket"] ?>;
                    </script>
                <?php
                }

                try {
                    $data = $conn->query('
                                SELECT T.codigo_ticket, C1.nome_cat1, C2.nome_cat2, C3.nome_cat3, U.nome_usuario, T.datacadastro_ticket, T.codigo_usuario
                                from geralTicket as T 
                                inner join cat1 as C1 on (T.codigo_cat1 = C1.codigo_cat1) 
                                inner join cat2 as C2 on (T.codigo_cat2 = C2.codigo_cat2)
                                inner join cat3 as C3 on (T.codigo_cat3 = C3.codigo_cat3)
                                inner join usuario as U on (T.codigo_usuario = U.codigo_usuario)
                                where status_ticket != 4
                                ');

                    foreach ($data as $ticket) {
                        $id = $ticket['codigo_ticket'];
                        echo "<tr onclick='cliquei($id)'>";
                        echo "<td>" . $ticket['codigo_ticket']    . "</td>";
                        echo "<td>" . $ticket['nome_usuario']   . "</td>";
                        $data = $ticket['datacadastro_ticket'];
                        $data = date('d/m/Y  H:i:s', strtotime($data));
                        echo "<td>" . $data                       . "</td>";
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
                if (valorTicket) {
                    cliquei(valorTicket);
                }
            });

            function cliquei(valor) {
                $("#modalTitle").html('Ticket ' + valor);
                $("#txtCodigo").val(valor);
                $('#myModal').modal('show');
                pesquisa();
            }

            function carregar() {
                setTimeout(() => {
                    window.location.assign("tablet.php?pag=ticket_aberto");
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
                            <h3 id="modalTitle"> Ticket </h3>
                            <button type="button" class="btn-close bd-highlight" data-bs-dismiss="modal" onclick="carregar()"></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php include_once "Ticket/aberto/ticketTablet_detalhes.php" ?>
            </div>

        </div>
    </div>
</div>
<!-- fim modal -->