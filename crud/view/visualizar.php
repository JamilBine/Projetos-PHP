<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Visualizar Usu&aacute;rios</title>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
</head>
<?php
	try{
		$conn = new \PDO("mysql:host=localhost;dbname=k13","root","");
			
		$sql = "select * from usuario";
			
		$stmt = $conn->query($sql);
		$list = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$sql2 = "select * from telefone";
			
		$stmt2 = $conn->query($sql2);
		$list2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
		//echo $list;
			
	}catch(\PDOException $e){
    	echo "Error! Message:".$e->getMessage()." Code:".$e->getCode();
	}
?>

<body>
    <h1>Visualizar Usu&aacute;rios</h1>
    	<table style="font-size:9px;" border="1px solid lightgrey" width="86%">
		    <thead>
		        <tr >
		            <th width="1%">ID</th>
		            <th width="12%">Nome</th>
		            <th width="6%">CEP</th>
		            <th width="18%">Rua</th>
		            <th width="6%">Número</th>
		            <th width="6%">Complemento</th>
		            <th width="8%">Bairro</th>
					<th width="10%">Cidade</th>
		            <th width="6%">Estado</th>
		            <th width="6%">Telefone</th>
                    <th width="8%">Ações</th>
		        </tr>
		    </thead>
		    <tbody id="resultados">            
            <?php foreach($list as $res){?>
				<tr>
                	<td><?php echo $res['id']; ?></td>
                	<td><?php echo $res['nome']; ?></td>
					<td><?php echo $res['cep']; ?></td>
                    <td><?php echo $res['rua']; ?></td>
                	<td><?php echo $res['numero']; ?></td>
					<td><?php echo $res['complemento']; ?></td>
                	<td><?php echo $res['bairro']; ?></td>
                	<td><?php echo $res['cidade']; ?></td>
					<td><?php echo $res['estado']; ?></td>
                    <td><?php foreach($list2 as $t){
								if($t['id_usuario'] == $res['id']){
									echo $t['numero_telefone'];
									echo "<br>";
								}
						}?></td>
                    <td>
                    <div id="acoes">
                    	<a id=<?php echo $res['id'];?> name="editar" title="Editar Usuário" href="funcoes/editar_usuario.php?id=<?php echo $res['id'];?>&pagina=editar"><img src="img/edit_mini.gif" /></a> 
                        &nbsp;
			    		<a id=<?php echo $res['id'];?> name="excluir" title="Excluir Usuário" href="funcoes/excluir_usuario.php?id=<?php echo $res['id'];?>"><img src="img/action_delete.gif" /></a>
					</div>	
                    </td>
				</tr>
            <?php } ?>
		    </tbody>
		</table>
        
	<script type="text/javascript">				
		$(document).ready(function(e) {
			$(".excluir").click(function() {
				//console.log($('#nome').val());
				//return false;
				var id2 = $("#id").val();
				$.ajax({
					type: "POST", //tipo de registro
					url: "./controller/Funcoes.class.php", //pagina de cadastro
					data: {
						acao: acao2, id: id2
					},
					dataType: 'JSON',
					success: function(response){console.log("OK");}
				});
			});
		});
	</script>

</body>
</html>