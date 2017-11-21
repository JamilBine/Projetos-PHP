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
      $query = "SELECT cpf, nome, telefone, endereco, email FROM cliente order by nome;";
      $resultado = mysql_query($query,$conexao);

?>
<html>
<head>
<title>Clientes</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../estilo.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>    
<table align=center width="100%" height="600" border="1">
  <tr>
	<td height="90" colspan="2" bgcolor="#CCCCCC" valign="bottom" id="background">
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
		<?php include"menu_lateral.php";?>
	</td>
    <td valign="top" width="400px" bgcolor="#FFFFFF">
		<center><table border="1">
		<?php 
		if(mysql_num_rows($resultado) > 0){?>
		<center><h1>Clientes</h1></center>
		<hr />
			<tr>
				<td><center><strong>Nome</strong></center></td>
				<td><center><strong>CPF</strong></center></td>
				<td><center><strong>Endere&ccedil;o</strong></center></td>
				<td><center><strong>Telefone</strong></center></td>
				<td><center><strong>E-mail</strong></center></td>
				<td><center><strong>Editar</strong></center></td>
				<td><center><strong>Excluir</strong></center></td>
			</tr>
			<?php while ($linha = mysql_fetch_array($resultado)) {?>
			<tr>
				<td><?php echo $linha['nome']; ?></td>
				<td><?php echo $linha['cpf']; ?></td>
				<td><?php echo $linha['endereco']; ?></td>
				<td><?php echo $linha['telefone']; ?></td>
				<td><?php echo $linha['email']; ?></td>
				<td><center><a href=../controle/editar_cliente.php?id=<?php echo $linha['cpf'] ?>><img src="../imagens/edit_mini.gif" /></center></a></td>
				<td><center><a href=../controle/deletar_cliente.php?id=<?php echo $linha['cpf'] ?>><img src="../imagens/action_delete.gif" /></center></a></td>
			</tr>
			<?php }} else{ ?> 
			<br><center><h3>Nenhum cliente cadastrado ainda.<br><br>
			Cadastre o seu primeiro cliente <a href="../cadastro/cadastrar_cliente.php">aqui</a>.</center>
			</h3>
			<?php }?>
		</table></center>

		<center>
        <div id="pesquisar">
            <h2>Pesquisar Cliente:</h2>
				<form action="clientes.php" method="post">
					Nome: <input type="text" name="nome_cliente" />
				<input type="submit" name="Buscar" value="Buscar" /><br />
				<?php
					$conexao = mysql_connect("localhost","root","");
					mysql_select_db("trabalhoihc",$conexao);

					$nome_cliente = isset($_POST['nome_cliente']) ? $_POST['nome_cliente'] : ""  ;
					
					if(isset($_POST['nome_cliente'])){
					$sql="SELECT * FROM cliente WHERE nome like '$nome_cliente'";
					$rs=mysql_query($sql) or die ('Erro na consulta da tabela CATEGORIA' .mysql_error());
					if(mysql_num_rows($rs) > 0){?>
						<h2>Resultados da pesquisa:</h2>
						<table class="tabela" cellpadding="2" cellspacing="0" >
						<tr>
							<td><b><center>Nome</center></b></td>
							<td><b><center>CPF</center></b></td>
						</tr>
						<?php while ($linha=mysql_fetch_array($rs)) {?> 
							<tr>
								<td><center><?php echo $linha['nome'];?></center></td>
								<td><center><?php echo $linha['cpf'];?></center></td>
							</tr>							
							
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