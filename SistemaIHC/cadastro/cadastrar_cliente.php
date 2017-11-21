<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
}

$logado = $_SESSION['login'];

if (getenv("REQUEST_METHOD") == "POST") {
   $CPF = $_POST['CPF'];	 
   $nome = $_POST['nome'];
   $endereco = $_POST['endereco'];
   $telefone = $_POST['telefone'];
   $email = $_POST['email'];

	if ($CPF and $nome and $endereco and $telefone) {
		$conexao = mysql_connect("localhost","root","");
		mysql_select_db("trabalhoihc",$conexao);
		$query = "INSERT INTO cliente(cpf, nome, endereco, telefone, email) VALUES('$CPF', '$nome','$endereco', '$telefone', '$email')";
		if(mysql_query($query,$conexao)){
			echo '<script type="text/javascript">
			   alert("Cliente cadastrado com sucesso!");
			   window.location.replace("../visualizar/clientes.php");</script>';
		} else{
			echo '<script type="text/javascript">
			   alert("Erro! Preencha corretamente todos os campos ou verifique se o cliente já está cadastrado!");
			   window.location.replace("../visualizar/clientes.php");</script>';
		}
	} else {
      $err = "Preencha todos os campos!";
   }
}

?>
<html>
<head>
<title>Cadastrar Cliente</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../estilo.css" rel="stylesheet" type="text/css" media="all"/>
<!--<script>
function envio(){
if (form1.nome.value == "" || form1.CPF.value == "" || form1.endereco.value == "" || form1.email.value == "" || form1.telefone.value == ""){
alert("Preencha corretamente todos os campos!");
} else{
	alert("Cliente cadastrado com sucesso!");
}
}
</script>-->
</head>
<body>    
<table align=center width="100%" height="600" border="1">
  <tr>
	<td height="150" colspan="2" id="background" valign="bottom">
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
  <td valign="top" width="25%" bgcolor="#FFFFFF">
		<?php include "menu_lateral.php"; ?>
	</td>
    <td valign="top" width="400px" bgcolor="#FFFFFF">
		<h1>Dados do cliente</h2>
		<hr />
		<form name="form1" method="post" action="">
			Nome(*):<input type="text" size="15" name="nome" maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
			CPF(*):<input type="text" size="15" name="CPF" maxlength="45" style="margin-left:25px; width: 150px;"><a href="#" class="tooltip"><img width="15px" height="17px" src="../imagens/interrogacao.png"/><span>CPF sem virgulas ou pontos. Ex: 12345678911</span></a>
			<br><br>
			Endere&ccedil;o, n&uacute;mero(*):<input type="text" size="25" name="endereco" maxlength="65" style="margin-left:25px; width: 350px;"><br><br>
			E-mail(*):<input type="text" size="15" name="email" maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
			Telefone(*):<input type="text" size="15" name="telefone" maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
			<font color="red">Campos com (*) s&atilde;o obrigat&oacute;rios.</font><br><br>
			<input type="submit" onClick="envio()" value="Enviar">
			
		</form>
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