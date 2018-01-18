<!DOCTYPE html>

<html lang="en">
	<head>
    	<title>P�gina de Usu�rio</title>
	    <link rel="stylesheet" type="text/css" href="./css/estilo.css">
	</head>
  	<body>
  	<div class="container">
        <div class="sidebar1">
            <ul class="nav">
              <li><a href="?">In�cio</a></li>            
              <li><a href="?pagina=cadastro">Cadastrar Usu�rio</a></li>
              <li><a href="?pagina=visualizar">Visualizar Usu�rios</a></li>
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
						<p>Essa p�gina cont�m fun��es para gerenciamento de usu�rios.<br>
					  	Por meio dela � poss�vel cadastrar, visualizar e excluir usu�rios.<br>
						O menu do lado esquerdo apresenta as fun��es inclusas nesse sistema at� o momento.<br><br>
						Obs.: A exclus�o de usu�rios � feita ao visualizar usu�rios.
						</p>";
				break;	
			}
		?>
        </div>
	</div>    
  </body>
</html>