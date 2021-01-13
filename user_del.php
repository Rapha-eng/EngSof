<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Deletar Funcionários </title>
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

    <h1>Deletar Funcionário</h1>
    
    
    
    <form method="POST" action="deleta_user.php">
      <label>RF/RE: </label>
      <input type="text" name="referencia" placeholder="Digite a referência"><br><br>
      
      <input type="submit" value="DELETAR"> <br><br><br><br>
      
      <?php
        if (isset ($_SESSION['msg'])) { 
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
        } 
      ?>
      
      </form>
  </body>
</html>