<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Editar Usu&aacute;rios</title>
<link rel="stylesheet" type="text/css" href="../css/estilo.css">
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
</head>
<?php
$conexao = mysql_connect("localhost","root","");
mysql_select_db("k13",$conexao);

if ((getenv("REQUEST_METHOD") == "POST") && ($_POST['nome'] != '') && ($_POST['cep'] != '')) {
	$id = $_GET['id'];
	$sql = "UPDATE usuario SET ";
	
   	if(!empty($_POST['nome'])){
		$nome = $_POST['nome'];
		$sql .= " nome = '$nome' ";	
	}
	
	if(!empty($_POST['cep'])){
		$cep = $_POST['cep'];
		$sql .= ", cep = '$cep' ";	
	}
	
	if(!empty($_POST['rua'])){
		$rua = $_POST['rua'];
		$sql .= ", rua = '$rua' ";	
	}
	
	if(!empty($_POST['numero'])){
		$numero = $_POST['numero'];
		$sql .= ", numero = '$numero' ";	
	}
	
	if(!empty($_POST['bairro'])){
		$bairro = $_POST['bairro'];
		$sql .= ", bairro = '$bairro' ";	
	}
	
	if(!empty($_POST['cidade'])){
		$cidade = $_POST['cidade'];
		$sql .= ", cidade = '$cidade' ";	
	}
	
	if(!empty($_POST['estado'])){
		$estado = $_POST['estado'];
		$sql .= ", estado = '$estado' ";	
	}
			
	if(!empty($_POST['complemento'])){
		$complemento = $_POST['complemento'];
		$sql.= ", complemento = '$complemento' ";
	}
			
	$sql .= " WHERE id = '$id'";	

	mysql_query($sql, $conexao);
	if($_POST['telefone'] != ''){
		$telefones = $_POST['telefone'];
		$idTel = $_POST['idTelefone'];
		$aux = 0;
		
		if($idTel[$aux] == ''){
			foreach($telefones as $tel){
				$sql2 = "INSERT INTO telefone(id_usuario, numero_telefone) values ('$id', '$tel')";
				mysql_query($sql2, $conexao);
			}
		} else{
			foreach($telefones as $tel){
				var_dump($telefones);
				$sql2 = "update telefone set numero_telefone = $tel where id = '$idTel[$aux]' and id_usuario = '$id'";
				mysql_query($sql2, $conexao);
				$aux++;
			}
		}
		//echo $sql2;
		//die();
	}
		
	header("Location: ../?pagina=visualizar");
} else {
    $err = "Preencha todos os campos!";
}

$id = $_GET['id'];

$query = "SELECT * FROM usuario WHERE id = $id";
$query2 = "SELECT * FROM telefone WHERE id_usuario = $id";

$resultado = mysql_query($query,$conexao) or die(mysql_error());
$resultado2 = mysql_query($query2,$conexao) or die(mysql_error());

while ($linha = mysql_fetch_array($resultado)){
?>
<body>
<div class="container">
    <div class="sidebar1">
        <ul class="nav">
          <li><a href="?">Início</a></li>            
          <li><a href="../?pagina=cadastro">Cadastrar Usuário</a></li>
          <li><a href="../?pagina=visualizar">Visualizar Usuários</a></li>
        </ul>
    </div>
	<div class="content">
        <h1>Editar Usuário</h1>
        <form id="formulario" name="formulario" method="post" accept-charset="utf-8">
              Nome do usu&aacute;rio:
              <input type="text" name="nome" id="nome" value=<?php echo $linha['nome']; ?>><br/><br/>
              CEP:
              <input type="text" name="cep" id="cep" value=<?php echo $linha['cep']; ?>><br/><br/>
              Rua:
              <input type="text" name="rua" id="rua" value=<?php echo $linha['rua']; ?>><br/><br/>
              N&uacute;mero:
              <input type="text" name="numero" id="numero" value=<?php echo $linha['numero']; ?>><br/><br/>	  
              Complemento:
              <input type="text" name="complemento" id="complemento" value=<?php echo $linha['complemento']; ?>><br/><br/>
              Bairro: 
              <input type="text" name="bairro" id="bairro" value=<?php echo $linha['bairro']; ?>><br/><br/>
              Cidade:
              <input type="text" name="cidade" id="cidade" value=<?php echo $linha['cidade']; ?>><br/><br/>
              Estado:
              <input type="text" name="estado" id="estado" value=<?php echo $linha['estado']; ?>><br/><br/>
              <div id="telefones">
              <?php
              $i = 1;
              while ($linha2 = mysql_fetch_array($resultado2)){?>
                Telefone <?php echo $i++;?>:
                <input type="text" name="telefone[]" id="telefone" value="<?php echo $linha2['numero_telefone'];?>">
                <input type="hidden" name="idTelefone[]" id="idTelefone" value=<?php echo $linha2['id']; ?>>
                <br>
              <?php }?>
              <br>
              <!--<input type="button" id="adicionar_campo" title="Máximo de 10 telefones permitidos" value="Adicionar outro telefone">-->
              </div>
              <div class="form-group">
                <br/><br/>
                <input class="editar" value="Editar" type="submit" />
                <input type="hidden" name="acao" id="acao" value="editar">
                <input type="button" value="Voltar" onClick="JavaScript: window.history.back();">
              </div>               
        </form>
        <?php
        }
        ?>
        </div>
    </div>
	<script>
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
                $('#telefones').append('<div style="padding-top:1%;">Telefone '+(x+1)+': <input type="text" name="telefone[]" id="telefone'+x+'">\
                        <a href="#" style="color:red;" class="remove_campo" id="remove' + x +'" title="Remover campo">X</a></div>');
                x++;
            }
        });
    
        $('#formulario').on("click",".remove_campo",function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });		
    </script>
</body>