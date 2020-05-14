<?php
class Album {
	private $pdo;
	private $id;

	private $nome;
	private $data;
	private $capa;
	private $comentario;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	//Redimensionar imagem do ALBUM para resolução quadradada e salvar no diretorio
	public function salvarMiniatura($nomedoarquivo) {

		$imgSrc = "uploads/albuns/".$nomedoarquivo;

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

		imagepng($thumb, "uploads/albuns-miniaturas/".$nomedoarquivo);
	}


	//Adicionar Album (nome, data, nome_do_arquivo.jpg, comentarios)
	public function addAlbum($n, $d, $a, $c = null) {
		$sql = "INSERT INTO albumid SET nome = :nome, data = :data, capa = :capa, comentario = :comentario";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":nome", addslashes($n));
		$sql->bindValue(":data", $d);
		$sql->bindValue(":capa", $a);
		$sql->bindValue(":comentario", addslashes($c));
		$sql->execute();
	}

	public function getList() {
		$list = array();
		$sql = "SELECT * FROM albumid ORDER BY data DESC";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount()>0) {
			$list = $sql->fetchAll();
			return $list;
		}
	}

	//Pegar o album pelo ID
	public function getAlbum($id) {
		$sql = "SELECT * FROM albumid WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", addslashes($id));
		$sql->execute();
		if ($sql->rowCount() == 1) {
			$sql = $sql->fetch();

			$this->nome = $sql['nome'];
			$this->data = $sql['data'];
			$this->capa = $sql['capa'];
			$this->comentario = $sql['comentario'];
			return true;
		} else {
			return false;
		}
	}

	//Pegar as informações individuais
	public function getNome() {
		return $this->nome;
	}
	public function getData() {
		return $this->data;
	}
	public function getCapa() {
		return $this->capa;
	}
	public function getComentario() {
		return $this->comentario;
	}
	//editar comentario do album
	public function editarComentario($c, $i) {
		$sql = "UPDATE albumid SET comentario = :comentario WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":comentario", addslashes($c));
		$sql->bindValue(":id", addslashes($i));
		$sql->execute();
	}
	//deletar album
	public function deletarAlbum($i) {
		$sql = "DELETE FROM albumid WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", addslashes($i));
		$sql->execute();

		$sql = "DELETE FROM fotoid WHERE id_album = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", addslashes($i));
		$sql->execute();
	}


	//pagination
	public function paginar($page) {
		$sql = "SELECT * FROM albumid ORDER BY data DESC LIMIT $page, 15";
		$sql = $this->pdo->query($sql);
		if ($sql->rowCount() > 0) {
			$pagin = $sql->fetchAll();
			return $pagin;
		}
	}
}
?>