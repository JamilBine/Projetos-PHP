<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
	<head>
		<title>Sistema de Estoque</title>
		<?php session_start();?>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="./estilo.css" rel="stylesheet" type="text/css" media="all"/>
		<script type="text/javascript">
function checar_caps_lock(ev) {
	var e = ev || window.event;
	codigo_tecla = e.keyCode?e.keyCode:e.which;
	tecla_shift = e.shiftKey?e.shiftKey:((codigo_tecla == 16)?true:false);
	if(((codigo_tecla >= 65 && codigo_tecla <= 90) && !tecla_shift) || ((codigo_tecla >= 97 && codigo_tecla <= 122) && tecla_shift)) {
		document.getElementById('aviso_caps_lock').style.visibility = 'visible';
		alert("CAPS");
	}
	else {
		document.getElementById('aviso_caps_lock').style.visibility = 'hidden';
	}
}
</script>
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
					<strong>Contato da Empresa.<br></strong>
					<p>
						<small>Se você deseja entrar em contato com a Loja PC, para enviar sugestões ou obter informações complementares
						sobre nossa loja, produtos e serviços, utilize as informações a baixo.</small>
					</p>
					<br>
					<fieldset><legend><b><font color ="red">Informações</font></b></legend>
						<p><b>Nome</b>: Loja PC LTDA</p>
						<p><br><b>Telefone</b>: +55(99) 998877669</p>
						<p><br><b>Endereço</b>: R. João X, Vila Boa, Guarapuava, PR</p>
						<p><br><b>E-mail</b>: lojapc@gmail.com</p>
						<br>
						<p><center><strong><b>Mapa da Loja</b></strong></center></p>
						<p><center><iframe src="https://www.google.com/maps/embed?pb=!1m12!1m10!1m3!1d3608.7905035544995!2d-51.4869996!3d-25.3830753!2m1!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1414605049233" width="400" height="300" frameborder="0" style="border:0"></iframe></center></p>
						<hr>
						<p>Empresários: Marlon Estevam Camilo dos Santos, Jamilson Bine</p>			
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