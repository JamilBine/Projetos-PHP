    <?php
    	$ip = $_SERVER["REMOTE_ADDR"];
		$sql = "SELECT c.*, nome_produto,  preco_consumidor-(preco_consumidor*(desconto_consumidor/100)) as total, disponivel_entrega, foto1 FROM mservice.carrinho_compras as c inner join Produtos as p on c.codigo_produto=p.codigo_produto where sessao_cliente='".$ip."'"; 
		$result = mysql_query($sql, $conecta); 	
	?>
    <section class="container">
    	<div class="pg_carrinhodecompras">
    	<div class="topo_carrinho"></div>
        <table cellpadding="0" cellspacing="0">
        	<tr>
            	<th>Produto</th>
                <th>Quantidade</th>
                <th>Entrega</th>
                <th>Valor do Unitário</th>
                <th>Valor Total</th>
                <th>&nbsp;</th>
            </tr>
            <?php
            while($consulta = mysql_fetch_array($result)) { 
				$total=$consulta[total]*$consulta[quantidade];
   				echo "<tr><td style='width:37%; padding-left:5%; padding-right:5%'><a href='index.php?id=$consulta[codigo_produto]'><img src='/sap_arquivos/imagens/$consulta[foto1]'></a>
                    	<a href='index.php?id=$consulta[codigo_produto]'>$consulta[nome_produto]</a></td>
						<td style='width:10%;'><form name='form$consulta[codigo_carrinho]' method='post' action='alterar_quantidade.php'><input name='id' type='hidden' value='$consulta[codigo_carrinho]' /><input name='produto' type='hidden' value='$consulta[codigo_produto]' />
                    	<input type='number' name='quantidade' id='quantidade' value='$consulta[quantidade]' style='width:50%; font-size:2.5em; text-align:center' min='1' max='10' step='1' onchange='document.form$consulta[codigo_carrinho].submit();'></form></td>
                		<td style='width:18%;'>Entrega para o<br>CEP: 85035-260<br /><span><strong>10 dias úteis</strong></span><br />
                		<a href='#'>Entenda o prazo</a></td>
                		<td style='width:12%;'><span>R$ ".number_format($consulta[total],2,",",".")."</span></td>
                		<td style='width:18%;'><b>R$ ".number_format($total,2,",",".")."</b></td>
						<td style='width:5%;'><a href='remover_carrinho.php?id=$consulta[codigo_carrinho]' class='bt_remove_carrinho_compras'></a></td></tr>";
			} 
			mysql_free_result($result);
		?>
        </table>
        
        <table cellpadding="0" cellspacing="0"> 
          
        </table>
        <div class="calcular_frete_carrinho">
       	  <p>Simule o prazo de entrega e o frete para seu CEP abaixo:</p>
       	  <form data-ng-submit="getFreight()">
       	    <div>
       	      <div>
       	        <div>
       	          <input style="margin-right: 1%; border-radius:5px; border:1px solid #818181; height: 35px;" id="cep" name="cep" type="text" data-clean="true" data-mask="99999-999" required>
                  Digite seu CEP
   	            </div>
       	      </div>
   	        </div>
   	      </form>
       	  <br>
       	  <p><strong>Aten&ccedil;&atilde;o</strong>: O prazo come&ccedil;a a contar a partir da aprova&ccedil;&atilde;o do pagamento.</p>          
        </div>
        <div style="float:right; width:30%; text-align:right; margin-top: 2%">
        <?php
				if ($userID=='0'){
                	echo '<p style="margin-bottom:7%;"><a href="#janela_entre" rel="modal" class="bt_comprar_produto">Comprar</a></p>
          					<p style="margin-bottom:7%"><a href=index.php" rel="modal" class="bt_comprar_produto">Comprar mais</a></p>
							<a href="#janela_entre" rel="modal" class="bt_comprar_produto">Comprar 1-Click</a>';
				}else{
					echo '<p style="margin-bottom:7%"><a href="index.php?f=pagamento.php" class="bt_comprar_produto">Comprar</a></p>
          					<a href="index.php?f=pagamento.php" class="bt_comprar_produto">Comprar 1-Click</a>';
				}
				?>
        </div>
      </div>
        <div style="clear:both"></div>
    </section>

