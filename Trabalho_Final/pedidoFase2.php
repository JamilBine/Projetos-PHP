<?php
if (getenv("REQUEST_METHOD") == "POST") {
   $num_nota_fiscal = isset($_REQUEST['num_nota_fiscal']) ? $_REQUEST['num_nota_fiscal'] : '';
   $codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : '';
   $quantidade = isset($_REQUEST['quantidade']) ? $_REQUEST['quantidade'] : '';   

   if ($num_nota_fiscal and $codigo and $quantidade) {
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("mydb",$conexao);
      $query = "INSERT INTO Pedido_has_Mercadorias VALUES('$num_nota_fiscal','$codigo','$quantidade')";
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


<h1>Fazer Pedido - Fase 2</h1>

<form method="post" action="">
<table border="0">

<tr>
<td>Selecione a Nota Fiscal: </td>
<td>
<select name="num_nota_fiscal">
<option value="">Nota Fiscal</option>
<?php
$conexao = mysql_connect("localhost","root","");
mysql_select_db("mydb",$conexao);
$sql = "SELECT num_nota_fiscal FROM Pedido order by num_nota_fiscal";
$resultado = mysql_query($sql,$conexao) or die('Erro ao selecionar a nota fiscal: ' .mysql_error());
while($linhas = mysql_fetch_array($resultado))
{
?>
    <option value="<?php echo $linhas['num_nota_fiscal'];  ?>">
        <?php echo $linhas['num_nota_fiscal']; ?>
    </option>
<?php
}
?>
</select>
</td>
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
   <td>Quantidade: </td>
   <td><input type="text" size="15" name="quantidade" maxlength="45"></td>
</tr>
</table>
<input type="submit" value="Concluir">
</form>
	</div>

</div>

</body>
</html>