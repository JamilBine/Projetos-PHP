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
    <p>A rela&ccedil;&atilde;o entre os pedidos e as Mercadorias:
    <br>
    <br>

<table border="1"><tr>
   <td><b>Nota Fiscal</b></td>
   <td><b>Mercadorias C&oacute;digo</b></td>
   <td><b>Quantidade</b></td>
</tr>
<?php

$query = "SELECT Pedido_num_nota_fiscal, Mercadorias_codigo, quantidade FROM Pedido_has_Mercadorias order by Pedido_num_nota_fiscal";
$resultado = mysql_query($query,$conexao);
while ($linha = mysql_fetch_array($resultado)) {
   ?>
   <tr>
      <td><?php echo $linha['Pedido_num_nota_fiscal']; ?></td>
      <td><?php echo $linha['Mercadorias_codigo']; ?></td>
      <td><?php echo $linha['quantidade']; ?></td>
   </tr>
   <?php
}
?>
</table>
	</div>

</div>



</body>
</html>