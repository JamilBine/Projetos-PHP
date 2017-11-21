
<section class="fechar_pedido container">
<div class="topo_pagamento"></div>
<form id="frmPagamento" name="frmPagamento" method="post" action="fechar_pedido.php">
  
  <div style="width:64%; float:left; margin-left:2%; border:1px solid #818181; border-radius:5px; paddin-bottom:2%; padding-left:0.5%; padding-right:0.5%;">
    <h3>Forma de Pagamento</h3>
    <p>
      <input type="radio" name="forma_pagamento" id="radio2" value="1" onchange="if (this.checked) {document.getElementById('forma_cartao').style.display='block'}" />
      <label for="radio2"><strong>Cart&atilde;o de Cr&eacute;dito</strong></label>
(R$ 11,90)</p>
    <div id="forma_cartao" style="display:none;">
    <div>
      <label for="nome_titular">Nome impresso no cart&atilde;o</label>
      <br />
      <input style="font-size:1.2em;" type="text" name="nome_titular" id="nome_titular" required="required" />
  	</div>
    <div style="margin-bottom:2%;">
    <img src="./img/cartoes.png" />
    </div>
    <div>
      <label for="nome_titular">N&uacute;mero do cart&atilde;o</label>
      <br />
      <input style="font-size:1.2em;" type="text" name="numero_cartao" id="numero_cartao" required="required" />
  	</div>
    <div>
    <div style="float:left;">
      <label for="validade">Data de validade</label><br />
      <input style="font-size:1.2em; width: 56px;" maxlength="2" type="text" name="mes_cartao" id="mes_cartao" placeholder="M&ecirc;s" required="required" /> / <input style="font-size:1.2em; width: 56px;" type="text" name="ano_cartao" id="ano_cartao" maxlength="4" placeholder="Ano" required="required" />
    </div>
    <div style="float:right; margin-right:10%;">
      <label for="validade">C&oacute;digo de seguran&ccedil;a</label><br />
      <input style="font-size:1.2em; width: 120px; margin-top:-52px;" maxlength="6" type="text" name="codigo_seguranca" id="codigo_seguranca" required="required" /><img width="64"; height= "37"; src="./img/cartao_seg.png"/>
    </div>
    </div>
  <div style="clear:both"></div>
     <div>
      <label for="nome_titular">N&uacute;mero de parcelas *</label>
      <br />
      <div style="float:left; width:50%">
      <select name="numero_parcelas" id="numero_parcelas">
        <option value="1" selected="selected">1x de R$ 558,00</option>
        <option value="2">2x de R$ 222,00</option>
        <option value="3">3x de R$ 111,00</option>
      </select>
      </div>
    </div>
    <div style="clear:both"></div>
    </div>
    <p>
      <input type="radio" name="forma_pagamento" id="radio3" value="2" onchange="if (this.checked) {document.getElementById('forma_cartao').style.display='none'}"/>
      <label for="radio3"><strong>Boleto Banc&aacute;rio</strong></label>
    (R$ 11,90)</p>
  </div>
  <div style="width:32%; float:right">
    <h3>Resumo do Pedido</h3>
    <ul>
    <?php
    	$ip = $_SERVER["REMOTE_ADDR"];
		$sql = "SELECT c.*, nome_produto,  preco_consumidor-(preco_consumidor*(desconto_consumidor/100)) as total, disponivel_entrega, foto1 FROM mservice.carrinho_compras as c inner join Produtos as p on c.codigo_produto=p.codigo_produto where sessao_cliente='".$ip."'"; 
		$result = mysql_query($sql, $conecta); 	
            while($consulta = mysql_fetch_array($result)) { 
				$total=$consulta[total]*$consulta[quantidade];
   				echo "<li><img src='/sap_arquivos/imagens/$consulta[foto1]' style='width:25%; height:auto; float:left'></a>
                    	<div><p>$consulta[nome_produto]</p>
                		<b>Total: R$ $total</div></li>";
			} 
			mysql_free_result($result);
		?> 
      </ul>
    <p>
      <input type="checkbox" name="checkbox" id="checkbox" />
      <strong>      QUERO RECEBER OFETAS POR E-MAIL</strong> </p>
    <p>
      <input style="height:40px; border-radius:5px;" type="submit" name="button" id="button" value="Finalizar Compra" onclick="document.frmPagamento.submit();" />
    </p>
  </div>
</form>
<div style="clear:both; height:20%"></div>
</section>

