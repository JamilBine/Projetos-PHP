<?php

	$conexao = mysql_connect("localhost","root","");
	if (!$conexao){
		die("Erro");
	}

	mysql_select_db("trabalhoihc",$conexao);

	$idProduto = $_GET['id'];

	mysql_query("DELETE FROM produto WHERE idProduto = '$idProduto'"); 

	mysql_close($conexao); 
	if(mysql_affected_rows() == 1){
		echo "Registro deletado com sucesso<br />";
	}
	header("Location:../sistema.php");
?>