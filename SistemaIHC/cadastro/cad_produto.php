<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.php');
}

$logado = $_SESSION['login'];

if (getenv("REQUEST_METHOD") == "POST") {
	if(isset($_POST['acao'])){

	$nome = $_POST['nome'];
	$quantidade = $_POST['quantidade'];
	$precoUnitario = $_POST['precoUnitario'];
	$fornecedor = $_POST['fornecedor'];
	if($nome and $quantidade and $precoUnitario and $fornecedor){
		$conexao = mysql_connect("localhost","root","");
		mysql_select_db("trabalhoihc",$conexao);
		$query = "INSERT INTO produto(nome, quantidade, precoUnitario, Fornecedor_idFornecedor) VALUES('$nome','$quantidade', '$precoUnitario', '$fornecedor')";
		if(mysql_query($query,$conexao)){
			echo '<script type="text/javascript">
			   alert("Produto cadastrado com sucesso!");
			   window.location.replace("../sistema.php");</script>';
	} else{
			echo '<script type="text/javascript">
			   alert("Erro! Preencha corretamente todos os campos ou verifique se o produto já está cadastrado!");
			   window.location.replace("../sistema.php");</script>';
		}
	}} else{
		//
	}

}	

?>
<html>
	<head>
		<title>Cadastrar Produto</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../estilo.css" rel="stylesheet" type="text/css" media="all"/>
		<script src="../scripts.js"></script>
		<!--<script>
			function envio(){
				if (form1.nome.value == "" || form1.quantidade.value == "" || form1.precoUnitario.value == "" || form1.fornecedor.value == ""){
					alert("Preencha corretamente todos os campos!");
				} else{
					alert("Produto cadastrado com sucesso!");
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
					<h1>Dados do produto</h2>
					<hr />
					<form name="form1" method="post" action="">
						Nome(*):<input type="text" size="15" name="nome" maxlength="45" style="margin-left:25px; width: 150px;"><br><br>
						Quantidade(*):<input type="text" size="15" name="quantidade" maxlength="7" style="margin-left:25px; width: 150px;"><br><br>
						Pre&ccedil;o Unit&aacute;rio(*):<input type="text" size="15" name="precoUnitario" maxlength="25" style="margin-left:25px; width: 150px;"><br><br>
						Fornecedor(*):<input type="text" size="3" name="fornecedor" maxlength="3" style="margin-left:25px; width: 150px;"> <b>Insira a ID do Fornecedor, procurar atrav&eacute;s da Busca abaixo.</b><br><br>
						<font color="red">Campos com (*) s&atilde;o obrigat&oacute;rios.</font><br><br>
						<input type="submit" onClick="envio()" name="acao" id="acao" value="Enviar">
					</form>
					<center>
						<div id="pesquisar">
							<h2>Pesquisar Fornecedor:</h2>
							<form action="cad_produto.php" method="post">
								Nome completo: <input type="text" name="nome_fornecedor" />
								<input type="submit" name="Buscar" value="Buscar" /><br />
								<?php
								$conexao = mysql_connect("localhost","root","");
								mysql_select_db("trabalhoihc",$conexao);

								$nome_fornecedor = isset($_POST['nome_fornecedor']) ? $_POST['nome_fornecedor'] : ""  ;
								
								if(isset($_POST['nome_fornecedor'])){
								$sql="SELECT * FROM fornecedor WHERE nome like '$nome_fornecedor'";
								$rs=mysql_query($sql) or die ('Erro na consulta da tabela CATEGORIA' .mysql_error());
								if(mysql_num_rows($rs) > 0){?>
								<h2>Resultados da pesquisa:</h2>
								<table class="tabela" cellpadding="2" cellspacing="0" >
									<?php while ($linha=mysql_fetch_array($rs)) {?> 
									<tr>
										<td><b><center>ID</center></b></td>
										<td><b><center>Nome</center></b></td>
										<td><b><center>Empresa Representante</center></b></td>
									</tr>
									<tr>
										<td><center><?php echo $linha['idFornecedor'];?></center></td>
										<td><center><?php echo $linha['nome'];?></center></td>
										<td><center><?php echo $linha['empresaRepresentante'];?></center></td>
									</tr>
								</table>
									<?php }} else{?> 
										<center><font color="red"><h3>Nenhum fornecedor encontrado.<br></h3></font></center>
									<?php }}?>
							</form>
						</div>
					</center>
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