<?php
if (getenv("REQUEST_METHOD") == "POST") {
   $nome = $_POST['nome'];
   $endereco = $_POST['endereco'];
   $telefone = $_POST['telefone'];
   $cnpj = $_POST['cnpj'];
   $cidade = $_POST['cidade'];
   $modo_transporte = $_POST['modo_transporte'];
   $pais = $_POST['pais'];
   $moeda = $_POST['moeda'];
   $tipo = $_POST['tipo'];

   if ($nome and $endereco and $telefone and $cnpj) {
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("mydb",$conexao);
      $query = "INSERT INTO Fornecedores(nome, endereco, telefone, cnpj, cidade, modo_transporte, pais, moeda, tipo) VALUES('$nome', '$endereco','$telefone', '$cnpj','$cidade','$modo_transporte','$pais','$moeda','$tipo')";
      mysql_query($query,$conexao);
   } else {
      $err = "Preencha todos os campos!";
   }
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include "css.php";
?>
<body>

<div id="geral_conteudo">
	
<?php include "menu.php";?>
    
    <div id="box_right">
    <h2>Trabalho Final - BD II</h2>
    <hr />
    <p>

<h1>Insira aqui o Fornecedor</h1>

<form method="post" action="">
<table border="0"
<tr>
   <td>Nome: </td>
   <td><input type="text" size="15" name="nome" maxlength="45"></td>
</tr>
<tr>
   <td>Endere&ccedil;o: </td>
   <td><input type="text" size="15" name="endereco" maxlength="45"></td>
</tr>
<tr>
   <td>Telefone: </td>
   <td><input type="text" size="15" name="telefone" maxlength="45"></td>
</tr>
<tr>
   <td>CNPJ: </td>
   <td><input type="text" size="15" name="cnpj" maxlength="45"></td>
</tr>
<tr>
   <td>Cidade: </td>
   <td><input type="text" size="15" name="cidade" maxlength="45"></td>
</tr>
<tr>
   <td>Modo de Trasnporte: </td>
   <td><input type="text" size="15" name="modo_transporte" maxlength="45"></td>
</tr>
<tr>
   <td>Pa&iacute;s: </td>
   <td><input type="text" size="15" name="pais" maxlength="45"></td>
</tr>
<tr>
   <td>Moeda: </td>
   <td><input type="text" size="15" name="moeda" maxlength="45"></td>
</tr>
<tr>
   <td>Tipo de Mercadoria: </td>
   <td><input type="checkbox" name="tipo" value="I"> Internacional</td>
   <br>
   <td><input type="checkbox" name="tipo" value="N"> Nacional</td>
</tr>
</table>
<input type="submit" value="Inserir">
</form>

	</div>

</div>



</body>
</html>