<?php
    include 'conexao.php';

    session_start(); // iniciando uma sessão

    $Vemail = $_POST['txtemail'];
    $Vsenha = $_POST['txtsenha'];

    //echo $Vemail.'<br>';
    //echo $Vsenha.'<br>';

    $consulta = $cn->query("select cd_usuario, nm_usuario, ds_email, ds_senha, ds_status from tbl_usuario where ds_email = '$Vemail' and ds_senha = '$Vsenha'");

    if($consulta->rowCount() == 1){
        //echo 'Usuario ESTÁ cadastrado';
        $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);
        $_SESSION['ID'] = $exibeUsuario['cd_usuario'];
        header('location:index.php');
    }
    else{
        //echo 'Usuario NÃO cadastrado';
        header('location:erro.php');
    }
?>