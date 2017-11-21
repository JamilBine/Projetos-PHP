<?php 
$codigo_carrinho=$_GET["id"];
include("abrir_conexao.php");
$query = "delete from carrinho_compras where codigo_carrinho=$codigo_carrinho;";
mysql_query($query,$conecta);
$url="index.php?f=carrinho_compras.php";
Header("Location: $url");
?> 
