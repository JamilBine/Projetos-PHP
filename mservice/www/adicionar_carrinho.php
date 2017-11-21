<?php 
$codigo_produto=$_GET["id"];
$ip = $_SERVER["REMOTE_ADDR"];
include("abrir_conexao.php");
$query = "INSERT INTO carrinho_compras (sessao_cliente, codigo_produto, quantidade) VALUES ('$ip', '$codigo_produto',1)";
mysql_query($query,$conecta);
$url="index.php?f=carrinho_compras.php";
Header("Location: $url");
?> 
