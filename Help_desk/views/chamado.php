<?php
include "../_script/config.php";
$consulta="SELECT * FROM tbl_empresa";
$con=mysqli_query($conn,$consulta)or die('Query failed: ' . mysqli_error($conn));


?>
<!DOCTYPE html>
<html lang="pt-BR">
  	<head>
    	<meta charset="UTF-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<title>OSLEC</title>
		<link rel="stylesheet" type="text/css" href="../styles/chamado_css.css">
	</head>
	<body>
	<nav class="navbar">	
          <a class="menu">Cadastrar Chamado</span></a>
    </nav>
		<a href="../index.php">
			<button class="voltar">Voltar</button>
		</a>
		
		<div id="all">

			<div class="box" id="box2">

				<p class="light">Chamado</p>

				<form id="main_content" action="../_script/caduser.php" method="post">
					<div id="form_part1">
			        <div>
							<label class="light" for="nome">Nome:</label>
				      <br>
				      <input type="text" required id="nome" name="nome"maxlength="45" placeholder="Digite seu nome">
						</div>

						<div>
							<label class="light" for="CPF">CPF:</label>
				      <br>
				      <input type="text" name="CPF"required id="cpf" minlength="11"maxlength="11" placeholder="Digite seu cpf">
						</div>
						<div id="empresa">
							<div>
							<label class="light" for="empresa">Empresa:</label>
								<br>
							    <select name="empresa" id="empresa" required>
									<?php while($dado = $con->fetch_array()) { ?>
								    <option class="dark" value="<?php echo $dado['id_empresa'];?>"><?php echo $dado['nome'];?> </option>
										<?php } ?>
							    </select>
							</div>
						</div>
						<label class="light" for="assunto">Assunto:</label>
				      <br>
				      <input type="text" required id="assunto" name="assunto"maxlength="100" placeholder="Digite o assunto">
						<div>
			          		<label class="light" for="ocorrencia">Ocorrência:</label>
				          	<br>
				          	<textarea id="ocorrencia" name="ocorrencia" required maxlength="1000" placeholder="Digite sua mensagem"></textarea>
			          	</div>
						<div>
			          		<label class="light" for="sugestao">Sugestão:</label>
				          	<br>
				          	<textarea id="sugestao" name="sugestao" maxlength="1000" placeholder="Digite sua mensagem"></textarea>
			          	</div>
			          	<div>
			          		<button class="enviar" type="submit"value="Enviar"name="enviar" >Enviar</button>
			          	</div>
					</div>

			    </form>

			</div>
			
		</div>

	</body>
</html>