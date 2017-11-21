<?php 
$ip = $_SERVER["REMOTE_ADDR"];
include("abrir_conexao.php");
$query = "delete from carrinho_compras where sessao_cliente='$ip'";
mysql_query($query,$conecta);
$url="index.php?f=concluido.php";
Header("Location: $url");
?> 
