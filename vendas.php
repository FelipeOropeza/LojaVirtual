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
    <script src="script.js"></script>
	<style>
	.navbar{
		margin-bottom: 0;
	}
	</style>
</head>
<body>	
<?php
	session_start();
		if(empty($_SESSION['Status']) || $_SESSION['Status']!=1){
		header('location:index.php');
	};
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
?>
    <div class="row" style="margin-top: 15px;">	
		<h1 class="text-center">Vendas</h1>
	</div>
    <div class="container-fluid">
    <form class="navbar-form navbar-left" role="search" name="frmvenda" method="get" action="vendas.php">
        <div class="form-group">
          <input type="date" id="data" class="form-control" placeholder="Data" name="data" required>
        </div>
        <button type="submit" onclick="Valida()" class="btn btn-default">Buscar</button>
    </form>
    </div>
    <?php
        if(!isset($_GET["data"])){
        }
        else {
            $data = $_GET['data'];
            $consulta = $cn->query("select * from vm_Venda where dt_venda = '$data'");
    ?>
<div class="container-fluid">
    <div class="row" style="margin-top: 15px;">
		<div class="col-sm-1 col-sm-offset-1"><h4>Data</h4> </div>
		<div class="col-sm-2"><h4>Ticket </h4></div>
		<div class="col-sm-5"><h4>Produto</h4></div>
		<div class="col-sm-1"><h4>Quantidade</h4></div>
		<div class="col-sm-2"><h4>Preço</h4></div>			
	</div>
    <?php while($exibeVenda = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
	<div class="row" style="margin-top: 15px;">		
		<div class="col-sm-1 col-sm-offset-1"><?php echo date('d/m/Y',strtotime($exibeVenda['dt_venda']));?></div>
		<div class="col-sm-2"><?php echo $exibeVenda['no_Ticket'];?></div>
		<div class="col-sm-5"><?php echo $exibeVenda['nm_livro'];?></div>
		<div class="col-sm-1"><?php echo $exibeVenda['qt_livro'];?></div>
		<div class="col-sm-2"><?php echo number_format($exibeVenda['vl_total_item'],2,',','.');?></div>				
	</div>	
    <?php }} ?>
</div>
<?php
	include 'rodape.html';
?>
</body>
</html>