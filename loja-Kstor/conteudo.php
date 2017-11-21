<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
switch ($pagina){

case 'clientes';
//include "clientes.php";

// Mensagens de Erro
$msg[0] = "Conex�o com o banco falhou!";
$msg[1] = "N�o foi poss�vel selecionar o banco de dados!";

// Fazendo a conex�o com o servidor MySQL
$conexao = mysql_connect("localhost","root","") or die($msg[0]);
mysql_select_db("bd_keg",$conexao) or die($msg[1]);

// Colocando o In�cio da tabela
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
   <td><b>Nome</b></td>
   <td><b>CPF</b></td>
   <td><b>CNPJ</b></td>
   <td><b>RG</b></td>
   <td><b>Endere&ccedil;o</b></td>
   <td><b>Fone</b></td>
   <td><b>Celular</b></td>
   <td><b>Email</b></td>
</tr>
<?php

// Fazendo uma consulta SQL e retornando os resultados em uma tabela HTML
$query = "SELECT cpf, RG, nome, endereco, telefone1, telefone2, email, cnpj FROM Clientes order by nome";
$resultado = mysql_query($query,$conexao);
while ($linha = mysql_fetch_array($resultado)) {
   ?>
   <tr>
      <td><?php echo $linha['nome']; ?></td>
      <td><?php echo $linha['cpf']; ?></td>
      <td><?php echo $linha['cnpj']; ?></td>
      <td><?php echo $linha['RG']; ?></td>
      <td><?php echo $linha['endereco']; ?></td>
      <td><?php echo $linha['telefone1']; ?></td>
      <td><?php echo $linha['telefone2']; ?></td>
      <td><?php echo $linha['email']; ?></td>
   </tr>
   <?php
}
echo
"</table>
	</div>

</div>
</body>
</html>";

break;

case 'inserirClientes';
include "inserirCliente.php";
break;

case 'inserirFornecedores';
include "inserirFornecedor.php";
break;

case 'fornecedores';
include "fornecedores.php";
break;

case 'inserirMercadorias';
include "inserirMercadoria.php";
break;

case 'mercadorias';

// Mensagens de Erro
$msg[0] = "Conex�o com o banco falhou!";
$msg[1] = "N�o foi poss�vel selecionar o banco de dados!";

// Fazendo a conex�o com o servidor MySQL
$conexao = mysql_connect("localhost","root","") or die($msg[0]);
mysql_select_db("bd_keg",$conexao) or die($msg[1]);

// Colocando o In�cio da tabela
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
    <h2>K & G Informatica</h2>
    <hr />
    <p>

<table border="1"><tr>
   <td><b>ID</b></td>
   <td><b>Nome</b></td>
   <td><b>Quantidade</b></td>
</tr>
<?php

// Fazendo uma consulta SQL e retornando os resultados em uma tabela HTML
$query = "SELECT idEstoque, nome, quantidade FROM Estoque order by idEstoque";
$resultado = mysql_query($query,$conexao);
while ($linha = mysql_fetch_array($resultado)) {
   ?>
   <tr>
      <td><?php echo $linha['idEstoque']; ?></td>
      <td><?php echo $linha['nome']; ?></td>
      <td><?php echo $linha['quantidade']; ?></td>
   </tr>
   <?php
}
echo
"</table>

	</div>

</div>



</body>
</html>";
break;

case 'pedido';
include "pedido.php";
break;

case 'pedidoFase2';
include "pedidoFase2.php";
break;

case 'fornecedorMercadoria';
include "fornecedorMercadoria.php";
break;

case 'ver_pedidos';

// Mensagens de Erro
$msg[0] = "Conex�o com o banco falhou!";
$msg[1] = "N�o foi poss�vel selecionar o banco de dados!";

// Fazendo a conex�o com o servidor MySQL
$conexao = mysql_connect("localhost","root","") or die($msg[0]);
mysql_select_db("bd_keg",$conexao) or die($msg[1]);

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
    <h2>K & G Informatica</h2>
    <hr />
    <p>
<table border="1"><tr>
   <td><b>ID</b></td>
   <td><b>Cliente CPF</b></td>
   <td><b>ID - Servi&ccedil;os</b></td>
   <td><b>Pre&ccedil;o Total</b></td>
   <td><b>Equipamento</b></td>
   <td><b>Voltagem</b></td>
   <td><b>Descri&ccedil;ao</b></td>
   <td><b>Data Entrada</b></td>
   <td><b>Data Saida</b></td>
</tr>
<?php
$conexao = mysql_connect("localhost","root","");
mysql_select_db("lojakastor",$conexao);
$query = "SELECT idPedido, Clientes_CPF, Servicos_idServicos, precoTotal, equipamento, descricao, dataEntrada, dataSaida, voltagem FROM Pedido order by idPedido;";
$resultado = mysql_query($query,$conexao);

while ($linha = mysql_fetch_array($resultado)) {
   ?>
   <tr>
      <td><?php echo $linha['idPedido']; ?></td>
      <td><?php echo $linha['Clientes_CPF']; ?></td>
      <td><?php echo $linha['Servicos_idServicos']; ?></td>
      <td><?php echo $linha['precoTotal']; ?></td>
      <td><?php echo $linha['equipamento']; ?></td>
      <td><?php echo $linha['voltagem']; ?></td>
      <td><?php echo $linha['descricao']; ?></td>
      <td><?php echo $linha['dataEntrada']; ?></td>
      <td><?php echo $linha['dataSaida']; ?></td>
   </tr>
   <?php
}
echo
"</table>
	</div>

</div>



</body>
</html>";
break;

case 'ver_mercadorias_fornecedores';
include "ver_mercadorias_fornecedores.php";
break;

case 'ver_pedido_mercadorias';
include "ver_pedido_mercadorias.php";
break;

case 'inserirServicos';
include "inserirServico.php";
break;

case 'ver_servicos';
//include "ver_servicos.php";
// Mensagens de Erro
$msg[0] = "Conex�o com o banco falhou!";
$msg[1] = "N�o foi poss�vel selecionar o banco de dados!";

// Fazendo a conex�o com o servidor MySQL
$conexao = mysql_connect("localhost","root","") or die($msg[0]);
mysql_select_db("bd_keg",$conexao) or die($msg[1]);

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
    <h2>K & G Informatica</h2>
    <hr />
    <p>
<table border="1"><tr>
   <td><b>ID</b></td>
   <td><b>Descri&ccedil;&atilde;o</b></td>
   <td><b>Pre&ccedil;o</b></td>
</tr>
<?php
$conexao = mysql_connect("localhost","root","");
mysql_select_db("bd_keg",$conexao);
$query = "SELECT idServicos, descricao, preco FROM Servicos order by idServicos;";
$resultado = mysql_query($query,$conexao);

while ($linha = mysql_fetch_array($resultado)) {
   ?>
   <tr>
      <td><?php echo $linha['idServicos']; ?></td>
      <td><?php echo $linha['descricao']; ?></td>
      <td><?php echo $linha['preco']; ?></td>
   </tr>
   <?php
}
echo"
</table>
	</div>

</div>



</body>
</html>";

break;

default:
include ("home.php");
break;

}

?>

</body>
</html>
