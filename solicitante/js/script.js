function carregarImg(imagem){
    var preview = document.getElementById("preImg");
    var file = document.getElementById("txtImagem").files[0];
    var txtBase64 = document.getElementById("txtBase64Code");

    var reader = new FileReader();

    reader.onloadend = function(){
        var caminho = reader.result;
        preview.src = caminho;
        txtBase64.value = caminho;
    }
    if(file)
    {
        reader.readAsDataURL(file);
    }
    else
    {
        preview.src = "";
    }
}

function active(element){
    $('#'+element).css("background","#DCDCDC")
}

$(document).ready(function () {
    $('#example').DataTable();
});

let trocaBarra = true

function barraNavega(){
    if (condition) {
        
    }

}