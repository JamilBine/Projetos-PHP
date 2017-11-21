<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Supermercado Super Mill</title>

<link type='text/css' rel='stylesheet' href='./css/estilo.css' />

</head>

<body>

	<div class="topo">
    	<a class="link" href="#" target="_blank"></a>
        <div class="menu_topo">
        	<a href="/">Home</a> | 
            <a href="?pag=institucional.htm">Institucional</a> | 
            <a href="#">Nossas Lojas</a> | 
            <a href="#">Trabalhe Conosco</a> | 
            <a href="#">Faça seu Pedido</a> | 
            <a href="#">Entrega</a> | 
            <a href="#">Contato</a> 
		</div>
	</div>
    <div class="fundo"><center><a href="#"><img src="img/destaque.png"></a></center></div>
    
    <?php
		$pag = (isset($_GET['pag'])) ? $_GET['pag'] : '';
		if (file_exists($pag)) {
		    include($pag);
		} else {
		    echo "<h1>O arquivo $pag não foi encontrado</h1>";
		}
	?>
    
    <div class="ofertas">
   	    <h1> Super Ofertas para você!</h1>
        <ul>
        	<li>
                <a href="#" title="Bovino"><img src="img/p1.jpg" alt="Bovino" border="0" /></a>
                <h2>Lagarto Bovino Resfriado</h2>
                <strike>De: </strike>
                <h1>Por:</h1>
            </li>
            <li>
            	<a href="#" title="Pimentão"><img src="img/p2.jpg" alt="Pimentão" border="0" /></a>
                <h2>Pimentão Orgânico</h2>
                <strike>De: </strike>
                <h1>Por:</h1>
            </li>
            <li>
            	<a href="#" title="Maçã"><img src="img/p3.jpg" alt="Maçã" border="0" /></a>
                <h2>Maçã Fuji</h2>
                <strike>De: </strike>
                <h1>Por:</h1>
            </li>
            <li>
            	<a href="#" title="Pão de Queijo"><img src="img/p4.jpg" alt="Pão de Queijo" border="0" /></a>
                <h2>Pão de Queijo</h2>
                <strike>De:</strike>
                <h1>Por:</h1>
            </li>
            <li>
            	<a href="#" title="Tudo Gostoso"><img src="img/pub1.jpg" alt="Tudo Gostoso" border="0" /></a>
                <a href="#" title="Saúde"><img src="img/pub2.jpg" alt="Saúde" border="0" /></a>
            </li>
        </ul>
        <div style="clear:both"></div>
        	<a href="#" title="Mais Ofertas"><img src="img/ver_ofertas.jpg" alt="Mais Ofertas" border="0" /></a>
        <hr />
        <ul>
        	<center>
	        <a href="#" title="Info 1"><img src="img/info1.jpg" alt="Info 1" border="0" /></a>
        	<a href="#" title="Info 2"><img src="img/info2.jpg" alt="Info 2" border="0" /></a>
            <a href="#" title="Info 1"><img src="img/info1.jpg" alt="Info 1" border="0" /></a>
        	<a href="#" title="Info 2"><img src="img/info2.jpg" alt="Info 2" border="0" /></a>
            </center>
        </ul>
    </div>
    
    <div style="clear:both"></div>
    <div class="footer">
    	<ul>
        	<li><a href="#">Home</a>|</li> 
            <li><a href="#">Institucional</a> |</li> 
            <li><a href="#">Nossas Lojas</a> | </li>
            <li><a href="#">Trabalhe Conosco</a> |</li> 
            <li><a href="#">Faça seu Pedido</a> |</li>
            <li><a href="#">Entrega</a> |</li>
            <li><a href="#">Contato</a></li>
       	</ul>
		<ul><li><h2>De segunda à sexta: 07:30 às 20:30 | Sábados: 08:00 às 18:00</h2></li></ul>
    </div>

</body>
</html>
