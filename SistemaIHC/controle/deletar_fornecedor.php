<?php

$conexao = mysql_connect("localhost","root","");
if (!$conexao)
{
die("Erro");
}

mysql_select_db("trabalhoihc",$conexao);

$idFornecedor = $_GET['id'];

//mysql_query("DELETE FROM fornecedor WHERE idFornecedor = '$idFornecedor'"); 

	if(mysql_query("DELETE FROM fornecedor WHERE idFornecedor = '$idFornecedor'")) {
		if(mysql_affected_rows() == 1){
			echo '<script type="text/javascript">
			   alert("Fornecedor removido com sucesso!");
			   window.location.replace("../visualizar/fornecedores.php");</script>';
		}	
	} else{
		//header( "refresh:5;url=../visualizar/clientes.php" );
		echo '<script type="text/javascript">
			   alert("Este usu�rio possui registro de venda, n�o pode ser excluido!");
			   window.location.replace("../visualizar/fornecedores.php");</script>';
	}

	
	mysql_close($conexao); 
	//header("Location:../visualizar/fornecedores.php");
?>