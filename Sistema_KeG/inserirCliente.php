<?php
if (getenv("REQUEST_METHOD") == "POST") {
   $CPF = $_POST['CPF'];
   $RG = $_POST['RG'];	 
   $nome = $_POST['nome'];
   $endereco = $_POST['endereco'];
   $telefone1 = $_POST['telefone1'];
   $telefone2 = $_POST['telefone2'];
   $email = $_POST['email'];
   $cnpj = $_POST['cnpj'];

   if ($CPF and $nome and $endereco and $telefone1) {
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("bd_keg",$conexao);
      $query = "INSERT INTO Clientes(cpf, RG, nome, endereco, telefone1, telefone2, email, cnpj) VALUES('$CPF', '$RG', '$nome','$endereco', '$telefone1', '$telefone2', '$email','$cnpj')";
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
   <td>CNPJ: </td>
   <td><input type="text" size="15" name="cnpj" maxlength="45"></td>
</tr>
<tr>
   <td>RG: </td>
   <td><input type="text" size="15" name="RG" maxlength="45"></td>
</tr>
<tr>
   <td>Endere&ccedil;o: </td>
   <td><input type="text" size="15" name="endereco" maxlength="45"></td>
</tr>
<tr>
   <td>Email: </td>
   <td><input type="text" size="15" name="email" maxlength="45"></td>
</tr>
<tr>
   <td>Fone: </td>
   <td><input type="text" size="15" name="telefone1" maxlength="45"></td>
</tr>
<tr>
   <td>Celular: </td>
   <td><input type="text" size="15" name="telefone2" maxlength="45"></td>
</tr>
</table>
<input type="submit" value="Inserir">
</form>
	</div>

</div>



</body>
</html>