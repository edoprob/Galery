<?php
session_start();
require '../config.php';
require '../classes/usuarios.class.php';
require '../classes/album.class.php';
require '../classes/foto.class.php';


if (empty($_SESSION['logado']) || !isset($_SESSION['logado'])) {
	echo "<script>location.href='login.php';</script>";
}

if (isset($_GET['a']) && !empty($_GET['a'])) {
	$id = addslashes($_GET['a']);
} else {
	echo "<script>location.href='loginAlbuns.php';</script>";
}

$album = new Album($pdo);
if ($album->getAlbum($id)) {
	
} else {
	echo "<script>location.href='loginAlbuns.php';</script>";
}

$foto = new Foto($pdo);
$list = $foto->getList($id);

if (isset($_POST['comentariodata']) && !empty($_POST['comentariodata'])) {
	$comentario = $_POST['comentariodata'];
	$album->editarComentario($comentario, $id);	
	echo "<script>location.href='loginEditar.php?a=".$id."';</script>";
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
					<h2>Editar Comentario</h2>
					<a class="btn btn-default" href="loginEditar.php?a=<?php echo $id ?>">Voltar ao álbum</a><br/><br/><br/>
					<h5><?php echo $album->getNome(); ?></h5>
					<h5><?php echo date("d/m/Y", strtotime($album->getData())); ?></h5><br/><br/>
				</div>
				<div class="col-md-7">
					<img src="uploads/albuns-miniaturas/<?php echo $album->getCapa(); ?>">
				</div>
			</div><br/>
			<div class="row">
				<div class="col-md-12">
					<h5>Texto atual: </h5><?php echo $album->getComentario(); ?><br/><br/>
					<form method="POST">
						<textarea name="comentariodata" style="width:100%;min-height:200px;"></textarea><br/><br/>
						<input type="submit" value="Atualizar">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
