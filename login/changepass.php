<?php
session_start();
require '../config.php';
require '../classes/usuarios.class.php';

if (empty($_SESSION['logado']) || !isset($_SESSION['logado'])) {
	echo "<script>location.href='login.php';</script>";
}

$usuario = new Usuario($pdo);
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
						<h2>Mudar a senha</h2><br/>
						<a class="btn btn-default" href="loginAlbuns.php">Voltar ao início</a><br/><br/>
						<form method="POST">
							Nova senha<br/>
							<input type="password" name="senha1" required minlength="5" /><br/><br/>
							Confirmar nova senha<br/>
							<input type="password" name="senha2" required minlength="5" /><br/><br/>
							----------------------------<br/><br/>
							Senha atual<br/>
							<input type="password" name="senha3" required /><br/><br/>
							<input type="submit" value="Mudar.."><br/><br/>
						</form>
<?php
if ((isset($_POST['senha1']) && !empty($_POST['senha1'])) && (isset($_POST['senha2']) && !empty($_POST['senha2'])) && (isset($_POST['senha3']) && !empty($_POST['senha3']))) {
	$senha1 = addslashes($_POST['senha1']);
	$senha2 = $_POST['senha2'];
	$senha3 = $_POST['senha3'];
	if ($senha1 == $senha2) {
		if ($usuario->verificarSenha($senha3)) {
			$usuario->mudarSenha($senha1, $_SESSION['logado']);
		}
	} else {
		echo "Novas senhas não são iguais";
	}
}
?>
						<br/><br/><br/>
					</div>
					
				</div>
			</div>
		</div>
	</body>
</html>
