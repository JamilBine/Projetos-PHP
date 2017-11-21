<?php
if (getenv("REQUEST_METHOD") == "POST") {
   $nome = $_POST['nome'];
   $quantidade = $_POST['quantidade'];

   if ($nome and $quantidade) {
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("bd_keg",$conexao);
      $query = "INSERT INTO Estoque(nome, quantidade) VALUES('$nome', $quantidade)";
      mysql_query($query,$conexao);
   } else {
      $err = "Preencha todos os campos!";
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <h2>K & G Informatica</h2>
    <hr />
    <p>

<h1>Insira aqui a Mercadoria no estoque</h1>

<form method="post" action="">
<table border="0"
<tr>
   <td>Nome: </td>
   <td><input type="text" size="15" name="nome" maxlength="45"></td>
</tr>
<tr>
   <td>Quantidade: </td>
   <td><input type="text" size="15" name="quantidade" maxlength="45"></td>
</tr>

</table>
<input type="submit" value="Inserir">
</form>

	</div>

</div>



</body>
</html>