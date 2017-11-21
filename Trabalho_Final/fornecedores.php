<?php
// Mensagens de Erro
$msg[0] = "Conexão com o banco falhou!";
$msg[1] = "Não foi possível selecionar o banco de dados!";

// Fazendo a conexão com o servidor MySQL
$conexao = mysql_connect("localhost","root","") or die($msg[0]);
mysql_select_db("mydb",$conexao) or die($msg[1]);

// Colocando o Início da tabela
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include "css.php";
?>
<body>

<div id="geral_conteudo">
	
<?php include "menu.php";?>
    
    <div id="box_right">
    <h2>Trabalho Final - BD II</h2>
    <hr />
    <p>

<table border="1"><tr>
   <td><b>Registro</b></td>
   <td><b>Nome</b></td>
   <td><b>Endere&ccedil;o</b></td>
   <td><b>Telefone</b></td>
   <td><b>CNPJ</b></td>
   <td><b>Cidade</b></td>
   <td><b>Modo de Transporte</b></td>
   <td><b>Pa&iacute;s</b></td>
   <td><b>Moeda</b></td>
   <td><b>Tipo de Mercadoria</b></td>
</tr>
<?php

$query = "SELECT registro, nome, endereco, telefone, cnpj, cidade, modo_transporte, pais, moeda, tipo FROM Fornecedores order by registro";
$resultado = mysql_query($query,$conexao);
while ($linha = mysql_fetch_array($resultado)) {
   ?>
   <tr>
      <td><?php echo $linha['registro']; ?></td>
      <td><?php echo $linha['nome']; ?></td>
      <td><?php echo $linha['endereco']; ?></td>
      <td><?php echo $linha['telefone']; ?></td>
      <td><?php echo $linha['cnpj']; ?></td>
      <td><?php echo $linha['cidade']; ?></td>
      <td><?php echo $linha['modo_transporte']; ?></td>
      <td><?php echo $linha['pais']; ?></td>
      <td><?php echo $linha['moeda']; ?></td>
      <td><?php echo $linha['tipo']; ?></td>
   </tr>
   <?php
}
?>
</table>
	</div>

</div>



</body>
</html>