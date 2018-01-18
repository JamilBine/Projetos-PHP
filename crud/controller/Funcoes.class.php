<?php
echo "AQUI!!!!";
die();
require_once("../controller/UsuarioController.class.php");

$funcao = $_GET['acao'];

switch($funcao){
	case 'cadastrar':
		echo '<pre>';
		print_r($_POST);
		die();
		$usuario = new Usuario();

		$usuario->setNome($_POST['nome']);
		$usuario->setCep($_POST['cep']);
		$usuario->setRua($_POST['rua']);
		$usuario->setNumero($_POST['numero']);
		$usuario->setBairro($_POST['bairro']);
		$usuario->setCidade($_POST['cidade']);
		$usuario->setEstado($_POST['estado']);
		if(($_POST['complemento'] != null) || ($_POST['complemento'] != '')){
			$usuario->setComplemento($_POST['complemento']);
		}
		
		$usuario->insertUsuario();
	case 'visualizar':
	
		$usuario = new Usuario();
		
		$usuario->visualizarUsuarios();
		
		break;
	case 'excluir':
		try{
			$conn = new \PDO("mysql:host=localhost;dbname=k13","root","");
			$id = $_GET['id'];
			$sql = "delete from usuario where id = $id";
			$stmt = $this->db->prepare($sql);
        	//$stmt->bindValue(":id",$id);
        	$ret = $stmt->execute();
        	return $ret;
		}catch(\PDOException $e){
    		echo "Error! Message:".$e->getMessage()." Code:".$e->getCode();
		}
		
}

?>