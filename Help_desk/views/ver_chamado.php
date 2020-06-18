<?php
include "../_script/config.php";
$consulta="select * from tbl_ocorrencia join tbl_empresa on tbl_ocorrencia.fkempresaid = tbl_empresa.id_empresa";
$con=mysqli_query($conn,$consulta)or die('Query failed: ' . mysqli_error($conn));
$consulta2="select * from tbl_ocorrencia join tbl_usuario on tbl_ocorrencia.fkUsuarioid = tbl_usuario.id_usuario";
$con2=mysqli_query($conn,$consulta2)or die('Query failed: ' . mysqli_error($conn));

?>
<!DOCTYPE html>
<html lang="pt-BR">
  	<head>
    	<meta charset="UTF-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
		<title>Chamados Cadastrados</title>
		<link rel="stylesheet" type="text/css" href="../styles/ver_chamadocss.css">
	</head>
	<body>
	<nav class="navbar">	
          <a class="menu">Visualizar Chamados </span></a>
    </nav>
		<a href="../index.php">
			<button class="voltar">Voltar</button>
		</a>

		<div id="all2">

			
			<?php $linha = mysqli_fetch_assoc($con);{ ?>
				<?php $linha2 = mysqli_fetch_assoc($con2);{ ?>
				
					<?php $total = mysqli_num_rows($con)?>
					<?php $total2 = mysqli_num_rows($con2)?>
					<?php                                     
						if($total>0 and $total2>0){
								

							 
						do{
							
					?>
				<div class="box3 box">
				<form action="../_script/funcao_btf.php" method="post" >
				
				<button name="id"type="submit" value="<?php echo $linha['id_ocorrencia'];?>" class="delete">Deletar</button>
				</form>
 
			
			
				<label class="dados">Funcionário:</label>
				<p class="light ocorrencia"><?php echo $linha2['nome'];?></p>
				<label class="dados">Empresa:</label>
				<p class="light ocorrencia"><?php echo $linha['nome'];?></p>
				<label class="dados">Assunto:</label>
				<p class="light ocorrencia"><?php echo $linha['assunto'];?></p>
				<label class="dados">Ocorrência:</label>
				<p class="light ocorrencia"><?php echo $linha['desc_ocorrencia'];?></p>
				<label class="dados">Sugestão:</lable>
				<p class="light ocorrencia"><?php if($linha['sugestao']!=''){
					echo $linha['sugestao'];
					}else{
						echo("Nenhuma sugestão foi digitada");
					};?></p>
				</div>
<?php						

							}while($linha2 = mysqli_fetch_assoc($con2) and $linha=mysqli_fetch_assoc($con));
									}else{
										?>
											<div class="box3 box">
												<label class="dados">Nenhuma Ocorrência foi registrada</label>
												
											
												</div>
									<?php } ?>
					

				<?php } ?>
				<?php } ?>
			


		</div>

	</body>
</html>