<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:../sistema.php');
}

$logado = $_SESSION['login'];

if (getenv("REQUEST_METHOD") == "POST") {
   $cpf = $_POST['cpf'];	 
   $nome = $_POST['nome'];
   $endereco = $_POST['endereco'];
   $telefone = $_POST['telefone'];
   $email = $_POST['email'];

   if ($cpf and $nome and $endereco and $telefone) {
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("trabalhoihc",$conexao);
      $query = "UPDATE cliente SET  cpf= '$cpf', nome = '$nome', endereco = '$endereco', email = '$email' where  cpf = '$cpf'";
      mysql_query($query,$conexao);
	  echo "<script>
				alert('Cliente alterado com sucesso!');
				window.location.href='../visualizar/clientes.php';
			</script>";
   } else {
      echo "<script>alert('Preencha todos os campos corretamente!')</script>";
   }
}

?>
<html>
<head>
<title>Alterar Cliente</title>
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
		<h1>Dados do cliente</h1>
		<hr />
		<?php
			$cpf = $_GET['id'];
			$conexao = mysql_connect("localhost","root","");
			mysql_select_db("trabalhoihc",$conexao);
			$query = "SELECT cpf, nome, telefone, endereco, email FROM cliente where cpf = $cpf order by nome;";
			$resultado = mysql_query($query,$conexao);
			while ($linha = mysql_fetch_array($resultado)){
		?>
		<form name="form1" method="post" action="">
			Nome(*):<input type="text" size="15" name="nome" value=<?php echo $linha['nome']; ?> maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
			CPF:<input type="text" size="15" name="cpf" value=<?php echo $linha['cpf']; ?> maxlength="45"><a href="#" class="tooltip"><img width="15px" height="17px" src="../imagens/interrogacao.png"/><span>CPF sem virgulas ou pontos. Ex: 12345678911</span></a>
			<br><br>
			Endere&ccedil;o(*):<input type="text" size="15" name="endereco" value="<?php echo $linha['endereco']; ?>" maxlength="95" style="margin-left:25px; width: 150px;"><br><br>
			Email(*):<input type="text" size="15" name="email" value=<?php echo $linha['email']; ?> maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
			Telefone(*):<input type="text" size="15" name="telefone" value=<?php echo $linha['telefone']; ?> maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
			<font color="red">Campos com (*) s&atilde;o obrigat&oacute;rios.</font><br><br>
			<input type="submit" value="Editar">
		</form>
		<hr />
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