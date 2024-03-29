
<!doctype html>

<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Minha Loja</title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	.navbar{
		margin-bottom: 0;
	}	
	</style>			
</head>
<body>		
	<?php	
	session_start();
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';

    if(!empty($_GET['cd'])){

    $cd_livro = $_GET['cd'];

    $consulta = $cn->query("select * from vm_livro where cd_livro = '$cd_livro'");
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
    }
    else{
        header('location:index.php');
    }

	?>
<div class="container-fluid">
	<div class="row">	
		 <div class="col-sm-4 col-sm-offset-1">
			 <h1>Detalhes do Produto</h1>	 
			 <img src="imagens/<?php echo $exibe['ds_capa'];?>" class="img-responsive" style="width:100%;">
		</div>				
 		 <div class="col-sm-7"><h1><?php echo $exibe['nm_livro'];?></h1>	
		<p><?php echo $exibe['ds_resumo_obra'];?></p>		
		<p><b>Numero de páginas:</b> <?php echo $exibe['no_pag'];?></p>		
		<p><b>Preço:</b> R$ <?php echo number_format($exibe['vl_preco'],2, ',','.');?></p>
        <p><b>Nome do autor:</b> <?php echo $exibe['nm_autor'];?></p>
        <p><b>ISBN do livro:</b> <?php echo $exibe['no_isbn'];?></p>					 
		<button class="btn btn-lg btn-success">Comprar</button>			
		</div>		
</div>
<br>
	<?php
	include 'rodape.html';
	?>
</body>
</html>