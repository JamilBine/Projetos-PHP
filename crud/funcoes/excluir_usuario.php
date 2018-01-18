<?php

$conexao = mysql_connect("localhost","root","");
if (!$conexao)
{
die("Erro");
}

mysql_select_db("k13", $conexao);

$id = $_GET['id'];
$sql = mysql_query("DELETE FROM usuario WHERE id = '$id'");

$sql2 = mysql_query("DELETE FROM telefone WHERE id_usuario = '$id'");

if(($sql == 1) && ($sql2 == 1)){
	echo '<script type="text/javascript" charset="utf-8">';
	echo 'alert("Registro apagado!");';
	echo 'location.href="../?pagina=visualizar";';
	echo '</script>';
} else{
	echo '<script language="javascript">';
	echo 'alert("Sem sucesso!");';
	echo 'location.href="../?pagina=visualizar";';
	echo '</script>';
}

mysql_close($conexao); 

//header("Location:../?pagina=visualizar");
?>