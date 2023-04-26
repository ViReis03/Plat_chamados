<div class="row bg-dark">

  <div class="col-sm-12 d-flex justify-content-between">
    <span class="mt-1 mb-1 p-0 "><img src="img/logo-white.png" alt="" width="110px"></span>

    <span class="navbar">
      <div class="bd-highlight dropdownLocal">

        <button class="dropbtn bg-dark" onclick="showNav()">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg>
        </button>

        <button onclick="myFunction()" class="dropbtn bg-dark">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
            <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z" />
            <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
          </svg>
        </button>

        <div id="myDropdown" class="dropdownLocal-content"> </div>
      </div>
      <span class="tabletcount" id="count"></span>
    </span>
  </div>

</div>

<div class="row position-fixed w-100 tabnav" id="navMobile">
  <a href="?pag=dashboard" style="text-decoration: none;">
    <div class="tabnavBtn m-1" id="btoDashboard">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
        <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
      </svg>

      Dashboard
    </div>
  </a>

  <a href="?pag=ticket" style="text-decoration: none;">
    <div class="tabnavBtn m-1" id="btoTicket">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-ticket" viewBox="0 0 16 16">
        <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z" />
      </svg>
      Ticket
    </div>
  </a>

  <a href="?pag=catalogo" style="text-decoration: none;">
    <div class="tabnavBtn m-1" id="btoCatalogo">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
      </svg>
      Catalogo
    </div>
  </a>

  <a href="?pag=configuracoes" style="text-decoration: none;">
    <div class="tabnavBtn m-1" id="btoConfiguracoes">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-robot" viewBox="0 0 16 16">
        <path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.58 26.58 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z" />
        <path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z" />
      </svg>
      Configurações
    </div>
  </a>

  <a href="?pag=sobre" style="text-decoration: none;">
    <div class="tabnavBtn m-1" id="btoSobre">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
        <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z" />
      </svg>
      Sobre
    </div>
  </a>
</div>

<script>
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  var verificar = true;
  $('#navMobile').hide()


  function showNav() {

    console.log(verificar)
    if (verificar) {
      $('#navMobile').slideDown()
      verificar = false;
    }else{
      $('#navMobile').fadeToggle()
      verificar = true;
    }
      
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