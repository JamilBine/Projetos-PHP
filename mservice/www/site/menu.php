<div class="menu_secundaria">
        	    <label for="show-menu" class="show-menu"><img src="img/menu_responsivo.png"></label>
				<input type="checkbox" id="show-menu" role="button">
                <div class="container">
            	<ul id="menu">
                <?php
					$sql = "SELECT * FROM  `grupo` WHERE codigo_grupo IN (SELECT codigo_grupo FROM Categorias) ORDER BY FIELD (codigo_grupo, 107, 101, 108, 102, 109, 110)"; 
					$result = mysql_query($sql, $conecta); 
					while($consulta = mysql_fetch_array($result)) { 
						$sql2 = "SELECT * FROM  Categorias WHERE codigo_grupo=".$consulta['codigo_grupo']; 
						$result2 = mysql_query($sql2, $conecta); 
			   			echo "<li><a href='index.php?f=categoria.php&g=$consulta[codigo_grupo]'>$consulta[descricao_grupo]</a>
								<ul class='hidden'>";
						while($consulta2 = mysql_fetch_array($result2)) { 		
								echo "<li><a href='index.php?f=categoria.php&c=$consulta2[nome_categoria]'>$consulta2[nome_categoria]</a></li>";
						}
						echo "</ul>
							</li>"; 
					} 
					mysql_free_result($result); 
					mysql_free_result($result2); 
				?>
                </ul>
                </div>
                <div style="clear:both"></div>
       		 </div>