<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title> HOSPITAL - Cadastro </title>
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
    
      <?php include 'header.html' ?>
      
    <h1> HOSPITAL - SPDM<br>
    <h1>Criar Escala</h1>
    
    
    
    <form method="POST" action="criar_escala.php">
      <label>Data de Início: </label>
      <input type="date" id="inicio" name="inicio"><br><br>
      <label>Data de Fim: </label>
      <input type="date" id="fim" name="fim"><br><br>
      
      <label>Turno: </label>
      <select name="turno" id="turno">
                                        <option>Escolha o Turno:</option>
            <option value="Manha">Manhã</option>
            <option value="Integral">Integral</option>
            <option value="Noturno">Noturno</option>
      </select><br><br>
      <input type="submit" value="CRIAR"> <br><br><br><br>
      
      <?php
        if (isset ($_SESSION['msg'])) { 
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
        } 
      ?>
      
      </form>
  </body>
</html>