<?php
include "config.php"; 


$id=$_POST['id'];
echo($id); 

if($id!=0){
  $delete="DELETE  FROM tbl_ocorrencia WHERE id_ocorrencia='{$id}'";
  $testedel=mysqli_query($conn,$delete)or die('Query failed: ' . mysqli_error($conn));
  header('Location:../views/ver_chamado.php');
}
?>
