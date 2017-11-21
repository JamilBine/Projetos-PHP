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
include "clientes.php";
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
include "mercadorias.php";
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
include "ver_pedidos.php";
break;

case 'ver_mercadorias_fornecedores';
include "ver_mercadorias_fornecedores.php";
break;

case 'ver_pedido_mercadorias';
include "ver_pedido_mercadorias.php";
break;

default:
include ("home.php");
break;

}

?>

</body>
</html>
