<?php
session_start();
include_once("conexao.php");


$referencia = filter_input(INPUT_POST, 'referencia', FILTER_SANITIZE_STRING);
$setor = filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_NUMBER_INT);


$result_hosp = " UPDATE corpo_clinico SET setor_ID = '$setor' WHERE referencia = $referencia;";
$resultado_hosp = mysqli_query($conn, $result_hosp);

if (mysqli_affected_rows($conn)>0) {
	
	$_SESSION['msg'] = "<p style= color:blue;'>ALTERADO COM SUCESSO!! </p>";
	header ("Location: user_update.php");
} else {
	$_SESSION['msg'] = "<p style= color:red;'>NÃO ALTERADO!!</p>";
	header ("Location: user_update.php");
	
}


