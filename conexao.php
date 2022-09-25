<?php
    $servidor = "Localhost";
    $usuario = "Felipe";
    $senha = "kiraFE22022006";
    $banco = "db_LojaVirtual";

    $cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
?>