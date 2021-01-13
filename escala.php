<!DOCTYPE html>
<html>
<head>
	<title>Escala coluna 1</title>
</head>
<body>

      <a href="index.php">Cadastrar</a><br>
      <a href="setores.php">Cadastrar Setores</a><br>
      <a href="user_del.php">Deletar Funcionários</a><br>
      <a href="user_update.php">Modificar Setor de Funcionários</a><br>
      <a href="setor_del.php">Deletar Setor</a><br>
      <a href="listar.php">Listar</a><br>
      <a href="escala.php">Escala</a><br>




<h1> Escala</h1>

<?php
session_start();
include_once("conexao.php");

$result_setores = "SELECT * FROM setores";
$resultado_setores  = mysqli_query($conn, $result_setores);


	while ($row_setor = mysqli_fetch_assoc($resultado_setores)) {
		
		echo '<br>'. $row_setor['nome'] . '<br>';

		$result_corpo = "SELECT * FROM corpo_clinico";
    	$resultado_corpo  = mysqli_query($conn, $result_corpo);

		while ($row_corpo = mysqli_fetch_assoc($resultado_corpo)){
			if ($row_setor['ID'] == $row_corpo['setor_ID']){
				echo $row_corpo['nome'] . '<br>';
			}
		}
	}
		
?>

</body>
</html>