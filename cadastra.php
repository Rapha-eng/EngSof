<?php
session_start();
include_once("conexao.php");

$vinculo = filter_input(INPUT_POST, 'vinculo', FILTER_SANITIZE_STRING);
$referencia = filter_input(INPUT_POST, 'referencia', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
$consenf = filter_input(INPUT_POST, 'consenf', FILTER_SANITIZE_STRING);
$setor = filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_NUMBER_INT);

$result_hosp = "INSERT INTO corpo_clinico (vinculo, referencia, nome, categoria, consenf, setor_ID) VALUES ('$vinculo', '$referencia', '$nome', '$categoria', '$consenf', '$setor')";
$resultado_hosp = mysqli_query($conn, $result_hosp);

if (mysqli_affected_rows($conn)>0) {
	
	$_SESSION['msg'] = "<p style= color:blue;'>CADASTRADO COM SUCESSO!! $Group </p>";
	header ("Location: index.php");
} else {
	$_SESSION['msg'] = "<p style= color:red;'>NÃO CADASTRADO!!</p>";
	header ("Location: index.php");
	
}


