<?php
session_start();
require '../config.php';
require '../classes/usuarios.class.php';


if (!empty($_SESSION['logado']) || isset($_SESSION['logado'])) {
	echo "<script>location.href='loginAlbuns.php';</script>";
}

$usuario = new Usuario($pdo);

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
					<div id="login">
						<h2>Login</h2><br/><br/>
						<form method="POST">
							Login<br/>
							<input type="text" name="login" /><br/><br/>
							Senha<br/>
							<input type="password" name="senha" /><br/><br/><br/>
							<input type="submit" value="Entrar.."><br/><br/>
						</form>
						<a href="../index.php">Voltar a página inicial</a><br/>

<?php
if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['senha']) && !empty($_POST['senha']))) {
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	if ($usuario->fazerLogin($login, $senha)) {
		echo "<script>location.href='loginAlbuns.php';</script>";
	} else {
		echo "<br/><br/>Usuario ou senha incorreta";
	}
}
?>
					</div>
					
				</div>
			</div>
		</div>
	</body>
</html>
