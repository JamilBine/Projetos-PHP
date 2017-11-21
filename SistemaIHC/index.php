<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="./estilo.css" rel="stylesheet" type="text/css" media="all"/>
		<title>Sistema de Estoque</title>
		<?php session_start();?>
		<script type="text/javascript">
			function checar_caps_lock(ev) {
				var e = ev || window.event;
				codigo_tecla = e.keyCode?e.keyCode:e.which;
				tecla_shift = e.shiftKey?e.shiftKey:((codigo_tecla == 16)?true:false);
				if(((codigo_tecla >= 65 && codigo_tecla <= 90) && !tecla_shift) || ((codigo_tecla >= 97 && codigo_tecla <= 122) && tecla_shift)) {
					document.getElementById('aviso_caps_lock').style.visibility = 'visible';
				} else {
					document.getElementById('aviso_caps_lock').style.visibility = 'hidden';
				}
			}
		</script>
	</head>
	<body>
		<table align=center width="100%" height="600" border="1">
			<tr>
				<td height="150px" colspan="2" valign="bottom" id="background">
					<div align="right">
						<form method="post" action="ope.php" id="formlogin" name="formlogin" >
							<?php
								if(isset($_SESSION['login']) ){ 
									$logado = $_SESSION['login'];?>
									<strong>Seja bem vindo <?php echo $logado; ?>!</strong><br>
									<input type="button" value="Sair" onclick="javascript: location.href='logout.php';" />
								<?php } else { ?>
								<span style="padding-right:163px">LOGIN</span><br>
								<label>NOME  :</label>
								<input type="text" name="login" id="login" onKeyPress="checar_caps_lock(event)" /><br>
								<label>SENHA :</label>
								<input type="password" name="senha" id="senha" maxlength="10" onKeyPress="checar_caps_lock(event)" style="width: 150px;" /><br>
								<div id="aviso_caps_lock" style="visibility: hidden; color:red"><b>Aten&ccedil;&atilde;o, Caps Lock ativado!</b></div>
								<input type="submit" value="Entrar" />
							<?php } ?>
						</form>
					</div>
					<div id="menu">
						<?php include "top_menu.php" ;?>
					</div> 
				</td>
			</tr>
			<tr>
				<td bgcolor="#FFFFFF">
					<fieldset><legend><strong>Informa&ccedil;&otilde;es Gerais Sobre a Empresa</strong></legend>
						<center>A Loja PC est&aacute; no ramo tecnol&oacute;gico h&aacute; pouco tempo, mas conseguindo atingir 
								seus objetivos da melhor maneira.
								Sempre atendendo da melhor forma o seu cliente.
						<br><br><br>
						<strong><font color="red">Venha conferir as nossas ofertas!!!</font></center></strong>
						<br><br><br>
						<hr>
						Atendimento: Segunda a sexta das 9:00 &agrave;s 18:00
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