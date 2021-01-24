<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>Setores</title>
	
</head>
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


	  <?php include 'header.html' ?>
		
	<h1>Cadastrar Setores</h1>
<form method="POST" action="cadastra_setor.php">
	<input type="text" name="nome" placeholder="Nome"><br><br>
	<input type="text" name = "numero" placeholder="Número"><br><br>
	<input type="submit" value="CADASTRAR"><br><br><br><br>
	<?php
        if (isset ($_SESSION['msg'])) { 
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
        } 
     ?>
      
</form>


</body>
</html>