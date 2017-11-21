<?php

$conexao = mysql_connect("localhost","root","");
if (!$conexao)
{
die("Erro");
}

mysql_select_db("trabalhoihc",$conexao);

$cpf = $_GET['id'];
/*
mysql_query("DELETE FROM cliente WHERE cpf = '$cpf'"); 


if(mysql_affected_rows() > 0){
		echo "Registro deletado com sucesso<br />";
	}else{echo "Nada feito!<br />";}
	
	if(mysql_query("DELETE FROM cliente WHERE cpf = '$cpf'")) {
		if(mysql_affected_rows() == 1){
			echo "Registro deletado com sucesso<br />";
		}	
	} else{
		//header( "refresh:5;url=../visualizar/clientes.php" );
		echo '<script type="text/javascript">
			   alert("Este usuário possui registro de venda, não pode ser excluido!");
			   window.location.replace("../visualizar/clientes.php");</script>';
	}

	
	mysql_close($conexao); */
	
	if(mysql_query("DELETE FROM cliente WHERE cpf = '$cpf'")) {
		if(mysql_affected_rows() == 1){
			echo '<script type="text/javascript">
			   alert("Cliente removido com sucesso!");
			   window.location.replace("../visualizar/clientes.php");</script>';
		}	
	} else{
		//header( "refresh:5;url=../visualizar/clientes.php" );
		echo '<script type="text/javascript">
			   alert("Este usuário possui registro de venda e não pode ser excluido!");
			   window.location.replace("../visualizar/clientes.php");</script>';
	}

	
	mysql_close($conexao); 
	
	//header("Location:../visualizar/clientes.php");
?>