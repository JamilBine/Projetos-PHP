<?php
	// Iniciamos nossa sessão que vai indicar o usuário pela session_id
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
	}
	$logado = $_SESSION['login'];
    // Recuperamos os valores passados por parametros
    $acao = $_GET['acao'];
    $cod = $_GET['cod'];
     
     
    // Verificamos se a acao é igual a incluir
    if ($acao == "incluir"){	
		// Verificamos se cod do produto é diferente de vazio
		if ($cod != ''){
			// Se for diferente de vazio verificamos se é numérico
			if (is_numeric($cod)){	
				// Tratamos a variavel de caracteres indevidos
				$cod = addslashes(htmlentities($cod));
     
				// Verificamos se o produto referente ao $cod já está no carrinho para o session id correnpondente
					$query_rs_carrinho = "SELECT * FROM tbl_carrinho WHERE tbl_carrinho.cod = '".$cod."' AND tbl_carrinho.sessao = '".session_id()."'";
					$rs_carrinho = mysql_query($query_rs_carrinho, $conn) or die(mysql_error());
					$row_rs_carrinho = mysql_fetch_assoc($rs_carrinho);
					$totalRows_rs_carrinho = mysql_num_rows($rs_carrinho);
     
    // Se o total for igual a zero é sinal que o produto ainda não está no carrinho
    if ($totalRows_rs_carrinho == 0)
    {
    // Aqui pegamos os dados do produto a ser incluido no carrinho
    $query_rs_produto = "select * from tbl_produtos where cod = '".$cod."'";
    $rs_produto = mysql_query($query_rs_produto, $conn) or die(mysql_error());
    $row_rs_produto = mysql_fetch_assoc($rs_produto);
    $totalRows_rs_produto = mysql_num_rows($rs_produto);
     
    // Se total for maior que zero esse produto existe e então podemos incluir no carrinho
    if ($totalRows_rs_produto > 0)
    {
    $registro_produto = mysql_fetch_assoc($rs_produto);
    // Incluimos o produto selecionado no carrinho de compras
    $add_sql = "INSERT INTO tbl_carrinho (id, cod, nome, preco, qtd, sessao)
    VALUES
    ('','".$row_rs_produto['cod']."','".$row_rs_produto['nome']."','".$row_rs_produto['preco']."','1','".session_id()."')";
    $rs_produto_add = mysql_query($add_sql, $conn) or die(mysql_error());
    }
    }	
    }
    }
    }	
     
    // Verificamos se a acao é igual a excluir
    if ($acao == "excluir")
    {
    // Verificamos se cod do produto é diferente de vazio
    if ($cod != '')
    {
    // Se for diferente de vazio verificamos se é numérico
    if (is_numeric($cod))
    {	
    // Tratamos a variavel de caracteres indevidos
    $cod = addslashes(htmlentities($cod));
    // Verificamos se o produto referente ao $cod está no carrinho para o session id correnpondente
    $query_rs_car = "SELECT * FROM tbl_carrinho WHERE cod = '".$cod."' AND sessao = '".session_id()."'";
    $rs_car = mysql_query($query_rs_car, $conn) or die(mysql_error());
    $row_rs_carrinho = mysql_fetch_assoc($rs_car);
    $totalRows_rs_car = mysql_num_rows($rs_car);
     
    // Se encontrarmos o registro, excluimos do carrinho
    if ($totalRows_rs_car > 0)
    {
    $sql_carrinho_excluir = "DELETE FROM tbl_carrinho WHERE cod = '".$cod."' AND sessao = '".session_id()."'";
    $exec_carrinho_excluir = mysql_query($sql_carrinho_excluir, $conn) or die(mysql_error());
    }
    }
    }
    }
     
    // Verificamos se a ação é de modificar a quantidade do produto
    if ($acao == "modifica")
    {
    $quant = $_POST['qtd'];
    // Se for diferente de vazio verificamos se é numérico
    if (is_array($quant))
    {	
    // Aqui percorremos o nosso array
    foreach($quant as $cod => $qtd)
    {
    // Verificamos se os valores são do tipo numeric
    if(is_numeric($cod) && is_numeric($qtd))
    {
    // Fazemos nosso update nas quantidades dos produtos
    $sql_modifica = "UPDATE tbl_carrinho SET qtd = '$qtd' WHERE cod = '$cod' AND sessao = '".session_id()."'";
    $rs_modifica = mysql_query($sql_modifica, $conn) or die(mysql_error());
    }
    }
    }
     
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Venda</title>
    </head>
    <body>
		<div align="center"><img src="imgs/carrinho.jpg" width="589" height="102" />
		</div>
		<form action="carrinho.php?acao=modifica" method="post">
			<table width="100%" border="1" cellspacing="0" cellpadding="0">
				<tr>
					<th width="36%" scope="col"><div align="left">PRODUTO</div></th>
					<th width="22%" scope="col">PRE&Ccedil;O</th>
					<th width="13%" scope="col">QUANTIDADE</th>
					<th width="14%" scope="col">SUBTOTAL</th>
					<th width="15%" scope="col">&nbsp;</th>
				</tr>
				<?
					$sql_meu_carrinho = "SELECT * FROM tbl_carrinho WHERE sessao = '".session_id()."' ORDER BY nome ASC";
					$exec_meu_carrinho = mysql_query($sql_meu_carrinho, $conn) or die(mysql_error());
					$qtd_meu_carrinho = mysql_num_rows($exec_meu_carrinho);
					if ($qtd_meu_carrinho > 0){
						$soma_carrinho = 0;
						while ($row_rs_produto_carrinho = mysql_fetch_assoc($exec_meu_carrinho)){
							$soma_carrinho += ($row_rs_produto_carrinho['preco']*$row_rs_produto_carrinho['qtd']);
				?>
				<tr>
					<td><span>
						<?=$row_rs_produto_carrinho['nome']?>
					</span></td>
					<td><div align="center" class="style3"><?= number_format($row_rs_produto_carrinho['preco'],2,",","."); ?></div></td>
					<td><div align="center" class="style3"><input type"text" size="2" name="qtd[<?=$row_rs_produto_carrinho['cod']?>]" value="<?=$row_rs_produto_carrinho['qtd']?>" /></div></td>
					<td><div align="center" class="style3"><?= number_format($row_rs_produto_carrinho['preco']*$row_rs_produto_carrinho['qtd'],2,",","."); ?></div></td>
					<td><div align="center"><a href="carrinho.php?cod=<?=$row_rs_produto_carrinho['cod']?>&acao=excluir"><img src="imgs/del_carrinho.jpg" width="110" height="21" border="0" /></a></div></td>
				</tr>
				<?}}?>
				<tr>
					<td colspan="3"><div align="right"><strong>TOTAL:</strong>&nbsp; </div> <div align="right"></div> <div align="right"></div></td>
					<td><div align="center" class="style3 style4">
					<?= number_format($soma_carrinho,2,",","."); ?></div></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<th width="33%" height="60" scope="col"><span class="style3"><a href="produtos.php"><img src="imgs/comprando.jpg" width="287" height="40" border="0" /></a></span></th>
						<th width="33%" scope="col">&nbsp;</th>
						<th width="34%" scope="col"><label>
						<input type="image" name="imageField" src="imgs/atualizar.jpg" />
						</label></th>
					</tr>
					</table></td>
				</tr>
			</table>
		</form>
	</body>
</html>