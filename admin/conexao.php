<?php
$host = "localhost";
$dbn = "n7_sunit";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:dbname=$dbn;host=$host", $user, $pass );
    $conn-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $conn-> exec("set names utf8");

}
catch(PDOException $e)
{
    echo $e-> getMessage();
}

?>