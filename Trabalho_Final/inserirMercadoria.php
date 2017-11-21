<?php
if (getenv("REQUEST_METHOD") == "POST") {
   $codigo = $_POST['codigo'];
   $descricao = $_POST['descricao'];	 
   $preco = $_POST['preco'];
   $quantidade_estoque = $_POST['quantidade_estoque'];

   if ($codigo and $descricao and $preco and $quantidade_estoque) {
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("mydb",$conexao);
      $query = "INSERT INTO Mercadorias VALUES($codigo,'$descricao', '$preco','$quantidade_estoque')";
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

<h1>Insira aqui a Mercadoria</h1>

<form method="post" action="">
<table border="0"
<tr>
   <td>C&oacute;digo: </td>
   <td><input type="text" size="15" name="codigo" maxlength="45"></td>
</tr>
<tr>
   <td>Descri&ccedil;&atilde;o: </td>
   <td><input type="text" size="15" name="descricao" maxlength="45"></td>
</tr>
<tr>
   <td>Pre&ccedil;o: </td>
   <td><input type="text" size="15" name="preco" maxlength="45"></td>
</tr>
<tr>
   <td>Quantidade: </td>
   <td><input type="text" size="15" name="quantidade_estoque" maxlength="45"></td>
</tr>
</table>
<input type="submit" value="Inserir">
</form>

	</div>

</div>



</body>
</html>