<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
	<head>
		<title>Sistema de Estoque</title>
		<?php session_start();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="./estilo.css" rel="stylesheet" type="text/css" media="all"/>
	</head>
	<body>
		<table align=center width="100%" height="600" border="1">
			<tr>
				<td height="90" colspan="2" bgcolor="#CCCCCC" valign="bottom" id="background">
					<div align=right id="login">
						<form method="post" action="ope.php" id="formlogin" name="formlogin" >
							<?php
								if(isset($_SESSION['login']) ){ 
									$logado = $_SESSION['login'];?>
									<strong>Seja bem vindo <?php echo $logado; ?>!</strong><br>
									<input type="button" value="Sair" onclick="javascript: location.href='logout.php';" />
							<?php } else { ?>
									<span style="padding-right:163px">LOGIN</span><br>
									<label>NOME  :</label>
									<input type="text" name="login" id="login" onkeypress="checar_caps_lock(event)" style="margin-left:5px; width: 150px;" /><br>
									<label>SENHA :</label>
									<input type="password" name="senha" id="senha" maxlength="10" onkeypress="checar_caps_lock(event)" style="width: 150px;" /><br>
									<div id="aviso_caps_lock" style="visibility: hidden">Atenção: O Caps Lock esta ativado!</div>
									<input type="submit" value="Entrar" />
							<?php } ?>
						</form>
					</div>
					<div id="menu">
						<?php include('top_menu.php');?>
					</div> 
				</td>
			</tr>
			<tr>
				<td width="500px" bgcolor="white">
					<strong><center>Loja PC - Produtos de Informática</center><br></strong>
					<br><hr><br>
					<fieldset><legend><b><font color ="red">Sobre a Empresa</font></b></legend>
						<p><b><small>A Loja PC atua com o comércio de produtos de informática em geral.</small></b></p>
						<br>
						<p><b><small>Fundada em setrembro de 2014 próximo ao campus Cedeteg da Universidade Estadual do Centro-Oeste,
						oferecemos o melhor dos produtos de informática para você.</small></b></p>
						<br>
						<p><b><small>Comércio de: Notebooks, Tablets, Desktop, HDs, Memórias entre outros.</small></b></p>
						<br><hr>
					</fieldset>
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