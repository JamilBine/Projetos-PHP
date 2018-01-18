<?php

include("../controller/UsuarioController.class.php");

class UsuarioModel{
	
	public function insertUsuario(){
			$conn = new \PDO("mysql:host=localhost;dbname=k13","root","");
			
			$sql = "insert into usuario (nome, cep, rua, bairro, cidade, estado ";
			
			if(!empty($_POST['numero'])){
				$numero = $_POST['numero'];
				$sql .= ", numero ";	
			}
			
			if(!empty($_POST['complemento'])){
				$sql.= ", complemento ";
			}
			
			$nome = $_POST['nome'];
			$cep = $_POST['cep'];
			$rua = $_POST['rua'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['estado'];
			//$telefones = json_decode($_POST['telefone']);
			
			$sql .= ") values ('$nome', '$cep', '$rua', '$bairro', '$cidade', '$estado' ";
			
			if($_POST['numero'] != ''){
				$numero = $_POST['numero'];
				$sql .= ", $numero ";	
			}
			
			if(!empty($_POST['complemento'])){
				$complemento = $_POST['complemento'];
				$sql.= ", '$complemento' ";
			}

			$sql .= ");";
			$ret = $conn->exec($sql);
			
			$sql2 = "INSERT INTO telefone(id_usuario, numero_telefone) VALUES (";		
		
			foreach($errorLog as $el){
				$sql2 .= "'$el', ";
			}
			$sql2 .= ");";
			$ret2 = $conn->exec($sql2);
	}
	
	public function visualizarUsuarios(){
		try{
			$conn = new \PDO("mysql:host=localhost;dbname=k13","root","");
			
			$sql = "select * from usuario";
			
			$stmt = $conn->query($sql);
			$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			//echo $list[0]->name;

			echo json_encode($vetor);
		}catch(\PDOException $e){
    		echo "Error! Message:".$e->getMessage()." Code:".$e->getCode();
		}

	}
	/*
	public function buscarUsuario($usuario){
		$sql = "select * from usuario where nome = $nome";
		
		$dados = {$nome => 'nome'
				, $cep => 'cep' 
				, $numero => 'numero' 
				, $bairro => 'bairro' 
				, $cidade => 'cidade' 
				, $estado => 'estado'};
				
		if($resultado = $statement->execute()){
			$sucesso = 1;
		} else {
			$sucesso = 0;
		}		
		
		return $dados;
	}*/
	
	public function excluirUsuario(int $id){
		$conn = new \PDO("mysql:host=localhost;dbname=k13","root","");
			
		$sql = "delete from usuario where id = $id";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":id",$id);
		$ret = $stmt->execute();
		return $ret;
	}
}
?>