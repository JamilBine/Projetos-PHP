
<section class="fechar_pedido container">
<h1>Fechar Pedido </h1>
<form id="form1" name="form1" method="post" action="">
  <div style="width:32%; float:left">
  <h3>Informa&ccedil;&otilde;es Pessoais</h3>
  <div>
      <label for="nome_titular">E-Mail *</label>
      <br />
      <input type="text" name="email" id="email" required="required" />
  </div>
  <div>
    <div style="float:left; width:50%"><label for="senha">Senha</label>
    <br />
    <input type="password" name="senha" id="senha" required="required" />
    </div>
    <div style="float:right; width:48%">
    <label for="confirmar">Confirmar</label>
    <br />
    <input type="password" name="confirmar" id="confirmar" required="required" />
    </div>
</div>
  <div>
    <label for="cpf">Cpf *<br />
    </label>
    <input type="text" name="cpf" id="cpf"  required="required" />
  </div>
  <div>
    <div style="float:left; width:50%">
    <label for="data_nascimento">Data Nascimento</label>
    <br />
    <input type="date" name="data_nascimento" id="data_nascimento" />
    </div>
    <div style="float:right; width:48%">
    <label for="sexo">Sexo</label>
    <br />
    <select name="sexo" id="sexo">
      <option value="F">Fem</option>
      <option value="M">Masc</option>
      <option value="#">Selecione</option>
    </select>
    </div>
    </div>
<div style="clear:both"></div>
  <h3>Dados de Cobran&ccedil;a</h3>
  <div>
  	<div style="float:left; width:40%">
    <label for="nome">Nome</label>
    <br />
    <input name="nome" type="text" id="nome" maxlength="50" />
    </div>
    <div style="float:right; width:58%">
    <label for="sobrenome">Sobrenome</label>
    <br />
    <input name="sobrenome" type="text" id="sobrenome" maxlength="100" />
    </div>
  </div>
  <div style="clear:both"></div>
  <div>
  		<div style="float:left; width:50%">
	  	Telefone 1 
    	  <br />
    	  <input name="fone1" type="text" id="fone1" maxlength="20" />
    	</div>
  		<div style="float:right; width:48%">
    	Telefone 2<br />
    	<input name="fone2" type="text" id="fone2" maxlength="20" />
    	</div>
  </div>
  <div style="clear:both; width:50%"><label>Cep</label>
    <input name="cep" type="text" id="cep" maxlength="12" />
  </div>
  <div><label>Endere&ccedil;o</label>
    <br />
    <input type="text" name="endereco" id="endereco" />
  </div>
  <div>
  	<div style="float:left; width:30%">
    	<label>N&uacute;mero</label>
	    <br />
    	<input name="numero" type="text" id="numero" maxlength="15" />
	  </div>
  		<div style="float:right; width:50%">
	  <label>Complemento</label>
    	<br />
	    <input name="complemento" type="text" id="complemento" maxlength="50" />
        </div>
  </div>
  <div style="clear:both"></div>
  <div>
  	<div style="float:left; width:60%">
    	<label>Cidade</label>
	    <br />
    	<input name="cidade" type="text" id="cidade" maxlength="50" />
	  </div>
  		<div style="float:right; width:30%">
	  <label>Estado</label>
    	<br />
	    <input name="estado" type="text" id="estado" maxlength="2" />
        </div>
  </div>
  <div style="clear:both"></div>
  </div>
  <div style="width:32%; float:left; margin-left:2%">
    <h3>Forma de Envio </h3>
    <p>
      <input type="radio" name="radio" id="radio" value="radio" />
      <label for="forma_pagamento"><strong>Padr&atilde;o</strong></label>
      (R$ 11,90)<br />
      7 dias ap&oacute;s a confirma&ccedil;&atilde;o do pagamento
    </p>
    <p>
      <input type="radio" name="radio" id="radio4" value="radio" />
      <label for="radio4"><strong>Sedex</strong></label>
(R$ 11,90)<br />
7 dias ap&oacute;s a confirma&ccedil;&atilde;o do pagamento </p>
    <div style="clear:both; height:3em"></div>
    <h3>Forma de Pagamento</h3>
    <p>
      <input type="radio" name="forma_pagamento" id="radio2" value="1" onchange="if (this.checked) {document.getElementById('forma_cartao').style.display='block'}" />
      <label for="radio2"><strong>Cart&atilde;o de Cr&eacute;dito</strong></label>
(R$ 11,90)</p>
    <div id="forma_cartao" style="display:none">
    <div>
      <label for="nome_titular">Nome do Titular *</label>
      <br />
      <input type="text" name="nome_titular" id="nome_titular" required="required" />
  	</div>
    <div>
      <label for="nome_titular">N&uacute;mero do Cart&atilde;o *</label>
      <br />
      <input type="text" name="numero_cartao" id="numero_cartao" required="required" />
  	</div>
    <div>
  	<div style="float:left; width:50%">
    	<label for="select">m&ecirc;s</label><br />  	
    	<select name="select" id="select">
    	  <option value="01">01</option>
    	  <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option selected="selected">Mes</option>
  	    </select>
	  </div>
  		<div style="float:right; width:48%">
	 <label for="select">Ano</label>
    	<br />
  		<span style="float:left; width:50%">
  		<select name="ano" id="ano">
  		  <option value="2016">2016</option>
  		  <option value="2017">2017</option>
  		  <option value="2018">2018</option>
  		  <option value="2019">2019</option>
  		  <option value="2020">2020</option>
  		  <option selected="selected">Ano</option>
		  </select>
  		</span></div>
  </div>
  <div style="clear:both"></div>
    <div>
      <label for="nome_titular">CVV *</label>
      (C&oacute;digo de Seguran&ccedil;a do Cart&atilde;o)<br />
      <input type="text" name="cvv" id="cvv" required="required" />
  	</div>
     <div>
      <label for="nome_titular">n&uacute;mero de parcelas *</label>
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
    <p>
      <input type="checkbox" name="checkbox" id="checkbox" />
      <strong>      QUERO RECEBER OFETAS POR E-MAIL</strong> </p>
    <p>
      <input type="submit" name="button" id="button" value="Finalizar Pedido" />
    </p>
  </div>
</form>
<div style="clear:both; height:20%"></div>
</section>

