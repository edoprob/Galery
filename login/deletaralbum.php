<?php
session_start();
require '../config.php';
require '../classes/usuarios.class.php';
require '../classes/album.class.php';


if (empty($_SESSION['logado']) || !isset($_SESSION['logado'])) {
	echo "<script>location.href='login.php';</script>";
}

if (isset($_GET['a']) && !empty($_GET['a'])) {
	$id = addslashes($_GET['a']);
} else {
	echo "<script>location.href='loginAlbuns.php';</script>";
}
$usuario = new Usuario($pdo);
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
		<div class="container" id="login2">
			<div class="row">
				<div class="col-md-5">
					<h2>Deletar álbum</h2>
					<h6>Anteção: ábum será deletada depois da confirmação da sua senha</h6>
					<a class="btn btn-default" href="loginAlbuns.php">Voltar ao início</a><br/><br/>
					<span>Nome da álbum: </span><br/>
						<?php
						if (!empty($album->getNome())) {
							echo $album->getNome();
						} else {
							echo "[ <i> Não há nome.</i> ]";
						}

						?>
					<br/><br/>
					<form method="POST">
						<span>Senha para confirmação</span><br/>
						<input type="password" name="senha"><br/><br/>
						<input type="submit" value="DELETAR"><br/>
<?php
if (isset($_POST['senha']) && !empty($_POST['senha'])) {
	$senha = $_POST['senha'];
	if ($usuario->verificarSenha($senha)) {
		$album->deletarAlbum($id);
		unlink("uploads/albuns-miniaturas/".$album->getCapa());
		echo "<script>location.href='loginEditar.php';</script>";
	}
}
?>
					</form>
				</div>
				<div class="col-md-7">
					<img src="uploads/albuns-miniaturas/<?php echo $album->getCapa(); ?>"><br/>
				</div>
			</div><br/>
		</div>
	</body>
</html>
