<?php
session_start();
include_once("conexao.php");

$escala = filter_input(INPUT_POST, 'escala', FILTER_SANITIZE_NUMBER_INT);
$ref = filter_input(INPUT_POST, 'referencia', FILTER_SANITIZE_STRING);
$entrada = filter_input(INPUT_POST, 'entrada', FILTER_SANITIZE_STRING);
$saida = filter_input(INPUT_POST, 'saida', FILTER_SANITIZE_STRING);


$result_hosp = "INSERT INTO usuarios_escalas (user_referencia,esc_ID,entrada,saida) VALUES ('$ref', $escala, '$entrada', '$saida')";
$resultado_hosp = mysqli_query($conn, $result_hosp);

$escala_query = "SELECT inicio, fim FROM escalas WHERE esc_ID = $escala";
$result = mysqli_query($conn, $escala_query);
$escala_info = $result->fetch_assoc();
$start_date = new DateTime($escala_info['inicio']);
$a = date_format($start_date,'Y:m:d');
$end_date = new DateTime($escala_info['fim']);
$period = new DatePeriod(
	$start_date, // 1st PARAM: start date
	new DateInterval('P1D'), // 2nd PARAM: interval (1 day interval in this case)
	$end_date, // 3rd PARAM: end date
);
$query = 'INSERT INTO usuarios_dias_escalas (esc_ID, user_referencia, dia) VALUES ';
$first = True;
foreach ($period as $day){
	if (!$first){
		$query .= " , ";
	}
	else{
		$first=False;
	}
	$date_string = date_format($day,'Y-m-d');
    $query .= "($escala,'$ref','$date_string')";
}



if (mysqli_affected_rows($conn)>0) {
	$result = mysqli_query($conn,$query);
	$_SESSION['msg'] = "<p style= color:blue;'>CADASTRADO COM SUCESSO!! </p>";
	header ("Location: funcionario_escala.php");
} else {
	
	$_SESSION['msg'] = "<p style= color:red;'>NÃO CADASTRADO!!</p> ";
	header ("Location: funcionario_escala.php");
	
}


