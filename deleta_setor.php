
<?php
session_start();
include_once("conexao.php");


$setor = filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_NUMBER_INT);

$alter_query = "UPDATE corpo_clinico SET setor_ID = NULL WHERE setor_ID = '$setor'";
$result_hosp = "DELETE FROM setores WHERE ID = '$setor'";
$resultado_hosp = mysqli_query($conn, $result_hosp);

if (mysqli_affected_rows($conn)>0) {
  
  $_SESSION['msg'] = "<p style= color:blue;'>DELETADO COM SUCESSO!! </p>";
  header ("Location: setor_del.php");
} else {
  $_SESSION['msg'] = "<p style= color:red;'>NÃO DELETADO!!</p>";
  header ("Location: setor_del.php");
  
}

?>
