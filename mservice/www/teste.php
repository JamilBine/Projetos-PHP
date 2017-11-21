<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>teste insert</title>
</head>
 
<body>
<?php 
$nome="teste 2 cadastro php";
$email="email@cadastro.php";
include("abrir_conexao.php");
$query = "INSERT INTO `cadastro_site` ( `nome` , `email` ) VALUES ('$nome', '$email')";
mysql_query($query,$conecta);
 
echo "Seu cadastro foi realizado com sucesso!<br>Agradecemos a atenção.";
?> 
</body>
</html>