<div class="container text-center mt-3">
  <div class="row text-center mt-3">
    <div class="col-sm-12">
      <h1 class="mb-4">Dashboard</h1>
    </div>
  </div>
  <div class="row d-flex justify-content-center">

    <div class="col-lg-3">
      <div class="bg-light rounded m-3 p-1 dashBar">
        <div class="d-flex justify-content-between">
          <div>Aberto</div>
          <div class=" text-end w-25 bg-cinza px-1 rounded" id='dashCountAberto'></div>
        </div>

        <hr>

        <div id="abertoTicket"></div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="bg-light rounded m-3 p-1 dashBar">
        <div class="d-flex justify-content-between">
          <div>Em Atendimento</div>
          <div class="text-end w-25 bg-cinza px-1 rounded" id='dashCountAtendimento'></div>
        </div>

        <hr>
        <div id="atendimentoTicket"></div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="bg-light rounded m-3 p-1 dashBar">
        <div class="d-flex justify-content-between">
          <div>Aguardando</div>
          <div class="text-end w-25 bg-cinza px-1 rounded" id='dashCountAguardando'></div>
        </div>

        <hr>

        <div id="aguardandoTicket">
        </div>
      </div>
    </div>


    <div class="col-lg-3">
      <div class="bg-light rounded m-3 p-1 dashBar">
        <div class="d-flex justify-content-between">
          <div>Finalizado</div>
          <div class="text-end w-25 bg-cinza px-1 rounded" id='dashCountFinalizado'></div>
        </div>

        <hr>

        <div id="finalizadoTicket">
        </div>
      </div>
    </div>
  </div>
</div>

<div id="resposta" class="d-none"></div>

<script>
  function carregar() {
                setTimeout(() => {
                    location.reload()
                }, 200);
            }

  $(document).ready(function() {
    $.post("dashboard/dashboard_crud.php", {
      type: 'aberto'
    }, function(result) {
      $('#abertoTicket').html(result);
      $('#dashCountAberto').html($('#CountAberto').val());
    });

    $.post("dashboard/dashboard_crud.php", {
      type: 'atendimento'
    }, function(result) {
      $('#atendimentoTicket').html(result);
      $('#dashCountAtendimento').html($('#CountAtendimento').val());
    });

    $.post("dashboard/dashboard_crud.php", {
      type: 'aguardando'
    }, function(result) {
      $('#aguardandoTicket').html(result);
      $('#dashCountAguardando').html($('#CountAguardando').val());
    });

    $.post("dashboard/dashboard_crud.php", {
      type: 'finalizado'
    }, function(result) {
      alert
      $('#finalizadoTicket').html(result);
      $('#dashCountFinalizado').html($('#CountFinalizado').val());
    });
  })

  function cliquei(valor) {
    $("#modalTitle").html('Ticket ' + valor);
    $("#txtCodigo").val(valor);
    $('#myModal').modal('show');
    pesquisa();
  }
</script>

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