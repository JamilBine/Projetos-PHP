<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:../sistema.php');
}

$logado = $_SESSION['login'];

if (getenv("REQUEST_METHOD") == "POST") {
   $idProduto = $_GET['id'];
   $nome = $_POST['nome'];
   $quantidade = $_POST['quantidade'];
   $precoUnitario = $_POST['precoUnitario'];
   $Fornecedor_idFornecedor = $_POST['Fornecedor_idFornecedor'];

   if ($nome and $quantidade and $precoUnitario and $Fornecedor_idFornecedor) {
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("trabalhoihc",$conexao);
      $query = "UPDATE produto SET  nome = '$nome', quantidade = '$quantidade', email = '$precoUnitario', Fornecedor_idFornecedor = '$Fornecedor_idFornecedor' where  idProduto = '$idProduto'";
      mysql_query($query,$conexao);
	  echo "<script>alert('Produto alterado com sucesso!')
				window.location.href='../visualizar/produtos.php';
			</script>";
	  //header("Location: ../visualizar/produtos.php");
   } else {
      echo "<script>alert('Preencha todos os campos corretamente!')</script>";
   }
}

?>
<html>
	<head>
		<title>Alterar Produto</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../estilo.css" rel="stylesheet" type="text/css" media="all"/>
		<!--<script>
		function envio(){
		if (form1.nome.value == "" || form1.quantidade.value == "" || form1.Fornecedor_idFornecedor.value == "" || form1.precoUnitario.value == ""){
		alert("Preencha corretamente todos os campos!");
		} else{
			alert("Produto alterado com sucesso!");
		}
		}
		</script>-->
	</head>
	<body>    

		<table align=center width="100%" height="600" border="1">
			<tr>
				<td height="90" colspan="2" id="background" valign="bottom">
					<div align=right>
						<strong>Ol&aacute;, <?php echo $logado; ?>!</strong><br>
						<input type="button" value="Sair" onclick="javascript: location.href='../logout.php';" /><br><br>
					</div>
					<div id="menu">
						<?php include "top_menu.php"; ?>
					</div> 
				</td>
			</tr>
			<tr>
				<td valign="top" width="150px" bgcolor="#FFFFFF">
					<?php include "menu_lateral.php"; ?>
				</td>
				<td valign="top" width="500px" bgcolor="#FFFFFF">
					<h1>Dados do Produto</h1>
					<hr />
					<?php
						$idProduto = $_GET['id'];
						$conexao = mysql_connect("localhost","root","");
						mysql_select_db("trabalhoihc",$conexao);
						$query = "SELECT idProduto, nome, quantidade, precoUnitario, Fornecedor_idFornecedor FROM produto WHERE idProduto = $idProduto;";
						$resultado = mysql_query($query,$conexao);
						while ($linha = mysql_fetch_array($resultado)){
					?>
					<form name="form1" method="post" action="">
						Nome(*):<input type="text" size="15" name="nome" value=<?php echo $linha['nome']; ?> maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
						Quantidade(*):<input type="text" size="15" name="quantidade" value="<?php echo $linha['quantidade']; ?>" maxlength="95" style="margin-left:25px; width: 150px;"><br><br>
						Pre&ccedil;o Unit&aacute;rio(*):<input type="text" size="15" name="precoUnitario" value=<?php echo $linha['precoUnitario']; ?> maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
						Fornecedor(*):<input type="text" size="15" name="Fornecedor_idFornecedor" value=<?php echo $linha['Fornecedor_idFornecedor']; ?> maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
						<font color="red">Campos com (*) s&atilde;o obrigat&oacute;rios.</font><br><br>
						<input type="submit" value="Editar">
					</form>
					<?php } ?>
				</td>
			</tr>
		</table>
		<footer>
			<center>
				<b>Sistema de Estoque v1.0</b><br>
				Desenvolvido por: Jamilson e Marlon<br>
				DECOMP - Unicentro
			</center>
		</footer>
	</body>
</html>