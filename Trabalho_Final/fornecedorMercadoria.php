<?php
if (getenv("REQUEST_METHOD") == "POST") {
   $codigo = $_POST['codigo'];
   $registro = $_POST['registro'];   

   if ($codigo and $registro) {
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("mydb",$conexao);
      $query = "INSERT INTO Mercadorias_has_fornecedores VALUES('$codigo','$registro')";
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


<h1>Fornecedor - Mercadoria</h1>


<form method="post" action="index.php">
<table border="0">
<tr>
<td>Relacionar o fornecedor a sua Mercadoria.</td>
</tr>
<tr>
<td>Selecione o C&oacute;digo da Mercadoria: </td>
<td>
<select name="codigo">
<option value="">C&oacute;digo</option>
<?php
$conexao = mysql_connect("localhost","root","");
mysql_select_db("mydb",$conexao);
$sql = "SELECT codigo FROM Mercadorias order by codigo";
$resultado = mysql_query($sql,$conexao) or die('Erro ao selecionar o codigo da mercadoria: ' .mysql_error());
while($linhas = mysql_fetch_array($resultado))
{
?>
    <option value="<?php echo $linhas['codigo'];  ?>">
        <?php echo $linhas['codigo']; ?>
    </option>
<?php
}
?>
</select>
</td>
</tr>

<tr>
<td>Selecione o Fornecedor: </td>
<td>
<select name="registro">
<option value="">Fornecedor</option>
<?php
$conexao = mysql_connect("localhost","root","");
mysql_select_db("mydb",$conexao);
$sql = "SELECT nome, registro FROM Fornecedores order by registro";
$resultado = mysql_query($sql,$conexao) or die('Erro ao selecionar a nota fiscal: ' .mysql_error());
while($linhas = mysql_fetch_array($resultado))
{
?>
    <option value="<?php echo $linhas['registro'];  ?>">
        <?php echo $linhas['nome']; ?>
    </option>
<?php
}
?>
</select>
</td>
</tr>

</table>
<input type="submit" value="Concluir">
</form>

	</div>

</div>

</body>
</html>