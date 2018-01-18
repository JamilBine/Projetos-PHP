<!DOCTYPE html>

<html lang="en">
	<head>
    	<title>Página de Usuário</title>
	    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
	</head>
  	<body>
  	<div class="container">
        <div class="sidebar1">
            <ul class="nav">
              <li><a href="?">Início</a></li>            
              <li><a href="?pagina=cadastro">Cadastrar Usuário</a></li>
              <li><a href="?pagina=visualizar">Visualizar Usuários</a></li>
            </ul>
		</div>
        <div class="content">
        	<?php 
			$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : '';
			switch ($pagina){
				case 'cadastro':
				include ("view/cadastro.php");
				break;
				
				case 'visualizar':
				include ("view/visualizar.php");
				break;
				
				case 'editar':
				include ("funcoes/editar_usuario.php");
				break;
				
				default:
				echo "<h1>Seja Bem-Vindo</h1>
						<p>Essa página contém funções para gerenciamento de usuários.<br>
					  	Por meio dela é possível cadastrar, visualizar e excluir usuários.<br>
						O menu do lado esquerdo apresenta as funções inclusas nesse sistema até o momento.<br><br>
						Obs.: A exclusão de usuários é feita ao visualizar usuários.
						</p>";
				break;	
			}
		?>
        </div>
	</div>    
  </body>
</html>