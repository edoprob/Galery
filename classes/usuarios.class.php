<?php

class Usuario {
	private $pdo;

	//contrutor para conectar ao banco
	public function __construct($pdo) {
		$this->pdo = $pdo;
	}
	// faz o login
	public function fazerLogin($login, $senha) {
		$sql = "SELECT * FROM userid WHERE userid = :userid AND passw = :passw";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":userid", addslashes($login));
		$sql->bindValue(":passw", md5(addslashes($senha)));
		$sql->execute();

		if ($sql->rowCount()==1) {
			$sql = $sql->fetch();

			$_SESSION['logado'] = $sql['id'];
			return true;
		} else {
			return false;
		}
	}
	public function verificarSenha($senha) {
		$sql = "SELECT * FROM userid WHERE passw = :passw";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":passw", md5(addslashes($senha)));
		$sql->execute();

		if ($sql->rowCount() == 1) {
			return true;
			
		} else {
			echo "Senha atual incorreta";
			return false;
		}
	}
	public function mudarSenha($novaSenha, $id) {
		$sql = "UPDATE userid SET passw = :passw WHERE id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":passw", md5(addslashes($novaSenha)));
		$sql->bindValue(":id", $id);
		$sql->execute();
		echo "<strong>Senha alterada com sucesso.</strong>";
	}
}

?>