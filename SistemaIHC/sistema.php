<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	//header('location:index.php');
	echo '<script type="text/javascript">
		alert("Voce precisa estar logado para acessar essa area.");
		window.location.replace("index.php");</script>';
}

$logado = $_SESSION['login'];
?>

<title>Sistema de Estoque</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./estilo.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
<table align=center width="100%" height="600" border="1">
  <tr>
	<td height="150" colspan="2" id="background" valign="bottom">
	<div align=right>
		<strong>Ol&aacute;, <?php echo $logado; ?>!</strong><br>
		<input type="button" value="Sair" onclick="javascript: location.href='logout.php';" /><br><br>
    </div>
    <div id="menu">
		<li><input type="image" src="imagens/botao_inicio.png" onclick="javascript: location.href='index.php';" /></li>
		<li><input type="image" src="imagens/botao_empresa.png" onclick="javascript: location.href='empresa.php';" /></li>
		<li><input type="image" src="imagens/botao_sistema.png" onclick="javascript: location.href='sistema.php';" /></li>
		<li><input type="image" src="imagens/botao_contato.png" onclick="javascript: location.href='contato.php';" /></li>
    </div> 
    </td>
  </tr>
  <tr>
    <td valign="top" width="25%" bgcolor="#FFFFFF">
		<?php include"menu_lateral.php";?>
	</td>
    <td width="400px" bgcolor="#FFFFFF">
		<strong>Seja Bem Vindo ao Sistema de estoque.<br>
		Em menu de controle aparecem as op&ccedil;&otilde;es dispon&iacute;veis at&eacute; o momento.<br></strong>
		<hr>

	</td>
  </tr>
</table>
</body>
</html>