<?php
session_start();
include_once("conexao.php");


$inicio = filter_input(INPUT_POST, 'inicio', FILTER_SANITIZE_STRING);
$fim = filter_input(INPUT_POST, 'fim', FILTER_SANITIZE_STRING);
$turno = filter_input(INPUT_POST, 'turno', FILTER_SANITIZE_STRING);


$result_hosp = "INSERT INTO escalas (inicio,fim,turno) VALUES ('$inicio', '$fim', '$turno')";
$resultado_hosp = mysqli_query($conn, $result_hosp);

if (mysqli_affected_rows($conn)>0) {
	
	$_SESSION['msg'] = "<p style= color:blue;'>CADASTRADO COM SUCESSO!! </p>";
	header ("Location: escala_criacao.php");
} else {
	$_SESSION['msg'] = "<p style= color:red;'>NÃO CADASTRADO!!</p>";
	header ("Location: escala_criacao.php");
	
}


