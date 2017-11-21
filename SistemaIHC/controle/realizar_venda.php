<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.php');
}

$logado = $_SESSION['login'];

function converter_data($strData) {
	if ( preg_match("#/#",$strData) == 1 ) {
		$strDataFinal = "'";
		$strDataFinal .= implode('-', array_reverse(explode('/',$strData)));
		$strDataFinal .= "'";
	}
	return $strDataFinal;
}

if (getenv("REQUEST_METHOD") == "POST") {
	if(isset($_POST['acao'])){
		$nome_produto = $_POST['nome_produto'];
		$cpf = $_POST['cpf'];
		$quantidade = $_POST['quantidade'];
		$preco = $_POST['preco'];
		$data_entrega = converter_data($_POST['data_entrega']);
		$data_compra = converter_data($_POST['data_compra']);
	
		if($cpf and $quantidade and $preco and $nome_produto){
			$conexao = mysql_connect("localhost","root","");
			mysql_select_db("trabalhoihc",$conexao);
			$query = "INSERT INTO compra(Cliente_cpf, total, dataEntrega, dataCompra, quantidadeProduto, totalProduto, nome_produto) 
					  VALUES('$cpf','$preco', $data_entrega, $data_compra, '$quantidade', '$preco', '$nome_produto')";
			if(mysql_query($query,$conexao)){
				echo '<script type="text/javascript">
					alert("Venda realizada com sucesso!");
					window.location.replace("../controle/realizar_venda.php");</script>';
				$sql="UPDATE produto SET quantidade = quantidade - '$quantidade' WHERE nome = '$nome_produto'"; 
				mysql_query($sql,$conexao);
			} else{
				echo '<script type="text/javascript">
					alert("Erro! Preencha corretamente todos os campos, verifique se o CPF do cliente está correto e cadastrado no sistema!");
					window.location.replace("../controle/realizar_venda.php");</script>';
			}
		}
	}else{
		//
	}
}	

?>
<html>
	<head>
		<title>Realizar Venda</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../estilo.css" rel="stylesheet" type="text/css" media="all"/>
		<script src="../scripts.js"></script>
		<script src="ajax.js" type="text/javascript"></script>
		<script type="text/javascript">
			function Formatadata(Campo, teclapres){
				var tecla = teclapres.keyCode;
				var vr = new String(Campo.value);
				vr = vr.replace("/", "");
				vr = vr.replace("/", "");
				vr = vr.replace("/", "");
				tam = vr.length + 1;
				if (tecla != 8 && tecla != 8){
					if (tam > 0 && tam < 2)
						Campo.value = vr.substr(0, 2) ;
					if (tam > 2 && tam < 4)
						Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2);
					if (tam > 4 && tam < 7)
						Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 7);
				}
			}

			/*function envio(){
				if (form1.cpf.value == "" || form1.quantidade.value == "" || form1.data_entrega.value == "" || form1.preco.value == "" || form1.data_compra.value == ""){
					alert("Preencha corretamente todos os campos!");
				} else{
					alert("Venda realizada com sucesso!");
				}
			}*/
		</script>
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
				<td valign="top" width="25%" bgcolor="#FFFFFF">
					<?php include "menu_lateral.php"; ?>
				</td>
				<td valign="top" width="400px" bgcolor="#FFFFFF">
					<h1>Dados da Venda</h2>
					<hr />
					<form name="form1" method="post" action="">
						<table>
							CPF do Cliente(*):<input type="text" size="15" name="cpf" maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
							Nome Produto(*):<input type="text" size="15" name="nome_produto" maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
							Quantidade(*):<input type="text" size="15" name="quantidade" maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
							Pre&ccedil;o(*):<input type="text" size="15" name="preco" maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
							Data da Compra:(*)<input type="date" onkeyup="Formatadata(this,event)" size="15" maxLength="10" name="data_compra" maxlength="45" style="margin-left:25px; width: 150px;">
							<!--&nbsp;<font color="red"><b>(Formato: ano-m&ecirc;s-dia, exemplo: 2014-10-10)</b></font>--><br><br>
							Data da Entrega:(*)<input type="date" onkeyup="Formatadata(this,event)" size="15" maxLength="10" name="data_entrega" maxlength="45" style="margin-left:25px; width: 150px;">
							<!--&nbsp;<font color="red"><b>(Formato: ano-m&ecirc;s-dia, exemplo: 2014-10-10)</b></font>--><br><br>
							<font color="red">Campos com (*) s&atilde;o obrigat&oacute;rios.</font><br><br>
							<input type="submit" onClick="envio()" name="acao" id="acao" value="Enviar">
						</table>
					</form>
					<hr>
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