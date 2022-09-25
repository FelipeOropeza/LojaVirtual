<?php 

include 'conexao.php';

$nome = $_POST['txtnome'];
$sobnomo = $_POST['txtsobrenome'];
$email = $_POST['txtemail'];
$senha = $_POST['txtsenha'];
$end = $_POST['txtendereco'];
$cidade = $_POST['txtcidade'];
$cep = $_POST['txtcep'];

/* Testando variaveis
echo $nome.'<br>';
echo $sobnomo.'<br>';
echo $email.'<br>';
echo $senha.'<br>';
echo $end.'<br>';
echo $cidade.'<br>';
echo $cep.'<br>'; */

$consulta = $cn->query("select ds_email from tbl_usuario where ds_email = '$email'");
$exibe = $consulta ->fetch(PDO::FETCH_ASSOC);

if($consulta->rowCount() == 1){
    header('location:erro1.php');
}
else{
    $incluir = $cn->query("
        insert into tbl_usuario(nm_usuario,ds_email,ds_senha,ds_status,ds_endereco,ds_cidade,no_cep)
                         values('$nome','$email','$senha','0','$end','$cidade','$cep')");
        header('location:ok.php');                 
}

?>