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
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="login2">
						<h2>Adicionar foto - <?php echo $album->getNome(); ?></h2><br/>
						<a class="btn btn-default" href="loginAlbuns.php">Voltar ao início</a><br/><br/><br/>

						<span>IMAGEM obrigatóriamente JPEG</span><br/><br/>
						
						<form method="POST" enctype="multipart/form-data" action="recebedorfoto.php?a=<?php echo $id ?>">
							Nome da foto [Opcional]<br/>
							<input type="text" name="nomedata" ><br/><br/>
							Imagem de capa (.jpg)<br/>
							<input type="file" style="width:100%;" name="arquivodata" accept="image/jpeg" required><br/><br/><br/>
							<input type="submit" value="Adicionar foto">

						</form>	
						<br/><br/><br/>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
