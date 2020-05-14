<?php
session_start();
require 'config.php';
require 'classes/usuarios.class.php';
require 'classes/album.class.php';
require 'classes/foto.class.php';


if (!empty($_SESSION['logado']) || isset($_SESSION['logado'])) {
	echo "<script>location.href='login/loginAlbuns.php';</script>";
}

if ((isset($_GET['galeria']) && !empty($_GET['galeria'])) && (isset($_GET['photo']) && !empty($_GET['photo']))) {
	$id = addslashes($_GET['galeria']);
	$idfoto = addslashes($_GET['photo']);
} else {
	echo "<script>location.href='index.php';</script>";
}



$usuario = new Usuario($pdo);
$album = new Album($pdo);
$foto = new Foto($pdo);

if ($album->getAlbum($id)) {
	
} else {
	echo "<script>location.href='index.php';</script>";
}
if ($foto->getFoto($idfoto)) {
	
} else {
	echo "<script>location.href='index.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title>Roger Maia Films & Photos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/estilo1.css" />
		<link rel="stylesheet" type="text/css" href="css/estilo2.css" />
		<link rel="stylesheet" type="text/css" href="boot/boot.min.css" />
		<script src="boot/jquery.min.js" type="text/javascript"></script>
		<script src="boot/popper.min.js" type="text/javascript"></script>
		<script src="boot/boot.min.js" type="text/javascript"></script>
		<style>

			@import url('https://fonts.googleapis.com/css?family=Montserrat');
			
		</style>
	</head>
<!--  -->
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">

					  <a class="navbar-brand" href="index.php">
					    <img src="img/logo4.png" width="40" height="40" alt="" >
					    <span class="logo1">Roger Maia </span><br/>
					    <span style="margin-left:23px;letter-spacing:3px;">Photos & Films</span>
					  </a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					  </button>

					  <div class="collapse navbar-collapse" id="navbarSupportedContent">
					    <ul class="navbar-nav mr-auto">
					      <li class="nav-item">
					        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
					      </li>
					      <li class="nav-item active">
					        <a class="nav-link" href="albuns.php">Portfólio</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="contato.php">Contato / Sobre</a>
					      </li>
					    </ul>

					    <form class="form-inline my-2 my-lg-0" target="_blank">
					      <a class="btn my-2 my-sm-0 face1" style="background-color:#3B5997;color:white;" href="#" target="_blank"><strong>Facebook</strong></a>
					      <a class="btn my-2 my-sm-0 insta1" style="background-color:#F16943;color:white;margin-left:10px;" href="#" target="_blank"><strong>Instagram</strong></a>
					    </form>

					  </div>
					</nav>
					
				</div>
			</div>

			<div style="padding-bottom:20px;border-bottom-style:solid;border-bottom-width:1px;border-bottom-color:#d4d5d6;background-color:#F8F9FA;"></div>
			<div style="padding-bottom:20px;background-color:#F8F9FA;"></div>
			<div class="fundo">
				
				<div class="row">
					
					<div class="col-lg-12">
						<?php if(!empty($foto->getNome())): ?>
						<h3 style="margin:20px;"><?php echo $foto->getNome(); ?></h3>
						<?php endif; ?>
						<a  class="btn btn-dark" style="color:#F7F4EA;margin:15px;" href="galeria.php?g=<?php echo $id; ?>">Voltar ao album</a>


						<div class="index1">
							<div class="view">
								<img src="login/uploads/fotos/<?php echo $foto->getImagem(); ?>"><br/><a style="text-decoration:none;letter-spacing:1px;display:block;margin-bottom:10px;text-align:center;" target="_blank" href="login/uploads/fotos/<?php echo $foto->getImagem(); ?>">Abrir foto em uma nova aba</a>
							</div>
						</div>							

					</div>
					
				</div>				
				
			</div>
			<div style="padding-bottom:20px;border-bottom-style:solid;border-bottom-width:1px;border-bottom-color:#d4d5d6;background-color:#F8F9FA;"></div>
			<div style="padding-bottom:20px;background-color:#F8F9FA;"></div>
			<div class="footer1">
				<div class="row">
					<div class="col-lg-5">
						<div class="footerL">
							<div>undefined</div>
							<div style="font-size:15px;">fashion photographer & filmmaker</div>
							<div style="font-size:15px;margin-top:7px;">2017</div>  
						</div>
					</div>
					<div class="col-lg-4">
						<div class="footerR">
							<div class="footerR2"><img src="img/mail.svg"> - undefined@gmail.com.br</div>
							<div class="footerR2"><img src="img/device-mobile.svg"> - 48 9 9999-9999</div>
							<div class="footerR2"><img src="img/comment.svg"> - 48 9999-9999</div>
							
							<div class="footerR2"><a href="contato.php">Ver mais</a></div>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="footerR3">
							<a href="#" target="_blank"><img src="img/face.png" width="40"></a><span> </span>
							<a href="#" target="_blank"><img src="img/insta.png" width="40"></a>
						</div>
					</div>
					<div class="col-lg-1"></div>
				</div>
			</div>
		</div>
	</body>
</html>

<!--

				

-->