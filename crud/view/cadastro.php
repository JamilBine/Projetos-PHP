<html lang="en">
<head>
<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script>
// Máscara para Telefone
	function formatar(mascara, documento){
		var i = documento.value.length;
		var saida = mascara.substring(0,1);
		var texto = mascara.substring(i);
	  
		if (texto.substring(0,1) != saida){
			documento.value += texto.substring(0,1);
		}
	}
</script>
</head>
<?php
if ((getenv("REQUEST_METHOD") == "POST") && ($_POST['nome'] != '') && ($_POST['cep'] != '')) {
	$conn = new \PDO("mysql:host=localhost;dbname=k13","root","");
			
	$sql = "insert into usuario (nome, cep, rua, bairro, cidade, estado ";
	//echo '<pre>';

	//print_r($_POST);
	//die();
	if(!empty($_POST['numero'])){
		$numero = $_POST['numero'];
		$sql .= ", numero ";	
	}
	
	if(!empty($_POST['complemento'])){
		$sql.= ", complemento ";
	}
	
	$nome = $_POST['nome'];
	$cep = $_POST['cep'];
	$rua = $_POST['rua'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$telefones = $_POST['telefone'];
	
	$sql .= ") values ('$nome', '$cep', '$rua', '$bairro', '$cidade', '$estado' ";
	
	if($_POST['numero'] != ''){
		$numero = $_POST['numero'];
		$sql .= ", $numero ";	
	}
	
	if(!empty($_POST['complemento'])){
		$complemento = $_POST['complemento'];
		$sql.= ", '$complemento' ";
	}

	$sql .= ");";
	//echo '<pre>';
	//echo $sql;
	//die();		
	$ret = $conn->exec($sql);
	
	$query = "select * from usuario where nome = '$nome'";
			
	$stmt = $conn->query($query);
	$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$idUsuario = $list[0]['id'];
	
	foreach($telefones as $tel){
		$sql2 = "INSERT INTO telefone(id_usuario, numero_telefone) VALUES ( '$idUsuario', $tel)";
		$ret2 = $conn->exec($sql2);
	}
} else{
	if(isset($_POST["Cadastrar"])){
		echo '<script type="text/javascript" charset="utf-8">';
		echo 'alert("Erro! Preenchimento de Nome e CEP obrigatório!");';
		echo 'location.href="./?pagina=cadastro";';
		echo '</script>';
	}
}
?>
<body>
    <h1>Cadastro de usu&aacute;rio</h1>
    <form id="formulario" name="formulario" method="post" accept-charset="utf-8">
          Nome do usuário: *
          <input type="text" name="nome" id="nome"><br/><br/>
          CEP: *
          <input type="text" name="cep" id="cep"><br/><br/>
          Rua:
          <input type="text" name="rua" id="rua"><br/><br/>
          Número:
          <input type="text" name="numero" id="numero"><br/><br/>	  
          Complemento:
          <input type="text" name="complemento" id="complemento"><br/><br/>
          Bairro: 
          <input type="text" name="bairro" id="bairro"><br/><br/>
          Cidade:
          <input type="text" name="cidade" id="cidade"><br/><br/>
          Estado:
          <input type="text" name="estado" id="estado"><br/><br/>
          <div id="telefones">
          Telefone:
          <input type="text" name="telefone[]" id="telefone" maxlength="13" OnKeyPress="formatar('##-####-#####', this)">
          <input type="button" id="adicionar_campo" title="Máximo de 10 telefones permitidos" value="Adicionar outro telefone">
          </div>
          <div class="form-group">
            <br/><br/>
            <input class="envia" name="Cadastrar" id="Cadastrar" value="Cadastrar" type="submit" />
		  	<input type="hidden" name="acao" id="acao" value="cadastrar">
            <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">
          </div>
  		  <br>       
          <p>Campos com * são obrigatórios.</p>
    </form>
	<script type="text/javascript">	
	$(document).ready(function(e) {

		// Funções para a inserção de dados automáticos a partir do CEP
		function limpa_formulário_cep() {
			// Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#estado").val("");
		}
		
		$("#cep").blur(function() {
			//Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

        	//Verifica se campo cep possui valor informado.
			if (cep != "") {
		        //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

					//Preenche os campos com "..." enquanto consulta webservice.
					$("#rua").val("...");
					$("#bairro").val("...");
					$("#cidade").val("...");
					$("#estado").val("...");
	
					//Consulta o webservice viacep.com.br/
					$.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
						if (!("erro" in dados)) {
							//Atualiza os campos com os valores da consulta.
							$("#rua").val(dados.logradouro);
							$("#bairro").val(dados.bairro);
							$("#cidade").val(dados.localidade);
							$("#estado").val(dados.uf);
						} else {
							//CEP pesquisado não foi encontrado.
							limpa_formulário_cep();
							alert("CEP não encontrado.");
						}
					});
				} else {
					//cep é inválido.
					limpa_formulário_cep();
					alert("Formato de CEP inválido.");
				}
			} else {
				//cep sem valor, limpa formulário.
				limpa_formulário_cep();
			}
		});
			
		// Funções para a adição e remoção de telefones
		var campos_max = 10;
		var x = 1;
		$('#adicionar_campo').click (function(e) {
			e.preventDefault();     //prevenir novos clicks
			if (x < campos_max) {
				$('#telefones').append('<div style="padding-top:1%;">Telefone '+(x+1)+': <input type="text" name="telefone[]" id="telefone'+x+'" OnKeyPress="formatar("##-####-####", this)">\
						<a href="#" style="color:red;" class="remove_campo" id="remove' + x +'" title="Remover campo">X</a></div>');
				x++;
			}
		});

		$('#formulario').on("click",".remove_campo",function(e) {
			e.preventDefault();
			$(this).parent('div').remove();
			x--;
		});			
    });
		
    </script>
</body>
</html>