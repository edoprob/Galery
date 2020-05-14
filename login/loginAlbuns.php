<?php
session_start();
require '../config.php';
require '../classes/usuarios.class.php';
require '../classes/album.class.php';
require '../classes/foto.class.php';


if (empty($_SESSION['logado']) || !isset($_SESSION['logado'])) {
	echo "<script>location.href='login.php';</script>";
}
$album = new Album($pdo);
$list = $album->getList();

$foto = new Foto($pdo);
$slideList = $foto->slideList();



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
			<div id="login2">
				<div class="row">
					<div class="col-md-4">
						<h2>Sistema</h2><br/>
						<a class="btn btn-default" href="changepass.php">Mudar senha </a> - - <a class="btn btn-default" href="sair.php"> Sair</a>
						<br/><br/><br/><br/><br/>
						<a class="btn btn-default" href="adicionaralbum.php">Adicionar álbum</a>
						<br/><br/>
					</div>
					<div class="col-md-6">
					<br/><br/>
						<h6> Slide principal - - Resolução adequada: <strong>maior que 1900x900</strong></h6>
						<a href="adicionarslide.php">Adicionar foto</a><br/><br/>
						<table border="1" width="100%" style="background:white;text-align:center;">
							<tr>
								<th width="30">#</th>
								<th>Visualizar</th>
								<th>Excluir</th>
							</tr>

							<?php if(!empty($slideList)): ?>
							<?php $q = 1; ?>
							<?php foreach($slideList as $item): ?>
							<tr>
								<td><?php echo ($q++); ?></td>
								<td><a href="uploads/slide-oficial/<?php echo $item['imagem']; ?>" target="_blank"><?php echo $item['imagem']; ?></a></td>
								<td><a href="deletarslide.php?a=<?php echo $item['id']; ?>">Excluir</a></td>
							</tr>
							<?php endforeach; ?>
							<?php endif; ?>

						</table><br/><br/>
					</div>
					<div class="col-md-2"></div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<table border="1" width="100%" style="background:white;">
							<tr style="text-align:center;">
								<th>Album</th>
								<th>Data</th>
								<th>Opções</th>
							</tr>

							<?php foreach($list as $item): ?>
							<?php $data = date("d/m/Y", strtotime($item['data'])); ?>
							<tr>
								<td><?php echo $item['nome']; ?></td>
								<td style="text-align:center;"><?php echo $data; ?></td>
								<td style="text-align:center;"><?php echo "<a href='loginEditar.php?a=".$item['id']."'>Editar</a>"; ?></td>
							</tr>
							<?php endforeach; ?>

						</table>
						

						<br/><br/><br/>						
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
