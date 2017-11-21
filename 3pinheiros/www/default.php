<!DOCTYPE html>
<html lang="pt-br"> 
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link type='text/css' rel='stylesheet' href='css/estilo.css' />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,400,300' rel='stylesheet' type='text/css'>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>

	<script type="text/javascript">
		$.fn.cycle.updateActivePagerLink = function(pager, currSlideIndex) { 
	    $(pager).find('a').removeClass('activeLI') 
    	    .filter('a:eq('+currSlideIndex+')').addClass('activeLI'); 
		};
	</script>
	<script type="text/javascript">
  		jQuery(document).ready(function($) {
		    $(".scroll").click(function(event) {
		    event.preventDefault();
		    $('html,body').animate( { scrollTop:$(this.hash).offset().top } , 1500);
		    } );
			
			$('.slideshow').cycle({
			fx: 'fade',
			pager:  '.nav',
			pagerAnchorBuilder: function(idx, slide) { 
       	 	return '<a href="#"></a>'; } 
			});
		} );
	</script>
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script type="text/javascript" src="./jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
		// Use jQuery com a variavel $j(...)
		var $j = jQuery.noConflict();
		$j(document).ready(function() {
			$j(".voltarTopo").hide();
			$j(function () {
				$j(window).scroll(function () {
					if ($j(this).scrollTop() > 300) {
						$j('.voltarTopo').fadeIn();
					} else {
					$j('.voltarTopo').fadeOut();
				}
			});
			$j('.voltarTopo').click(function() {
				$j('body,html').animate({scrollTop:0},600);
			}); 
		});});
	</script>

	<title>Posto e Churrascaria Três Pinheiros</title>
</head>

<body>

<div class="container">
	<div class="topo">
    	<div class="logo"><a href="/"><img src="./img/logo.png"></a></div>
        <hr />
        <div class="menu">
        	<a href="?pag=pagina1.html">Quem Somos</a>
            <a href="">Produtos e Serviços</a>
            <a href="">Localização</a>
            <a href="">Contato</a>
        </div>
    </div>
    
    <?php
		$f = (isset($_GET['pag'])) ? $_GET['pag'] : '';
		if (empty($f)) {
			include("home.htm");
		}else {
			echo "<div class='container_interno'>";       
			if (file_exists("arquivos/$f")) {
				include("arquivos/$f");
			}else {
				echo "<h1 align='center'>O arquivo $f não foi encontrado</h1>";
			}
			echo "</div>";
		}
	?>
    
    <div class="rodape">
        Rodovia br 277 km 398 - Candói/Pr. <br>
        10 km de distância do Pedágio (Sentido Guarapuava à Três Pinheiros)<br>
        <br>
        Fone: (42) 3626-2194<br>
        
        <div class="redes">
            <div class="opcao1">
            	<a href="http://www.facebook.com/melhornegocioconsorcios" target="_blank"></a>
            </div>
            <div class="opcao2">
            	<a href="2" target="_blank"></a>
            </div>
            <div class="opcao3">
            	<a href="3" target="_blank"></a>
            </div>
            <div class="opcao4">
            	<a href="4" target="_blank"></a>
            </div>
		</div>
        
		<i>©2016. Todos os Direitos Reservados</i>
	</div>

    <input type="button" class="voltarTopo" onclick="$j('html,body').animate({scrollTop: $j('#voltarTopo').offset().top}, 2000);" alt="Voltar ao topo"value="" >

</div>

</body>
</html>
