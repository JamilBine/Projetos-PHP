
     <section>
    	
        	<?php 
			include('site/menu.php');
			?>
    </section>
    <section class="container">
    	<div >
       	  <div class="detalhes_produto">
				<div class="item_menu_detalhes_produto">
        		<a href="index.php">home</a> > <a href="index.php?f=categoria.php&c=<?php echo $produto_bd[1] ?>"><?php echo $produto_bd[1] ?></a> > <a href="index.php?f=categoria.php&c=<?php echo $produto_bd[1] ?>&sc=<?php echo $produto_bd[2] ?>"><?php echo $produto_bd[2] ?></a>
        		</div>
                <div class="fotos_produto"><img src="/sap_arquivos/imagens/<?php echo $produto_bd[25] ?>" style="width:100%; height:auto"></div>
            <div class="destaque_destalhes_produto">
                	<h1><?php echo $produto_bd[5];?></h1>
                    <span class="produto_por">Por: R$ <?php echo number_format($produto_bd[7], 2, ',', '.')?></span>
                    <span class="produto_por_parcelas">em até <strong>12x de R$ <?php echo number_format($produto_bd[7]/12, 2, ',', '.')?></strong> sem juros no cartão</span>
                    <span class="produto_ou">ou</span>
                    <span class="produto_por2"><b>R$ <?php echo number_format($produto_bd[7]-($produto_bd[7]*0.05), 2, ',', '.')?></b> no Boleto, Transferência<br>
					ou 1x no Cartão de Crédito (5% de desconto)</span>
                    <p>
		              <form action="#" method="get" class="frmFrete_Produto">           	
                    	  <div style="width:10%"> <label for="calcular_frete">Frete e Prazo</label></div>
                    	  <input name="calcular_frete" type="text" placeholder="Digite seu Cep" maxlength="12">
                    	  <input name="btcalcular" type="submit" value="calcular">
                  	  
              			</form>
              		</p>
                    <div style="clear:both"></div>
                <a href="adicionar_carrinho.php?id=<?php echo $produto_bd[0];?>" class="bt_comprar_produto">comprar</a> <a href="#" class="bt_comprar_produto">comprar com um click</a> </div>
                <div style="clear:both"></div>
   	  		<div class="especificacao_produto">
	          		<h2>Especifica&ccedil;&otilde;es do Produto</h2>
			    	<?php echo str_replace(chr(10),"<br />",$produto_bd[6]);?>
    	    	</div>
        	</div>
            
            <div class="produtos">
            <h3>Quem viu este produto, viu também:</h3>
            	<ul>
                	<?php
					$sql = "SELECT * FROM Produtos WHERE libera_consumidor='Y' and ( codigo_categoria='".$produto_bd[1]."') ORDER BY rand() limit 4"; 
					$result = mysql_query($sql, $conecta); 
					while($consulta = mysql_fetch_array($result)) { 
						$parcela=number_format($consulta[preco_consumidor]/12,2);
						echo "<li><img src='/fotos/100x150/$consulta[foto1]'>
                        	<div class='descricao_produto'>
                        	<a class='titulo_produto' href='index.php?id=$consulta[codigo_produto]'>$consulta[nome_produto]</a>
                        	<span class='valor_produto'>Por R$ $consulta[preco_consumidor]</span>
                        	<span class='parcelas_produto'>12x de R$ " . $parcela . " <br />sem juros</span>
                    		<a href='index.php?id=$consulta[codigo_produto]' class='bt_comprar'>comprar</a>
                        	</div>
                    		</li>";
					} 
					mysql_free_result($result); 
				?>
                </ul>
                </div>   
                <div style="clear:both"></div>
            <div class="destaques">
            	<ul>
                	<li><a href="#"><img src="img/destaque/destaque1.png" width="384" height="239"></a></li>
                  	<li><a href="#"><img src="img/destaque/destaque2.png" width="386" height="238"></a></li>
                  	<li><a href="#"><img src="img/destaque/destaque3.png" width="385" height="238"></a></li>
                </ul>
            </div>
            <div style="clear:both"></div> 
   	  	</div>
    </section>
