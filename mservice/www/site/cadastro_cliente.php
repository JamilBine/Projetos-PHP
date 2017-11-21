<script type="text/javascript">
function getEndereco() {
	// Se o campo CEP não estiver vazio
	if($.trim($("#cep").val()) != ""){
	/*
	Para conectar no serviço e executar o json, precisamos usar a função
	getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
	dataTypes não possibilitam esta interação entre domínios diferentes
	Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário
	http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
	*/
	$.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
	// o getScript dá um eval no script, então é só ler!
	//Se o resultado for igual a 1
					
	if (resultadoCEP["tipo_logradouro"] != '') {
		if (resultadoCEP["resultado"]) {
		// troca o valor dos elementos
			$("#enderecorua").val(unescape(resultadoCEP["logradouro"]));
			$("#bairro").val(unescape(resultadoCEP["bairro"]));
			$("#tipo_endereco").val(unescape(resultadoCEP["tipo_logradouro"]));
			$("#estado").val(unescape(resultadoCEP["uf"]));
			$("#cidade").val(unescape(resultadoCEP["cidade"]));
			$("#numero").focus();
			}
		}		
	});
	}
}
</script>

<div class="titulo_window" style="padding-bottom: 1%;">Cadastre-se aqui</div>
<form action="/aspnet/salvar_cliente.aspx" method="post" name="form2" target="_top" id="form2">
<div style="height:800px; width:100%; margin-top:-6%">
<p><label style="margin:0 auto;" for="email">E-Mail</label><input name="email" type="text" class="form" id="email" style="width:200px;" maxlength="80" /></p>
	<p>Tipo de Cadastro 
    <select name="tipo" class="form" id="tipo2" onChange="if(this.value=='F'){preenchelista('divtipo','/pf.html')}else{preenchelista('divtipo','/pj.html')}">
      <option value="F" selected="selected">F&iacute;sica</option>
      <option value="J">Jur&iacute;dica</option>
    </select>
  </p>
  <p>Nome completo<input name="nome" type="text" class="form" id="nome" style="width:180px;" maxlength="80" /></p>
  <p>Sexo
    <select name="sexo" class="form" id="sexo" onChange="if(this.value=='F'){preenchelista('divtipo','/pf.html')}else{preenchelista('divtipo','/pj.html')}">
      <option value="masculino" selected="selected">Masculino</option>
      <option value="feminino">Feminino</option>
    </select>
  </p>
  <p>CPF<input name="cpf" type="text" class="form" id="cpf" style="width:200px;" maxlength="20" /></p>
  <p>Data de nascimento<input name="dtnascimento" type="text" class="form" id="dtnascimento" style="width:120px;" maxlength="10" /></p>
  <p>Telefone<input name="fone" type="text" class="form" id="fone" style="width:100px;" maxlength="9" onKeyPress="MascaraTelefone(this);"/></p>
	<p>Celular <input name="celular" type="text" class="form" id="celular" style="width:100px;" maxlength="11" onKeyPress="MascaraTelefone(this);"/>
  </p>
  <p>Senha 
    <input name="senha" type="password" class="form" id="senha" style="width:100px;" maxlength="15" />
  </p>
  <p>Confirme sua senha 
    <input name="confsenha" type="password" class="form" id="confsenha" style="width:100px;" maxlength="15" />
  </p>
<a style="background-color:#ff4e00; text-decoration:none; color:#FFF; border:0; font-size:0.8em; padding-bottom:0.5em; padding-top:0.5em; padding-left:1.5em; padding-right:1.5em; font-weight:bold; margin-left: 27%; width:35%;" href="#continuar">Continuar</a>
ou <a style="color:#ff4e00; text-decoration:none;" href="#">Cancelar</a>
</div>
<div style="height:800px; width:100%; margin-top:-6%;">
<a name="continuar"></a>
<div class="titulo_window" style="padding-bottom: 1%;">Meu Endereço</div>

<div style="margin-top:-7%;">

<p>Cep
  <input name="cep" type="text" class="form" id="cep" style="width:100px;" maxlength="10" onkeypress="MascaraCep(this);" onblur="getEndereco()" />
  </p>
<p>Endereço <input name="enderecorua" type="text" class="form" id="enderecorua" style="width:200px;" maxlength="200" /></p>
<p>Número <input name="numero" type="text" class="form" id="numero" style="width:100px;" maxlength="5"/></p>
<p>Bairro <input name="bairro" type="text" class="form" id="bairro" style="width:200px;" maxlength="50"/></p>
<p>Complemento <input name="complemento" type="text" class="form" id="complemento" style="width:200px;" maxlength="100" /></p>
<p>Cidade <input name="cidade" type="text" class="form" id="cidade" style="width:200px;" maxlength="50" /></p>
<p>Estado <input name="estado" type="text" class="form" id="estado" style="width:40px;" size="3" maxlength="2" /></p>
<p style="margin-left: 15%; margin-top: -3%; float:none;">Gostaria de receber nossas ofertas por e-mail?<br><input style="text-align:center; float:none; margin:0; padding:0;" type="radio" name="ofertas" value="sim"> <span>Sim</span> <input style="margin: 0; float:none; padding-top:1%;" type="radio" name="ofertas" value="nao"> <span>Não</span></p>
<p style="margin-left: 15%; margin-top: -4%; float:none;">Gostaria de receber nossas ofertas por SMS?<br><input style="text-align:center; float:none; margin:0; padding:0;" type="radio" name="ofertas" value="sim"> <span>Sim</span><input style="margin: 0; float:none; padding-top:1%;" type="radio" name="ofertas" value="nao"> <span>Não</span></p>
<p style="width: 100%; margin: 0 auto; margin-top:2%;">
  <input style="margin-left:30%; margin-right:1%; width:23%; padding-left:1.5em; padding-right:1.5em; float:left;" type="submit" name="button" id="button" value="Cadastrar" />
  ou <a style="color:#ff4e00; text-decoration:none;" href="#">Cancelar</a> </p>
</div>
</div>
</form>
<script>preenchelista('divtipo','/pf.html')</script>