    <section>
    	<div class="container">

<div class="menu_principal">
            	<ul>
                	<li><div>Departamentos</div></li>
                    <?php
					$sql = "SELECT * FROM  `grupo` WHERE codigo_grupo IN (SELECT codigo_grupo FROM Categorias) ORDER BY FIELD (codigo_grupo, 107, 101, 108, 102, 109, 110)"; 
					$result = mysql_query($sql, $conecta); 
					while($consulta = mysql_fetch_array($result)) { 
			   			echo "<li><a href='index.php?f=categoria.php&g=$consulta[codigo_grupo]'>$consulta[descricao_grupo]</a>
								<ul class='hidden'>";
						$sql2 = "SELECT * FROM  Categorias WHERE codigo_grupo=".$consulta['codigo_grupo']; 
						$result2 = mysql_query($sql2, $conecta); 
						while($consulta2 = mysql_fetch_array($result2)) { 		
								echo "<li><a href='index.php?f=categoria.php&c=$consulta2[nome_categoria]'>$consulta2[nome_categoria]</a></li>";
						}		
						echo "</ul></li>"; 
					} 
					mysql_free_result($result); 
					mysql_free_result($result2); 
					?>
                </ul>
        	</div>
        </div>
    	<div class="banner">
        	<div id="nav"></div>
           	<div class="slideshow"> 
            	<a href="#"><img src="banners/1.jpg"></a>
                <a href="#"><img src="banners/2.png"></a>
                <a href="#"><img src="banners/3.png"></a>
			</div>
  		</div>
    </section>
    <section>
    	<div class="container">
        	<div class="produtos">
            	<ul>
                <?php
					$sql = "SELECT * FROM Produtos where libera_consumidor='Y' and destaque_consumidor='Y' and (semestoque_consumidor='N' or disponivel_entrega>0) ORDER BY rand() limit 8;"; 
					$result = mysql_query($sql, $conecta); 
					while($consulta = mysql_fetch_array($result)) { 
						$parcela=number_format($consulta[preco_consumidor]/12,2);
						echo "<li><img src='/fotos/100x150/$consulta[foto1]'>
                        	<div class='descricao_produto'>
                        	<a class='titulo_produto' href='index.php?id=$consulta[codigo_produto]'>$consulta[nome_produto]</a>
                        	<span class='valor_produto'>Por R$ $consulta[preco_consumidor]</span>
                        	<span class='parcelas_produto'>12x de R$ " . $parcela . " <br />sem juros</span>
                    		<a href='index.php?id=$consulta[codigo_produto]' class='bt_comprar_home'>comprar</a>
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