<?php 
// session_start inicia a sessão
session_start();

// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];

// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.
$con = mysql_connect("localhost", "root", "") or die ("Sem conexão com o servidor");
$select = mysql_select_db("trabalhoihc") or die("Sem acesso ao DB, Entre em contato com o Administrador!");

// A vriavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
$result = mysql_query("SELECT * FROM `usuario` WHERE `nome` = '$login' AND `senha`= '$senha'");

/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para a pagina site.php ou retornara  para a pagina do formulário inicial para que se possa tentar novamente realizar o login */
if(mysql_num_rows ($result) > 0 )
{
$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;
header('location:index.php');
}
else{
	unset ($_SESSION['login']);
	unset ($_SESSION['senha']);
	header('location:index.php');
	
	}

?>
