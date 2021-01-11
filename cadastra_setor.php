<?php
session_start();
include_once("conexao.php");


$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);


$result_hosp = "INSERT INTO setores (nome, numero) VALUES ('$nome', '$numero')";
$resultado_hosp = mysqli_query($conn, $result_hosp);

if (mysqli_insert_id($conn)) {
	
	$_SESSION['msg'] = "<p style= color:blue;'>CADASTRADO COM SUCESSO!! </p>";
	header ("Location: setores.php");
} else {
	$_SESSION['msg'] = "<p style= color:red;'>NÃO CADASTRADO!!</p>";
	header ("Location: setores.php");
	
}


