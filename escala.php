<!DOCTYPE html>
<html>
<head>
	<title>Escala coluna 1</title>
</head>
<body>

      <?php include 'header.html' ?>




<h1>Setores</h1>
<table border="1">

<?php
session_start();
include_once("conexao.php");

$result_setores = "SELECT * FROM setores";
$resultado_setores  = mysqli_query($conn, $result_setores);


	while ($row_setor = mysqli_fetch_assoc($resultado_setores)) {
		
		?> <tr> <td> <?php echo $row_setor['nome'] ;?> </td></tr><?php

		$result_corpo = "SELECT * FROM corpo_clinico"; //REESCREVER ESSE CODIGO DEPOIS, LOOP INEFICIENTE
    	$resultado_corpo  = mysqli_query($conn, $result_corpo);

		while ($row_corpo = mysqli_fetch_assoc($resultado_corpo)){
			if ($row_setor['ID'] == $row_corpo['setor_ID']){
				?><tr><td> <?php echo $row_corpo['nome'];?></td></tr><?php
			}
		}
	}
		
?>
</table>
</body>
</html>