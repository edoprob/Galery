<?php
session_start();
require '../config.php';
require '../classes/usuarios.class.php';
require '../classes/foto.class.php';


if (empty($_SESSION['logado']) || !isset($_SESSION['logado'])) {
	echo "<script>location.href='login.php';</script>";
}

if (isset($_GET['a']) && !empty($_GET['a'])) {
	$id = addslashes($_GET['a']);
} else {
	echo "<script>location.href='loginAlbuns.php';</script>";
}


$foto = new Foto($pdo);
if ($foto->getFoto($id)) {
	
} else {
	echo "<script>location.href='loginAlbuns.php';</script>";
}

if (isset($_POST['nome'])) {
	$nome = addslashes($_POST['nome']);
	$foto->editarNome($nome, $id);
	echo "<script>location.href='editarfoto.php?a=".$id."';</script>";
}



print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title>PROJETO</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/estilo3.css" />
		<link rel="stylesheet" type="text/css" href="../boot/boot.min.css" />
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>		
		<style>

			@import url('https://fonts.googleapis.com/css?family=Montserrat');
			
		</style>
	</head>
<!--  -->
	<body>
		<div class="container" id="login2">
			<div class="row">
				<div class="col-md-5">
					<h2>Editar foto</h2>
					<a class="btn btn-default" href="loginAlbuns.php">Voltar ao início</a><br/><br/>
					<span>Nome da foto: </span><br/>
						<?php
						if (!empty($foto->getNome())) {
							echo $foto->getNome();
						} else {
							echo "[ <i> Não há nome.</i> ]";
						}

						?>
					<br/><br/>
					<form method="POST">
						<span>Alterar nome</span><br/>
						<input type="text" name="nome"><br/><br/>
						<input type="submit" value="Atualizar nome">
					</form>
				</div>
				<div class="col-md-7">
					<img src="uploads/fotos-miniaturas/<?php echo $foto->getImagem(); ?>"><br/>
					<a href="uploads/fotos/<?php echo $foto->getImagem(); ?>" style="text-align:center;" target="_blank"> Ver foto no tamanho original</a>
				</div>
			</div><br/>
			<div class="row">
				<div class="col-md-12">
					<a href="deletarfoto.php?a=<?php echo $id ;?>" class="btn btn-danger">Deletar foto</a><br/><br/>
				</div>
			</div>
		</div>
	</body>
</html>
