<?php
session_start();
include_once("conexao.php");


$ref = filter_input(INPUT_POST, 'referencia', FILTER_SANITIZE_STRING);


$result_hosp = "DELETE FROM corpo_clinico WHERE referencia = '$ref'";
$resultado_hosp = mysqli_query($conn, $result_hosp);

if (mysqli_affected_rows($conn)>0) {
	
	$_SESSION['msg'] = "<p style= color:blue;'>DELETADO COM SUCESSO!! </p>";
	header ("Location: user_del.php");
} else {
	$_SESSION['msg'] = "<p style= color:red;'>NÃO DELETADO!!</p>";
	header ("Location: user_del.php");
	
}


