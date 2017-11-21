<?php 
$qtd=$_POST["quantidade"];
$id = $_POST["id"];
$produto = $_POST["produto"];

if (empty($qtd)){
	$qtd=1;
}
	
include("abrir_conexao.php");


if (!empty($id)){
	$sql="select disponivel_entrega, semestoque_consumidor from Produtos where codigo_produto='".$produto."'";
	$result = mysql_query($sql, $conecta); 
	$row = mysql_fetch_row($result);
	if (intval($row[0]) < intval($qtd) and $row[1]="Y") {
	  	echo "<script language='javascript'>alert('A quantidade desse produto nao pode ser superior a ".$row[0]."');</script>";
	}else{
		$query = "update carrinho_compras set quantidade=".$qtd." where codigo_carrinho=".$id;
		mysql_query($query,$conecta);
	}
}

//$url="index.php?f=carrinho_compras.php";
//Header("Location: $url");
?>
<script language="javascript">
	location.href = 'index.php?f=carrinho_compras.php';
</script>
