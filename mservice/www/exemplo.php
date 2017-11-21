<?php 
$conecta = mysql_connect("mysql01.mservice.com.br", "mservice", "esierdovski25") or print (mysql_error()); 
mysql_select_db("mservice", $conecta) or print(mysql_error()); 
print "Conexao e Seleçao OK!";
$sql = "SELECT codigo_produto, nome_produto FROM Produtos limit 100"; 
$result = mysql_query($sql, $conecta); 
 
/* Escreve resultados até que nao haja mais linhas na tabela */ 
 
while($consulta = mysql_fetch_array($result)) { 
   print "Coluna1: $consulta[codigo_produto] - Coluna2: $consulta[nome_produto]<br>"; 
} 
mysql_free_result($result); 
mysql_close($conecta); 
?>