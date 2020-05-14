<?php
class Foto {
	private $pdo;
	private $id;

	private $nome;
	private $imagem;

	private $imagemSlide;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	//Redimensionar imagem da FOTO para resolução quadradada e salvar no diretorio
	public function salvarMiniatura($nomedoarquivo) {

		$imgSrc = "uploads/fotos/".$nomedoarquivo;

		list($width, $height) = getimagesize($imgSrc);

		$myImage = imagecreatefromjpeg($imgSrc);

		if ($width > $height) {
		  $y = 0;
		  $x = ($width - $height) / 2;
		  $smallestSide = $height;
		} else {
		  $x = 0;
		  $y = ($height - $width) / 2;
		  $smallestSide = $width;
		}

		$thumbSize = 340;
		$thumb = imagecreatetruecolor($thumbSize, $thumbSize);
		imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, $thumbSize, $thumbSize, $smallestSide, $smallestSide);

		imagepng($thumb, "uploads/fotos-miniaturas/".$nomedoarquivo);
	}


	//Adicionar Album (nome, data, nome_do_arquivo.jpg, comentarios)
	public function addFoto($i, $n, $a) {
		$sql = "INSERT INTO fotoid SET id_album = :id_album, nome = :nome, foto = :foto";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id_album", addslashes($i));
		$sql->bindValue(":nome", addslashes($n));
		$sql->bindValue(":foto", $a);
		$sql->execute();
	}

	public function getList($id) {
		$list = array();
		$sql = "SELECT * FROM fotoid WHERE id_album = :id_album ORDER BY id DESC";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id_album", addslashes($id));
		$sql->execute();
		if ($sql->rowCount()>0) {
			$list = $sql->fetchAll();
			return $list;
		}
	}

	//Pegar o foto pelo ID
	public function getFoto($id) {
		$sql = "SELECT * FROM fotoid WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", addslashes($id));
		$sql->execute();
		if ($sql->rowCount() == 1) {
			$sql = $sql->fetch();

			$this->nome = $sql['nome'];
			$this->imagem = $sql['foto'];
			return true;
		} else {
			return false;
		}
	}

	//Pegar as informações individuais
	public function getNome() {
		return $this->nome;
	}
	public function getImagem() {
		return $this->imagem;
	}
	public function editarNome($n, $i) {
		$sql = "UPDATE fotoid SET nome = :nome WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":nome", addslashes($n));
		$sql->bindValue(":id", addslashes($i));
		$sql->execute();
	}
	public function deletarFoto($i) {
		$sql = "DELETE FROM fotoid WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", addslashes($i));
		$sql->execute();
	}

	//mexendo no slide
	
		

	public function slideOficial($nomedoarquivo) {
		
		$imgSrc = "uploads/slide/".$nomedoarquivo;
		list($width, $height) = getimagesize($imgSrc);
		$myImage = imagecreatefromjpeg($imgSrc);

		$y = ($height - 899)/2;
		$x = ($width - 1899)/2;
		
		$thumb = imagecreatetruecolor(1900, 900);
		imagecopyresampled($thumb, $myImage, 0, 0, $x, $y, 1900, 900, 1900, 900);

		imagepng($thumb, "uploads/slide-oficial/".$nomedoarquivo);
	}


	public function addSlide($i) {
		$sql = "INSERT INTO slideid SET imagem = :imagem";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":imagem", $i);
		$sql->execute();
	}
	public function deletarSlide($i) {
		$sql = "DELETE FROM slideid WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", addslashes($i));
		$sql->execute();
	}
	public function slideList() {
		$list = array();
		$sql = "SELECT * FROM slideid";
		$sql = $this->pdo->prepare($sql);
		$sql->execute();
		if ($sql->rowCount()>0) {
			$list = $sql->fetchAll();
			return $list;
		}
	}
	public function getSlide($i) {
		$sql = "SELECT * FROM slideid WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", addslashes($i));
		$sql->execute();
		if ($sql->rowCount() == 1) {
			$sql = $sql->fetch();

			$this->imagemSlide = $sql['imagem'];
			return true;
		} else {
			return false;
		}
	}
	public function slideImagem() {
		return $this->imagemSlide;
	}
	
}
?>