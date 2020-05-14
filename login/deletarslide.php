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
$usuario = new Usuario($pdo);
$foto = new Foto($pdo);

if ($foto->getSlide($id)) {
	
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
		<div class="container" id="login3">
			<div class="row">
				<div class="col-md-5">
					<h2>Deletar foto</h2>
					<h6>Anteção: foto será deletada depois da confirmação da sua senha</h6>
					<a class="btn btn-default" href="loginAlbuns.php">Voltar ao início</a><br/><br/>
					
					<br/><br/>
					<form method="POST">
						<span>Senha para confirmação</span><br/>
						<input type="password" name="senha"><br/><br/>
						<input type="submit" value="DELETAR"><br/>
<?php
if (isset($_POST['senha']) && !empty($_POST['senha'])) {
	$senha = $_POST['senha'];
	if ($usuario->verificarSenha($senha)) {
		$foto->deletarSlide($id);
		unlink("uploads/slide-oficial/".$foto->slideImagem());
		echo "<script>location.href='loginEditar.php';</script>";
	}
}
?>
					</form>
				</div>
				<div class="col-md-7">
					<img src="uploads/slide-oficial/<?php echo $foto->slideImagem(); ?>"><br/>
					<a href="uploads/slide-oficial/<?php echo $foto->slideImagem(); ?>" style="text-align:center;" target="_blank"> Ver foto no tamanho original</a>
				</div>
			</div><br/>
		</div>
	</body>
</html>
