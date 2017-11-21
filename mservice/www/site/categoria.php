
    <section>
    	
        	<?php
			include('site/menu.php');
			?>
    </section>
    <section class="container categorias">
    
    	<div class="menu_produtos_categoria">
        
        <div class="item_menu_produtos">
        	<?php
			echo "<a href='index.php'>home</a> > <a href='index.php?f=categoria.php&c=".$categoria."'>".$categoria."</a>";
			if (!empty($subcategoria)) {
				echo " > <a href='index.php?f=categoria.php&c=".$categoria."&sc=".$subcategoria."'>".$subcategoria."</a>";
			}
			?>
        </div>
		
        <?php
		if (!empty($grupo)) {
			$sql="SELECT * FROM mservice.Categorias where codigo_grupo=".$grupo." order by nome_categoria;";
			//echo "<div class='item_menu_produtos'><h3>".$categoria."</h3>";
			echo "<ul>";
			$result = mysql_query($sql, $conecta); 
			while($consulta = mysql_fetch_array($result)) { 
				echo "<li><a href='index.php?f=categoria.php&c=$consulta[nome_categoria]'>$consulta[nome_categoria]</a></li>";
			} 
			echo "</ul></div>";
			mysql_free_result($result); 
		} else {
		
		if (empty($subcategoria)) {
			$sql="SELECT codigo_subcategoria, count(*) AS TotalProdutos FROM Produtos WHERE libera_consumidor = 'Y' AND codigo_categoria = '".$categoria."' GROUP BY codigo_subcategoria ORDER BY codigo_subcategoria;";
			echo "<div class='item_menu_produtos'><h3>".$categoria."</h3><ul>";
			$result = mysql_query($sql, $conecta); 
			while($consulta = mysql_fetch_array($result)) { 
				echo "<li><a href='index.php?f=categoria.php&c=".$categoria."&sc=$consulta[codigo_subcategoria]'>$consulta[codigo_subcategoria] ($consulta[TotalProdutos])</a></li>";
			} 
			echo "</ul></div>";
			mysql_free_result($result); 
		} // else {
   	  		echo "<div class='item_menu_produtos'><h3>marcas</h3><ul>";
			
					if (!empty($marca)){
						$sql = "SELECT DISTINCT nome_marca, Marcas.codigo_marca, count(Produtos.codigo_produto) as totalProdutos FROM Marcas, Produtos WHERE Produtos.libera_consumidor='Y' and Produtos.codigo_marca=Marcas.codigo_marca and Produtos.codigo_categoria='".$categoria."' and codigo_subcategoria like '".$subcategoria."%' and Marcas.codigo_marca=".$marca." group by nome_marca, Marcas.codigo_marca order by nome_marca"; 
						$result = mysql_query($sql, $conecta); 
						while($consulta = mysql_fetch_array($result)) { 
				   			echo "<li>$consulta[nome_marca] ($consulta[totalProdutos])</a></li>";
						} 
						mysql_free_result($result); 
						echo "<li><a href='index.php?f=categoria.php&c=".$categoria."&sc=".$subcategoria."'><b>Todas as marcas</b></a></li>";
					}else{
					$sql = "SELECT DISTINCT nome_marca, Marcas.codigo_marca, count(Produtos.codigo_produto) as totalProdutos FROM Marcas, Produtos WHERE Produtos.libera_consumidor='Y' and Produtos.codigo_marca=Marcas.codigo_marca and Produtos.codigo_categoria='".$categoria."' and codigo_subcategoria like '".$subcategoria."%' group by nome_marca, Marcas.codigo_marca order by nome_marca"; 
					$result = mysql_query($sql, $conecta); 
					while($consulta = mysql_fetch_array($result)) { 
			   			echo "<li><a href='index.php?f=categoria.php&c=".$categoria."&sc=".$subcategoria."&m=$consulta[codigo_marca]'>$consulta[nome_marca] ($consulta[totalProdutos])</a></li>";
					} 
					mysql_free_result($result); 
					}
            echo "</ul></div>";
            
            echo "<div class='item_menu_produtos'><h3>filtros</h3><ul>";
    	        	$sql = "SELECT DISTINCT codigo_classificacao, count(*) as TotalProdutos FROM Produtos WHERE Produtos.libera_consumidor='Y' and Produtos.codigo_categoria='".$categoria."' and codigo_subcategoria like '".$subcategoria."%' GROUP BY codigo_classificacao"; 
					$result = mysql_query($sql, $conecta); 
					while($consulta = mysql_fetch_array($result)) { 
			   			echo "<li><input id='filtro' type='checkbox' name='filtro' value='$consulta[codigo_classificacao]' ><label for='ckmarca$consulta[codigo_classificacao]'>$consulta[codigo_classificacao] ($consulta[TotalProdutos])</label></li>";
					} 
					mysql_free_result($result); 
	         echo "</ul></div>";           
            
            echo "<div class='item_menu_produtos'><h3>faixa de pre&ccedil;o</h3><ul>";
            	if (empty($marca)) {
					$sql = "SELECT min(convert(preco_consumidor, signed)) as menor_preco, max(convert(preco_consumidor, signed)) as maior_preco FROM Produtos WHERE Produtos.libera_consumidor='Y' and codigo_categoria='".$categoria."' and codigo_subcategoria like '".$subcategoria."%'"; 
				}else
					{$sql = "SELECT min(convert(preco_consumidor, signed)) as menor_preco, max(convert(preco_consumidor, signed)) as maior_preco FROM Produtos WHERE Produtos.libera_consumidor='Y' and codigo_categoria='".$categoria."' and codigo_subcategoria like '".$subcategoria."%' and codigo_marca like '".$marca."'";
				}
			
					$result = mysql_query($sql, $conecta); 
					$row = mysql_fetch_row($result);
					$menor=$row[0];
					$maior=$row[1]; //
	  				$diferenca=$maior-$menor;
	  				$intervalo=$diferenca/4;

					for($i=1; $i <= 4; $i++){
				   		if ($i==1) {
							echo "<li><a href='index.php?f=categoria.php&c=".$categoria."&sc=".$subcategoria."&m=".$marca."&p_maior=".$menor."'>at&eacute; R$ ".number_format($menor, 2, ',', '.')."</a></li>";
						}
						else {
							if ($i!=4) {
								echo "<li><a href='index.php?f=categoria.php&c=".$categoria."&sc=".$subcategoria."&m=".$marca."&p_menor=".$menor."&p_maior=".strval(intval($menor)+intval($intervalo))."'>R$ ".number_format($menor, 2, ',', '.')." a R$ ".number_format($menor+$intervalo, 2, ',', '.')."</a></li>";
							}else{
	  							echo "<li><a href='index.php?f=categoria.php&c=".$categoria."&sc=".$subcategoria."&m=".$marca."&p_menor=".$menor."'>acima de R$ ".number_format($menor, 2, ',', '.')."</a></li>";
							}
						}
						$menor=$menor+$intervalo+1;
					}
					mysql_free_result($result); 
        	echo "</ul></div>";           
          //  }
		}
            ?>
        </div>
    	<div class="produtos_categoria">

            <div class="titulo_pg_categoria">
            	<div class="slideshow"> 
            		<a href="#"><img src="banners/banner01.jpg" style="width:100%; height:auto; margin-bottom:2%"></a>
                	<a href="#"><img src="banners/banner02.png" style="width:100%; height:auto; margin-bottom:2%"></a>
                	<a href="#"><img src="banners/banner03.png" style="width:100%; height:auto; margin-bottom:2%"></a>
				</div>
				
            	
				<div class="paginacao">
					
					<?php
					if (!empty($busca)) {
						echo "<h1>Resultado da Busca $busca</h1>";
						$textobusca=str_replace(" ","%",$busca);
						$sql = "SELECT * FROM Produtos WHERE libera_consumidor='Y' and (codigo_produto='".$busca."' or nome_produto like '%".$textobusca."%' or nome_produto like '%".$textobusca." %' or codigo_categoria='% ".$textobusca." %' or codigo_subcategoria like '%".$textobusca."%' or partnumber='".$busca."' or modelo like '% ".$textobusca." %' or descricao_produto like '% ".$busca." %') order by semestoque_consumidor, disponivel_entrega desc"; 
					}else{
						if (!empty($marca)) {
							$sql = "SELECT * FROM Produtos WHERE libera_consumidor='Y' and codigo_categoria='".$categoria."' and codigo_subcategoria like '".$subcategoria."%' and codigo_marca='".$marca."' order by semestoque_consumidor, disponivel_entrega desc"; 
						}else{
							if (!empty($grupo)) {
								$sql = "SELECT p.* FROM (Produtos as p inner join Categorias as c on p.codigo_categoria=c.nome_categoria) inner join grupo as g on g.codigo_grupo=c.codigo_grupo where g.codigo_grupo=".$grupo." order by semestoque_consumidor, disponivel_entrega desc"; 
							}else{
								$sql = "SELECT * FROM Produtos WHERE libera_consumidor='Y' and codigo_categoria='".$categoria."' and codigo_subcategoria like '".$subcategoria."%' order by semestoque_consumidor, disponivel_entrega desc"; 
							}
						}
					}
					
					$sql_res = mysql_query($sql, $conecta);
					$contador=mysql_num_rows($sql_res); //Pegando Quantidade de itens
					//Verificando se já selecionada alguma página
					if(empty($_GET['pag'])){
						$pag=1;
					}else{
						$pag = "$_GET[pag]";} //Pegando página selecionada na URL
					if($pag >= '1'){
 						$pag = $pag;
					}else{
						$pag = '1';
					}
					$maximo=20; //Quantidade Máxima de posts por página
					$inicio = ($pag * $maximo) - $maximo; //Variável para LIMIT da sql
					$paginas=ceil($contador/$maximo);	//Quantidade de páginas
					
				//	if($pag!=1){
					//echo "<a href='index.php?pag=".($pag-1)."'>< </a>"; 
				//}
				if($contador<=$maximo){
					echo "";
				}
				else{
					for($i=1;$i<=$paginas;$i++){
						if($pag==$i){ 
							echo " <b>".$i."</b> ";
						}else{
							echo " <a href='index.php?f=categoria.php&c=".$categoria."&sc=".$subcategoria."&m=".$marca."&q=".$busca."&pag=".$i."&g=".$grupo."'>".$i."</a> ";
						}
					}
				}
				//if($pag!=$paginas){
					//echo "<a href='index.php?pag=".($pag+1)."'> ></a>";
				//}
			?>
					
					</div>
                <ul class="links">
    				<li>Vizualiza&ccedil;&atilde;o:</li>
        			<li>  
	        		<a href="#" title="tabela" onclick="$('#listadeprodutos').removeClass().addClass('produtos');">
    	        		<img src="img/grade.png" alt="Grade" />Grade
        	    	</a>
        			</li>
        			<li> 
       				  <a href="#" title="lista" onclick="$('#listadeprodutos').removeClass().addClass('produtos_lista');"> 
	            		<img src="img/lista.png" alt="Lista" />Lista
    	        		</a>
        			</li>
			  </ul>            
	            <div style="clear:both"></div>
            </div>
        	<div id="listadeprodutos" class="produtos">
            	<ul>
                <?php
					
					$sql=$sql." LIMIT $inicio, $maximo";
					//echo $sql . " LIMIT $inicio, $maximo";
					$result = mysql_query($sql, $conecta);
					
					while($consulta = mysql_fetch_array($result)) { 
						$parcela=number_format($consulta[preco_consumidor]/12,2);
						echo "<li><img src='/sap_arquivos/imagens/$consulta[foto1]'>
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
            <div class="paginacao">
				<?php
				//if($pag!=1){
					//echo "<a href='index.php?pag=".($pag-1)."'>< </a>"; 
				//}
				if($contador<=$maximo){
					echo "";
				}
				else{
					for($i=1;$i<=$paginas;$i++){
						if($pag==$i){
							echo " <b>".$i."</b> ";
						}else{
							echo " <a href='index.php?f=categoria.php&c=".$categoria."&sc=".$subcategoria."&m=".$marca."&q=".$busca."&pag=".$i."&g=".$grupo."'>".$i."</a> ";
						}
					}
				}
				//if($pag!=$paginas){
					//echo "<a href='index.php?pag=".($pag+1)."'> ></a>";
				//}
			?>
				</div>
                <ul class="links">
    				<li>Vizualiza&ccedil;&atilde;o:</li>
        			<li>  
	        		<a href="#" title="tabela" onclick="$('#listadeprodutos').removeClass().addClass('produtos');">
    	        		<img src="img/grade.png" alt="Grade" />Grade
        	    	</a>
        			</li>
        			<li> 
       				  <a href="#" title="lista" onclick="$('#listadeprodutos').removeClass().addClass('produtos_lista');"> 
	            		<img src="img/lista.png" alt="Lista" />Lista
    	        		</a>
        			</li>
			  </ul>            
            </div>
        </div>
        <div style="clear:both; height:1.5em"></div>
        <div class="destaques">
            	<ul>
                	<li><a href="#"><img src="img/destaque/destaque1.png" width="384" height="239"></a></li>
                  	<li><a href="#"><img src="img/destaque/destaque2.png" width="386" height="238"></a></li>
                  	<li><a href="#"><img src="img/destaque/destaque3.png" width="385" height="238"></a></li>
                </ul>
       </div>
       <div style="clear:both"></div>
    </section>
