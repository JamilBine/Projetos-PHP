<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:../sistema.php');
}

$logado = $_SESSION['login'];

if (getenv("REQUEST_METHOD") == "POST") {
   $idFornecedor = $_GET['id'];
   $nome = $_POST['nome'];
   $endereco = $_POST['endereco'];
   $telefone = $_POST['telefone'];
   $email = $_POST['email'];
   $tipoProdutos = $_POST['tipoProdutos'];
   $empresaRepresentante = $_POST['empresaRepresentante'];

   if ($nome and $endereco and $telefone and $email and $empresaRepresentante) {
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("trabalhoihc",$conexao);
      $query = "UPDATE cliente SET  nome = '$nome', endereco = '$endereco', email = '$email', telefone = '$telefone', tipoProdutos = '$tipoProdutos', empresaRepresentante = '$empresaRepresentante' where  idFornecedor = '$idFornecedor'";
      mysql_query($query,$conexao);
      echo "<script>
				alert('Fornecedor alterado com sucesso!');
				window.location.href='../visualizar/fornecedores.php';
			</script>";
	  //header("Location: ../visualizar/produtos.php");
   } else {
      echo "<script>alert('Preencha todos os campos corretamente!')</script>";
   }
}

?>
<html>
<head>
<title>Alterar Fornecedor</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../estilo.css" rel="stylesheet" type="text/css" media="all"/>
<!--<script>
function envio(){
if (form1.nome.value == "" || form1.cpf.value == "" || form1.endereco.value == "" || form1.email.value == "" || form1.telefone.value == ""){
alert("Preencha corretamente todos os campos!");
} else{
	alert("Cliente alterado com sucesso!");
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
		<h1>Dados do fornecedor</h1>
		<hr />
		<?php
			$idFornecedor = $_GET['id'];
			$conexao = mysql_connect("localhost","root","");
			mysql_select_db("trabalhoihc",$conexao);
			$query = "SELECT idFornecedor, nome, endereco, telefone, email, tipoProdutos, empresaRepresentante FROM fornecedor WHERE idFornecedor = '$idFornecedor' order by idFornecedor;";
			$resultado = mysql_query($query,$conexao);
			while ($linha = mysql_fetch_array($resultado)){
		?>
		<form name="form1" method="post" action="">
			Nome(*):<input type="text" size="15" name="nome" value=<?php echo $linha['nome']; ?> maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
			Endere&ccedil;o(*):<input type="text" size="15" name="endereco" value="<?php echo $linha['endereco']; ?>" maxlength="95" style="margin-left:25px; width: 150px;"><br><br>
			Email(*):<input type="text" size="15" name="email" value=<?php echo $linha['email']; ?> maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
			Telefone(*):<input type="text" size="15" name="telefone" value=<?php echo $linha['telefone']; ?> maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
			Tipo de Produtos:(*):<input type="text" size="15" name="tipoProdutos" value=<?php echo $linha['tipoProdutos']; ?> maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
			Empresa Representante(*):<input type="text" size="15" name="empresaRepresentante" value=<?php echo $linha['empresaRepresentante']; ?> maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
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