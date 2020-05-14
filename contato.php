<?php
session_start();
require 'config.php';
require 'classes/usuarios.class.php';

if (!empty($_SESSION['logado']) || isset($_SESSION['logado'])) {
	echo "<script>location.href='login/loginAlbuns.php';</script>";
}

$usuario = new Usuario($pdo);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<title>Roger Maia Films & Photos</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/estilo1.css" />
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
					      <li class="nav-item">
					        <a class="nav-link" href="albuns.php">Portfólio</a>
					      </li>
					      <li class="nav-item active">
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
					<div class="col-lg-12" id="contact">
						<br/><h2><span>contate</span></h2><br/>
						<p>Fotografia de Moda, vídeos profissionais e eventos empresariais.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-7">
						<div class="image">
							<img src="img/lens1.jpg" alt="map">
						</div>
					</div>
					
					<div class="col-lg-5" style="margin-top:35px;">
						<div class="contact">
							<h4>cidade</h4>
							<span style="letter-spacing:3px;">City, State</span><img src="img/location1.png" width="20" style="margin-top:-5px;margin-left:4px;">
						</div>
						<div class="contact" style="line-height:1.9em;">
							<h4>email & phone</h4>
							<span>undefined@gmail.com.br</span><br/>
							<span>(48) 9 9999-9999</span><br/>
							<span>(48) 9999-9999 - <span style="letter-spacing:2px;">Whatsapp</span></span><img src="img/comment.svg" width="18" style="margin-left:8px;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12" id="contact">
						<br/></br><h2><span>sobre</span></h2><br/>
						<p style="padding-right:15px;padding-left:15px;">Fotografia é uma arte onde eu expresso através das lentes da minha câmera a melhor imagem onde busco captar a alma do ser humano além das lentes, expressando o que de melhor existe dentro do ser para os olhos de cada alma existente...</p><br/>

						<span style="letter-spacing:2px;font-size:23px;">Áreas:</span><br/>
						<span>Vídeos para you tube<br/>
							Ensaios fotográficos de moda<br/>
							Festas de 15 anos<br/>
							Books, álbuns<br/>
							Fotos em estúdio<br/>
							Filmagens de festas<br/>
							Fotografia Newborn<br/>
							Vídeos empresariais<br/>
							Fotografia de Moda<br/><br/><br/>
						</span>	

						<p>- Cursado em tratamento de imagem pela escola Aurea Fotográfica<br/>
						- Experiência em ensaios fotográficos, books e fotos em estúdio</p>	
					</div>
				</div>
			</div>
			<div style="padding-bottom:20px;border-bottom-style:solid;border-bottom-width:1px;border-bottom-color:#d4d5d6;background-color:#F8F9FA;"></div>
			<div style="padding-bottom:20px;background-color:#F8F9FA;"></div>
			<div class="footer1" style="padding-bottom:0">
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
				<div class="row">
					<div class="col-lg-12">
						<br/><br/><span><a href="login/login.php" class="btn" style="display:block;text-align:center;width:100px;margin:auto;">AD</a></span>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<!--

				

-->