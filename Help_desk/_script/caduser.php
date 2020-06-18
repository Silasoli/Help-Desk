<?php
include "config.php"; 

$nome=$_POST['nome'];
$cpf=$_POST['CPF'];
$empresa=$_POST['empresa'];
$assunto=$_POST['assunto'];
$ocorrencia=$_POST['ocorrencia'];
$sugestao=$_POST['sugestao'];






//seleciona tudo da tbl usuario onde cpf seja igual ao cpf digitado pelo usuario
$cpfquery=mysqli_query($conn,"select * from tbl_usuario where cpf = '$cpf'");
$numRegistros = mysqli_num_rows($cpfquery);
//caso não exista um usuario com esse cfp
if( $numRegistros == 0){
  //executa isso
  $query="INSERT INTO tbl_usuario(nome,cpf,fkEmpresa) values('$nome','$cpf','$empresa')";
  $result=mysqli_query($conn,$query)or die('Query failed: ' . mysqli_error($conn));

  $idquery=mysqli_query($conn,"SELECT * FROM tbl_usuario where cpf = '{$cpf}'"); 
  $dadoidcpf = mysqli_fetch_array($idquery);
  $iduser = $dadoidcpf['id_usuario'];

  $regoc="INSERT INTO tbl_ocorrencia(assunto,desc_ocorrencia,sugestao,fkEmpresaid,fkUsuarioid) values 
  ('$assunto','$ocorrencia','$sugestao','$empresa','$iduser')";
  $regocresult=mysqli_query($conn,$regoc) or die('Query failed: ' . mysqli_error($conn));
  


  
}else{
//se nao isso


$idquery=mysqli_query($conn,"SELECT * FROM tbl_usuario where cpf = '{$cpf}'"); 
$dadoidcpf = mysqli_fetch_array($idquery);
$iduser = $dadoidcpf['id_usuario'];
$idemp=$dadoidcpf['fkEmpresa'];
$regoc="INSERT INTO tbl_ocorrencia(assunto,desc_ocorrencia,sugestao,fkEmpresaid,fkUsuarioid) values 
('$assunto','$ocorrencia','$sugestao','$idemp','$iduser')";
$regocresult=mysqli_query($conn,$regoc) or die('Query failed: ' . mysqli_error($conn));
  
}   
mysqli_close($conn);

header('Location:../index.php')
?>