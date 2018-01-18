<?php

		echo "cadastrar";die;
require_once '../controller/UsuarioController.class.php';

$funcao = $_POST['acao'];

switch($funcao){
	case 'cadastrar':

		$usuario = new Usuario;
			echo "chegou";
		die;	
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
		return 1;
		break;
	case 'visualizar':
		echo "cadastrar";
		break;
}
?>