<?php

function converter_data($strData) {
	if ( preg_match("#/#",$strData) == 1 ) {
		$strDataFinal = "'";
		$strDataFinal .= implode('-', array_reverse(explode('/',$strData)));
		$strDataFinal .= "'";
	}
	return $strDataFinal;
}

function converter_data2($strData) {
	if ( preg_match("#/#",$strData) == 1 ) {
		$strDataFinal = "'";
		$strDataFinal .= implode('-', array_reverse(explode('/',$strData)));
		$strDataFinal .= "'";
	}
	return $strDataFinal;
}

if (getenv("REQUEST_METHOD") == "POST") {
   $Clientes_cpf =  $_POST['cpf'];
   $idServicos =  $_POST['idServicos'];
   $precoTotal = $_POST['precoTotal'];
   $dataEntrada = converter_data($_POST['dataEntrada']);
   $dataSaida = converter_data2($_POST['dataSaida']);
   $equipamento = $_POST['equipamento'];
   $descricao = $_POST['descricao'];
   $voltagem = $_POST['voltagem'];
   
   if ($Clientes_cpf and $precoTotal and $dataEntrada) {
      $conexao = mysql_connect("localhost","root","");
      mysql_select_db("bd_keg",$conexao);
      $query = "INSERT INTO Pedido(Clientes_cpf, Servicos_idServicos, precoTotal, dataEntrada, equipamento, descricao, voltagem, dataSaida) VALUES('$Clientes_cpf', '$idServicos', $precoTotal, $dataEntrada, '$equipamento', '$descricao', '$voltagem', $dataSaida)";
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
mysql_select_db("bd_keg",$conexao);
$sql = "SELECT cpf, nome FROM Clientes order by cpf";
$resultado = mysql_query($sql,$conexao) or die('Erro ao selecionar o cliente: ' .mysql_error());
while($linhas = mysql_fetch_array($resultado))
{
?>
    <option value="<?php echo $linhas['cpf'];  ?>">
        <?php echo $linhas['nome']; ?>
    </option>

<?php
}
?>
</select>
</td>
</tr>

<tr>
<td>Selecione o Servi&ccedil;o: </td>
<td>
<select name="servico">
<option value="">Servi&ccedil;o</option>
<?php
$conexao = mysql_connect("localhost","root","");
mysql_select_db("bd_keg",$conexao);
$sql2 = "SELECT idServicos, descricao FROM Servicos order by idServicos";
$row = mysql_query($sql2,$conexao) or die('Erro ao selecionar o servico: ' .mysql_error());
while($linhas = mysql_fetch_array($row))
{
?>
    <option value="<?php echo $linhas['idServicos'];  ?>">
        <?php echo $linhas['descricao']; ?>
    </option>

<?php
}
?>
</select>
</td>
</tr>

<tr>
   <td>Pre&ccedil;o Total: </td>
   <td><input type="text" size="15" name="precoTotal" maxlength="45"></td>
</tr>
<tr>
   <td>Equipamento: </td>
   <td><input type="text" size="15" name="equipamento" maxlength="45"></td>
</tr>
<tr>
   <td>Descri&ccedil;ao: </td>
   <td><input type="text" size="15" name="descricao" maxlength="45"></td>
</tr>
<tr>
   <td>Voltagem: </td>
   <td><input type="checkbox" name="voltagem" value="110v"> 110v</td>
   <td><input type="checkbox" name="voltagem" value="220v"> 220v</td>
   <td><input type="checkbox" name="voltagem" value="bivolt"> Bivolt</td>
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

<script type="text/javascript">
                        function Formatadata2(Campo, teclapres)
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
   <td nowrap>Data Entrada:</td>
   <td><input type="text" name="dataEntrada" size="15" value="" maxlength="10" onkeyup="Formatadata(this,event)"></td>
<tr>
   <td nowrap>Data Saida:</td>
   <td><input type="text" name="dataSaida" size="15" value="" maxlength="10" onkeyup="Formatadata2(this,event)"></td>
</table>
<input type="submit" value="Inserir">
</form>
	</div>

</div>



</body>
</html>