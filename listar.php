<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title> ENGCOMP - Listar </title>
	<head>
	
	<style>	
	body {
	background-image: url('logo.png');
	background-repeat: no-repeat;
	background-size: 15% 25%;	
	background-position: top right;
    background-attachment: fixed;	
	
	}		
	</style>
	 	
	<body>	
		<a href="index.php">Cadastrar</a><br>
      	<a href="setores.php">Cadastrar Setores</a><br>
     	<a href="user_del.php">Deletar Funcionários</a><br>
      	<a href="user_update.php">Modificar Setor de Funcionários</a><br>
      	<a href="setor_del.php">Deletar Setor</a><br>
      	<a href="listar.php">Listar</a><br>
      	<a href="escala.php">Escala</a><br>
			
			
			<h1> HOSPITAL - SPDM<br>
			<h1>Lista de Funcionários</h1>								
			<?php
				if (isset ($_SESSION['msg'])){ 
					echo $_SESSION['msg'];
					unset ($_SESSION['msg']);
				}	
				//Receber No. de pg.
				$pagina_posicionada = filter_input(INPUT_GET,'pagina',
				FILTER_SANITIZE_NUMBER_INT);
				
				$pagina = (!empty($pagina_posicionada)) ? $pagina_posicionada : 1;
				
				//Quantidade de informações por página
				$qnt_result_pag = 8;
				
				//Calcular o inicio da informação para cada pagina
				$inicio_inf = ($qnt_result_pag * $pagina) - $qnt_result_pag;
				
				
				$result_hosp = "SELECT corpo_clinico.vinculo, corpo_clinico.referencia, corpo_clinico.nome, corpo_clinico.categoria, corpo_clinico.consenf, setores.nome FROM corpo_clinico LEFT JOIN setores on corpo_clinico.setor_ID = setores.ID LIMIT $inicio_inf,
				$qnt_result_pag";
				$resultado_hosp = mysqli_query($conn, $result_hosp);
				while ($row_hosp = mysqli_fetch_row($resultado_hosp)){
					echo "Vinculo: " . $row_hosp[0] . "<br>";
					echo "RF/RE: " . $row_hosp[1] . "<br>";
					echo "Nome: " . $row_hosp[2] . "<br>";
					echo "Categoria: " . $row_hosp[3] . "<br>";
					echo "COREN: " . $row_hosp[4] . "<br>";
					echo "Setor: " . $row_hosp[5] . "<br><hr>";
				}
				
				//Soma a quantidade de alunos - Paginação
				$result_pag = "SELECT COUNT(referencia) AS num_result FROM corpo_clinico";
				$resultado_pag = mysqli_query($conn, $result_pag);
				$row_pag = mysqli_fetch_assoc($resultado_pag);
				
				//Quantidade de Páginas
				$quantidade_pag = ceil($row_pag ['num_result'] / $qnt_result_pag );
			
				// Limitar os links antes e depois da pagina atual
				$max_links = 40;
				echo "<a href='listar.php?pagina=1'>Primeira</a>";
				
				
				for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina -1; $pag_ant
				++){
					if ($pag_ant >=1){
						echo "<a href='listar.php?pagina=$pag_ant'>$pag_ant</a> ";
					}
				}	
									
				echo "$pagina";
				
				for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep
				++){
						if ($pag_dep <= $quantidade_pag){
							echo "<a href='listar.php?pagina=$pag_dep'>$pag_dep</a> ";
						}
				}
				
				
				echo "<a href='listar.php?pagina=$quantidade_pag'> Última</a>";
				
								
			?>			 
	</body>
</html>