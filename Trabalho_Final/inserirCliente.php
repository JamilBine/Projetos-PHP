<?php
if (getenv("REQUEST_METHOD") == "POST") {
   $CPF = $_POST['CPF'];
   $RG = $_POST['RG'];	 
   $nome = $_POST['nome'];
   $endereco = $_POST['endereco'];

   if ($CPF and $RG and $nome and $endereco) {
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("mydb",$conexao);
      $query = "INSERT INTO clientes VALUES('$CPF', '$RG', '$nome','$endereco')";
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
    <h2>Trabalho Final - BD II</h2>
    <hr />
    <p>

<h1>Insira aqui o Cliente</h1>

<form method="post" action="">
<table border="0"
<tr>
   <td>Nome: </td>
   <td><input type="text" size="15" name="nome" maxlength="45"></td>
</tr>
<tr>
   <td>CPF: </td>
   <td><input type="text" size="15" name="CPF" maxlength="45"></td>
</tr>
<tr>
   <td>RG: </td>
   <td><input type="text" size="15" name="RG" maxlength="45"></td>
</tr>
<tr>
   <td>Endere&ccedil;o: </td>
   <td><input type="text" size="15" name="endereco" maxlength="45"></td>
</tr>
</table>
<input type="submit" value="Inserir">
</form>
	</div>

</div>



</body>
</html>