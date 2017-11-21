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
    $query = "SELECT idProduto, nome, quantidade, precoUnitario, Fornecedor_idFornecedor FROM produto";
			// order by idProduto INNER JOIN
			// fornecedor ON (Fornecedor_idFornecedor = idFornecedor);
			//SELECT empresaRepresentante FROM fornecedor WHERE Fornecedor_idFornecedor = '$idFornecedor';";
			//INNER JOIN categorias ON (produto.categoriaCode = categorias.categoriaCode)
		
      $resultado = mysql_query($query,$conexao);

?>
<html>
	<head>
		<title>Produtos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../estilo.css" rel="stylesheet" type="text/css" media="all"/>
	</head>
	<body>    
		<table align=center width="100%" height="600" border="1">
			<tr>
				<td height="150" colspan="2" id="background" valign="bottom">
					<div align=right>
						<strong>Ol&aacute;, <?php echo $logado; ?>!</strong><br>
						<input type="button" value="Sair" onclick="javascript: location.href='../logout.php';" /><br><br>
					</div>
					<div id="menu" align="center">
						<?php include "top_menu.php"; ?>
					</div> 
				</td>
			</tr>
			<tr>
				<td valign="top" width="25%" bgcolor="#FFFFFF">
					<?php include"menu_lateral.php"; ?>
				</td>
				<td valign="top" width="400px" bgcolor="#FFFFFF">
					<center><table border = "1" cellpadding="2">
					<?php if(mysql_num_rows($resultado) > 0){?>
						<center><h1>Produtos</h1></center>
						<hr />
						<tr>
							<td><center><strong>Nome</strong></center></td>
							<td><center><strong>Quantidade</strong></center></td>
							<td><center><strong>Pre&ccedil;o Unit&aacute;rio</strong></center></td>
							<td><center><strong>Fornecedor</strong></center></td>
							<td><center><strong>Editar</strong></center></td>
							<td><center><strong>Excluir</strong></center></td>
						</tr>
						<?php while ($linha = mysql_fetch_array($resultado)) {
						$preco = ' R$ ' . number_format($linha['precoUnitario'], 2, ',', '.');
						/*$idFornecedor = $linha['Fornecedor_idFornecedor'];
						$query = "SELECT empresaRepresentante FROM fornecedor WHERE idFornecedor = '$idFornecedor';";
						$empresa = mysql_query($query, $conexao);*/
						?>
			<tr>
				<td><?php echo $linha['nome']; ?></td>
							<td><?php echo $linha['quantidade']; ?></td>
							<td><?php echo $preco; ?></td>
							<td><?php echo $linha['Fornecedor_idFornecedor']; ?></td>
							<td><center><a href=../controle/editar_produto.php?id=<?php echo $linha['idProduto'] ?>><img src="../imagens/edit_mini.gif" /></center></a></td>
							<td><center><a href=../controle/deletar_produto.php?id=<?php echo $linha['idProduto'] ?>><img src="../imagens/action_delete.gif" /></center></a></td>
			</tr>
			<?php }} else{ ?> 
			<br><center><h3>Nenhum produto cadastrado ainda.<br><br>
			Cadastre o seu primeiro produto <a href="../cadastro/cad_produtos.php">aqui</a>.</center>
			</h3>
			<?php }?>
					</table></center>	 
		 <center>
        <div id="pesquisar">
            <h2>Pesquisar Produto:</h2>
				<form action="produtos.php" method="post">
					Nome: <input type="text" name="nome_produto" />
				<input type="submit" name="Buscar" value="Buscar" /><br />
				<?php
					$conexao = mysql_connect("localhost","root","");
									mysql_select_db("trabalhoihc",$conexao);
									$nome_produto = isset($_POST['nome_produto']) ? $_POST['nome_produto'] : ""  ;
									if(isset($_POST['nome_produto'])){
										$sql="SELECT * FROM produto WHERE nome like '$nome_produto'";
										$rs=mysql_query($sql) or die ('Erro na consulta da tabela CATEGORIA' .mysql_error());
										if(mysql_num_rows($rs) > 0){?>
						<h2>Resultados da pesquisa:</h2>
											<table class="tabela" cellpadding="2" cellspacing="0" >
												<tr>
													<td><b><center>Nome</center></b></td>
													<td><b><center>Quantidade</center></b></td>
												</tr>
												<?php while ($linha=mysql_fetch_array($rs)) {?> 
												<tr>
													<td><center><?php echo $linha['nome'];?></center></td>
													<td><center><?php echo $linha['quantidade'];?></center></td>
												</tr>							
							
				<?php } ?></table>
				<?php } else{?>
							<center><font color="red"><h3>Nenhum produto encontrado.<br></h3></font></center>
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