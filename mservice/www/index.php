<?php

session_start(); //sempre session_start antes de usar sessions
if(isset($_SESSION["userID"])){
$userID=$_SESSION["userID"];
}
else{
$userID='0';
}

include("abrir_conexao.php");
$f=$_GET['f'];
$grupo=$_GET['g'];
$categoria=$_GET['c'];
$subcategoria=$_GET['sc'];
$marca=$_GET['m'];
$faixa_preco=$_GET['fp'];
$busca=$_GET['q'];
$id=$_GET['id'];
$titulo="Mservice :: Tudo em Inform&aacute;tica e Eletr&ocirc;nicos :: ";
if (!empty($busca)) {
	$f="categoria.php";
}
if (!empty($id)) {
	$f="detalhes_produto.php";
	$sql = "SELECT * FROM  Produtos where codigo_produto='".$id."'"; 
	$result = mysql_query($sql, $conecta); 
	$produto_bd = mysql_fetch_row($result);
	$titulo=$produto_bd[5];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso8859-1" />
	<title><?php echo $titulo; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Loja online com os melhores eletrônicos, TVs LCD, notebooks, computadores, câmeras e produtos de qualidade para você. " />
	<meta name="keywords" content="informatica computador notebook netbook mp3 player pen drive monitor impressora modem tv lcd led televisao maquina digital gps instrumentos musicais eletronicos mservice.com.br" />

	<link href="site2.css" type="text/css" rel="stylesheet" />
    	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    	<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
	<script src="/scripts/ajax.js" type="text/javascript"></script>
	<script src="/scripts/form.js" type="text/javascript"></script>


	<script type="text/javascript">
		$.fn.cycle.updateActivePagerLink = function(pager, currSlideIndex) { 
	    $(pager).find('a').removeClass('activeLI') 
    	    .filter('a:eq('+currSlideIndex+')').addClass('activeLI'); 
		};
	</script>
	<script type="text/javascript">
  		jQuery(document).ready(function($) {
			
			$('.slideshow').cycle({
			fx: 'fade',
			pager:  '#nav',
			pagerAnchorBuilder: function(idx, slide) { 
       	 	return '<a href="#"></a>'; } 
			});
			
			$("a[rel=modal]").click( function(ev){
					ev.preventDefault();

					var id = $(this).attr("href");

					var alturaTela = $(document).height();
					var larguraTela = $(window).width();
	
					//colocando o fundo preto
					$('#mascara').css({'width':larguraTela,'height':alturaTela});
					$('#mascara').fadeIn(1000);	
					$('#mascara').fadeTo("slow",0.8);

					var left = ($(window).width() /2) - ( $(id).width() / 2 );
					var top = ($(window).height() / 2) - ( $(id).height() / 2 );
					
					$(id).css({'top':top,'left':left});
					$(id).show();	
 				});

 				$("#mascara").click( function(){
 					$(this).hide();
 					$(".window").hide();
 				});

 				$('.fechar').click(function(ev){
 					ev.preventDefault();
 					$("#mascara").hide();
 					$(".window").hide();
 				});		
		} );
	</script>

</head>

<body>
	<header>
    	<div class="barra_titulo">
		<div class="container">
        	<div class="menu_topo">
            	<a href="#">Atendimento</a>
                <?php
				if ($userID=='0'){
                	echo '<a href="#janela_entre" rel="modal">Meus pedidos</a>
			                <a href="#janela_entre" rel="modal" style="border:0">Minha Conta</a>';
				}else{
					echo '<a href="index.php?f=meuspedidos.php">Meus pedidos</a>
			                <a href="index.php?f=minhaconta.php" style="border:0">Minha Conta</a>';
				}
				?>
            </div>
            <div class="compre_telefone">Compre pelo telefone: <strong>(42) 3622 1418</strong></div>
            <div style="clear:both"></div>
		</div>	
        </div>
            <div class="container">
        		<div class="logo">
        		  <a href="index.php" style="z-index:100"><img src="img/logo.png" ></a>
        		</div>
                <div class="busca">
                	<form action="#" method="get">
                    	<input name="q" type="text" maxlength="100" required placeholder="Qual produto você procura?">
                        <input name="bt_buscar" type="submit" value="buscar">
                	</form>
                </div>
                <div class="carrinho">
                	
                    <?php
				if ($userID=='0'){
                	echo '<div><a href="#janela_entre" rel="modal" style="border-right:1px solid #CCC; padding-right:0.3em">Entre</a>
                    		<a href="#janela_cadastro" rel="modal">Cadastre-se</a></div>';
				}else{
					echo 'Seja bem-vindo! (<a href="logout.php">Sair</a>)';
				}
				?>
                    
                    <?php
						$sql = "SELECT count(*) as total_itens FROM carrinho_compras WHERE sessao_cliente='".$_SERVER["REMOTE_ADDR"]."'"; 
						$result = mysql_query($sql, $conecta); 
						$total_itens_carrinho = mysql_fetch_row($result);
					?>
                    <a href="index.php?f=carrinho_compras.php" class="bt_carrinho_compras">Carrinho<span>Itens (<?php echo $total_itens_carrinho[0]; ?>)</span></a>
                </div>
                <div style="clear:both"></div>
        	</div>
    </header>
<?php

if (empty($f)) {
	include("site/home.php");
} else {
	if (file_exists("site/$f")) {
		include("site/$f");
	} else {
	    echo "<h1 align='center'>O arquivo $f não foi encontrado</h1>";
	}
}
?>
    
    
    <footer id="rodape">
    	<div class="container" style="width: 72%; margin: 0 auto;">
        	<div class="receba_novidades">
            	<form action="#" method="post">
            	<label>Receba nossas novidades</label> <input name="feed" type="text" id="feed" placeholder="Cadastre seu e-mail" /><input name="bt_buscar" type="submit" value="Cadastrar">
                </form>
           	</div>
            <div style="clear:both"></div>
            <span>
            	<b>Departamentos</b>
                <a href="#">Telefonia</a>
				<a href="#">Informática</a>
				<a href="#">Hardware</a>
				<a href="#">Eletrônicos</a>
				<a href="#">Games</a>
                <a href="#">Esporte e Lazer</a>
            </span>
        	<span>
            	<b>Institucional</b>
        		<a href="#">Conhe&ccedil;a a Mservice</a>
				<a href="#">Sustentabilidade</a>
				<a href="#">Fale conosco</a>
        		<br />
                <b>D&uacute;vidas</b>
                <a href="#">Como Comprar</a>
				<a href="#">Formas de pagamento</a>
				<a href="#">Servi&ccedil;os de entrega</a>
    		</span>
    		<span>
        	    <b>Atendimento</b>
                Segunda &agrave; sexta das 9hrs at&eacute; 18hrs<br />
				Sab&aacute;do das 9hrs ate 13hrs
                <p>CNPJ: 03.874.953/0001-77<br />
				Endereço: Rua Capit&atilde;o Rocha, 2393<br /> 
				Guarapuava, PR - 85010-270<br />
				E-mail: mservice@mservice.com.br<br />
				Telefone: (42) 3622-1418</p>
		    </span>
            <div>
		    <span>
	            <b>&nbsp;</b>
    			<a href="#">Trocas e devolu&ccedil;&otilde;es</a>
				<a href="#">Garantia</a>
				<a href="#">Pol&iacute;tica de privacidade e seguran&ccedil;a</a>
		    </span>
            <span>
            	<b>&nbsp;</b>
				<a href="#">Seja nosso fornecedor</a>
				<a href="#">Seja nossa revenda</a>
				<a href="#">Vendas Corporativas</a>
            </span>
            </div>
            <div>
            	<a href="http://instagram.com/" target="_blank"><img style="padding-right:0.8em;" src="img/insta.png" /></a>
                <a href="http://facebook.com/" target="_blank"><img style="padding-right:0.8em;" src="img/fb.png" /></a>
                <a href="http://twitter.com/" target="_blank"><img style="padding-right:0.8em;" src="img/twitter.png" /></a>
            </div>
            <div>
            	<img style="padding:0.8em;" src="img/logo_rodape.png" />
			</div>
    		<div style="clear:both"></div>
        </div>
    </footer>
    
    <div class="window" id="janela_entre" style="width:550px; height:550px;">
			<a href="/" class="bt_fechar" data-dismiss="modal"><img src="img/close_window.png" width="44" height="48" alt="fechar"></a>
      		<div class="titulo_window">Entrar</div>
			<form action="/aspnet/autenticar.aspx" method="post" name="frmAutenticar" target="_top" id="frmAutenticar">
				<div class="linha_form">
               	  <label for="nome">E-mail</label>
					<input name="email" type="email" id="email" value=""/>
				</div>
				<div class="linha_form">
					<label for="nome">Senha</label>
					<input name="senha" type="password" id="senha" />
                </div>
                <div class="linha_form">
               	<a href="#">Esqueci minha senha</a> </div>
				<div class="linha_form">
				  <input type="submit" value="Login">
                </div>
				<input name="pag" type="hidden" id="pag" value="/site2016/autenticar.php" />
			</form>
            <div class="linha_form" style="margin-left:5%;">
            	<img style="vertical-align:middle;" src="img/fb.png"> <a href="#" style="padding-left:1%; color:#828282; margin:0 auto; text-decoration:none; border-bottom: none; font-size:0.8em;"> Entre com o Facebook</a>
            </div>
            <hr />
            <div class="linha_form" style="padding-left: 17%; paddint-top: 3%; margin:0 auto;">
           	Ainda n&atilde;o possu&iacute; uma conta? Cadastre-se <a style="margin:0; text-decoration:none; border-bottom: none; font-size:1.0em; color: #0293c2;" href="#janela_cadastro" rel="modal">aqui</a> 
            </div>
            <div class="linha_form" style="height: 75px; margin-top: 3%; margin-bottom: 5%;">
				<img src="img/logo.png">
            </div>            
		</div>
        
        <div class="window" id="janela_cadastro" style="width:450px; height:550px; overflow:auto; overflow-x:hidden; overflow-y:hidden; ">
			<a href="#" class="bt_fechar"><img src="img/close_window.png" width="44" height="48" alt="fechar"></a>
			<?php
				include("site/cadastro_cliente.php");
			?>
		</div>

		<!-- mascara para cobrir o site -->	
		<div id="mascara"></div>
</body>
</html>
<?php
include("fechar_conexao.php");
?>