<div class="row bg-dark" id="desktopTopbar">

  <div class="col-sm-2">
    <div class="d-flex justify-content-center mt-1 mb-1 p-0 "><img src="img/logo-white.png" alt="" width="110px"></div>

  </div>

  <div class="col-sm-10 d-flex flex-row-reverse bd-highlight">
    <nav class="navbar">
      <div class="bd-highlight dropdownLocal bg-white">


        <button onclick="myFunction()" class="dropbtn bg-dark">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
            <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
            <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />

          </svg>
        </button>

        <div id="myDropdown" class="dropdownLocal-content">

        </div>
      </div>
      <span class="count" id="count"></span>
    </nav>
  </div>

</div>

<script>
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  function abrirNotification(id) {
    window.location.assign('?pag=ticket_aberto&idTicket=' + id)
  }

  var notAction = "menus/navCrud.php";

  function deleteNotify(value) {

    $.ajax({
      url: notAction,
      type: 'POST',
      data: {
        type: 'delete',
        deletar: value
      },
      success: carregarNotify
    });
  }

  function carregarNotify() {

    $.ajax({
      url: notAction,
      type: 'POST',
      data: {
        type: 'carregar',
        usuario: idUsuarioSessao
      },
      success: notSucesso
    });
  }

  function notSucesso(result) {
    $("#myDropdown").html(result);
    $("#count").html($('#contador').val());
  };

  $(document).ready(function() {
    carregarNotify();
  });
</script>