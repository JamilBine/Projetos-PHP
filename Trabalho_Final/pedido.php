<?php

function converter_data($strData) {
	if ( preg_match("#/#",$strData) == 1 ) {
		$strDataFinal = "'";
		$strDataFinal .= implode('-', array_reverse(explode('/',$strData)));
		$strDataFinal .= "'";
	}
	return $strDataFinal;
}

if (getenv("REQUEST_METHOD") == "POST") {
   $Clientes_CPF =  $_POST['cpf'];
   $preco_total = $_POST['preco_total'];
   $data = converter_data($_POST['data']);
   

   if ($Clientes_CPF and $preco_total and $data) {
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("mydb",$conexao);
      $query = "INSERT INTO Pedido(Clientes_CPF, preco_total, data) VALUES('$Clientes_CPF','$preco_total', $data)";
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

<h1>Fazer Pedido</h1>

<form method="post" action="">
<table border="0">
<tr>
<td>Selecione o Cliente: </td>
<td>
<select name="cpf">
<option value="">Cliente</option>
<?php
$conexao = mysql_connect("localhost","root","");
mysql_select_db("mydb",$conexao);
$sql = "SELECT CPF, nome FROM Clientes order by CPF";
$resultado = mysql_query($sql,$conexao) or die('Erro ao selecionar o cliente: ' .mysql_error());
while($linhas = mysql_fetch_array($resultado))
{
?>
    <option value="<?php echo $linhas['CPF'];  ?>">
        <?php echo $linhas['nome']; ?>
    </option>
<?php
}
?>
</select>
</td>
</tr>

<tr>
   <td>Pre&ccedil;o Total: </td>
   <td><input type="text" size="15" name="preco_total" maxlength="45"></td>
</tr>
<script type="text/javascript">
                        function Formatadata(Campo, teclapres)
                        {
                                var tecla = teclapres.keyCode;
                                var vr = new String(Campo.value);
                                vr = vr.replace("/", "");
                                vr = vr.replace("/", "");
                                vr = vr.replace("/", "");
                                tam = vr.length + 1;
                                if (tecla != 8 && tecla != 8)
                                {
                                        if (tam > 0 && tam < 2)
                                                Campo.value = vr.substr(0, 2) ;
                                        if (tam > 2 && tam < 4)
                                                Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2);
                                        if (tam > 4 && tam < 7)
                                                Campo.value = vr.substr(0, 2) + '/' + vr.substr(2, 2) + '/' + vr.substr(4, 7);
                                }
                        }
                </script> 
<tr>
   <td nowrap>Data:</td>
   <td><input type="text" name="data" size="15" value="" maxlength="10" onkeyup="Formatadata(this,event)"></td>
</table>
<input type="submit" value="Inserir">
</form>
	</div>

</div>



</body>
</html>