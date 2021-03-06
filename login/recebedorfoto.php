<?php
session_start();
require '../config.php';
require '../classes/foto.class.php';

if (empty($_SESSION['logado']) || !isset($_SESSION['logado'])) {
	echo "<script>location.href='login.php';</script>";
	exit;
}

if (isset($_GET['a']) && !empty($_GET['a'])) {
	$id = addslashes($_GET['a']);
} else {
	echo "<script>location.href='loginAlbuns.php';</script>";
}

print_r($_SESSION);
$foto = new Foto($pdo);

if (isset($_FILES['arquivodata']) && !empty($_FILES['arquivodata'])) {
	$arquivo = $_FILES['arquivodata'];

	if (isset($arquivo['tmp_name']) && !empty($arquivo['tmp_name'])) {
		$nomedoarquivo = time().".png";
		$nome = $_POST['nomedata'];

		if ((isset($arquivo) && !empty($arquivo))) {
			//salvando imagem original
			move_uploaded_file($arquivo['tmp_name'], "uploads/fotos/".$nomedoarquivo);

			//salvando miniatura
			$foto->salvarMiniatura($nomedoarquivo);
			$foto->addFoto($id, $nome, $nomedoarquivo);
			echo "<script>location.href='loginEditar.php?a=".$id."';</script>";
			exit;
		}
	}
} else {
	echo "faltou imagem de capa";
}
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
		
		
	</head>
<!--  -->
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="login2">
						<h2>...</h2><br/>
						<a class="btn btn-default" href="loginAlbuns.php">Voltar ao início</a><br/><br/>
						
							
						<br/><br/><br/>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
