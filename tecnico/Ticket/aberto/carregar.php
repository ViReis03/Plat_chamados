<?php
$codigo = $_POST['id'];

$pasta = '../../../../Projeto/admin/Ticket/abrir/arquivo/backend/files/' . $codigo . '/';
//$arquivos = glob("$pasta{*.jpg,*.JPG,*.png,*.gif,*.bmp}", GLOB_BRACE);
$arquivos = glob("$pasta{*.*}", GLOB_BRACE);

// echo "<pre>"; print_r($arquivos);'</pre>';

foreach ($arquivos as $img) {
    //echo $img." - ";
    $atalho = strstr($img, $codigo . '/');
    echo '<div class="link-up container-fluid bg-light"><a href="' . $img . '" target="_blank">' . $atalho . '</a></div><br>';
}
