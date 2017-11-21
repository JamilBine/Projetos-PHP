<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:index.php');
}

$logado = $_SESSION['login'];
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("trabalhoihc",$conexao);
      $query = "SELECT idFornecedor, nome, endereco, telefone, email, tipoProdutos, empresaRepresentante FROM fornecedor order by idFornecedor;";
      $resultado = mysql_query($query,$conexao);

?>
<html>
	<head>
		<title>Fornecedores</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../estilo.css" rel="stylesheet" type="text/css" media="all"/>
	</head>
	<body>    
		<table align=center width="100%" height="600" border="1">
			<tr>
				<td height="90" colspan="2" id="background" valign="bottom">
					<div align=right>
						<strong>Ol&aacute;, <?php echo $logado; ?>!</strong><br>
						<input type="button" value="Sair" onclick="javascript: location.href='../logout.php';" /><br><br>
					</div>
					<center><div id="menu">
						<?php include "top_menu.php"; ?>
					</div> </center>
				</td>
			</tr>
			<tr>
				<td valign="top" width="25%" bgcolor="#FFFFFF">
					<?php include "menu_lateral.php"; ?>
				</td>
				<td valign="top" width="400px" bgcolor="#FFFFFF">
					<center><table border="1">
						<?php if(mysql_num_rows($resultado) > 0){?>
							<center><h1>Fornecedores</h1></center>
							<hr />
							<tr>
								<td><center><strong>&nbsp;ID&nbsp;</strong></center></td>
								<td><center><strong>&nbsp;Nome&nbsp;</strong></center></td>
								<td><center><strong>&nbsp;Endere&ccedil;o&nbsp;</strong></center></td>
								<td><center><strong>&nbsp;Telefone&nbsp;</strong></center></td>
								<td><center><strong>&nbsp;E-mail&nbsp;</strong></center></td>
								<td><center><strong>&nbsp;Tipo de Produtos&nbsp;</strong></center></td>
								<td><center><strong>&nbsp;Empresa Representante&nbsp;</strong></center></td>
								<td><center><strong>&nbsp;Editar&nbsp;</strong></center></td>
								<td><center><strong>&nbsp;Excluir&nbsp;</strong></center></td>
							</tr>
							<?php while ($linha = mysql_fetch_array($resultado)) {?>
							<tr>
							        <td><center><?php echo $linha['idFornecedor']; ?></center></td>
							        <td><?php echo $linha['nome']; ?></td>
								<td><?php echo $linha['endereco']; ?></td>
								<td><?php echo $linha['telefone']; ?></td>
								<td><?php echo $linha['email']; ?></td>
								<td><?php echo $linha['tipoProdutos']; ?></td>
								<td><?php echo $linha['empresaRepresentante']; ?></td>
								<td><center><a href=../controle/editar_fornecedor.php?id=<?php echo $linha['idFornecedor'] ?>><img src="../imagens/edit_mini.gif" /></center></a></td>
								<td><center><a href=../controle/deletar_fornecedor.php?id=<?php echo $linha['idFornecedor'] ?>><img src="../imagens/action_delete.gif" /></center></a></td>
							</tr>
							<?php }} else{ ?> 
							<br><center><h3>Nenhum fornecedor cadastrado ainda.<br><br>
							Cadastre o seu primeiro fornecedor <a href="../cadastro/cad_fornecedor.php">aqui</a>.</center>
			</h3>
			<?php }?>
				</table></center>
				<center>
					<div id="pesquisar">
						<h2>Pesquisar Fornecedor:</h2>
						<form action="fornecedores.php" method="post">
							Nome: <input type="text" name="nome_fornecedor" />
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
											<tr>
												<td><b><center>Nome</center></b></td>
												<td><b><center>Empresa Representante</center></b></td>
											</tr>
											<?php while ($linha=mysql_fetch_array($rs)) {?> 											
											<tr>
												<td><center><?php echo $linha['nome'];?></center></td>
												<td><center><?php echo $linha['empresaRepresentante'];?></center></td>
											</tr>
										</table>
									<?php } ?></table>
				<?php} else{?>
							<center><font color="red"><h3>Nenhum cliente encontrado.<br></h3></font></center>
				<?php }?>
				<?php } ?>
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