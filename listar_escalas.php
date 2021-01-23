<?php
session_start();
include_once("conexao.php");
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
  
  <?php 
  $q = "SELECT esc_ID, inicio, fim, turno FROM escalas";
  $escalas= mysqli_query($conn, $q); 
  ?>
  </style>
   
  
  <body>
    
    <?php include 'header.html' ?>
      
    <h1> HOSPITAL - SPDM<br>
    <h1>Ver Escala</h1>
    
    
    
    <form method="POST" action="ver_escala.php">
      
      <label>Escala: </label>
      <select name="escala" id="escala">
                                        <option value = NULL>Selecione a escala:</option>
            <?php
            foreach($escalas as $m)
            {
              
            ?>

                <option value="<?php echo $m['esc_ID']; //aqui vai o valor a ser guardado no POST?>"><?php echo 'Inicio: ', $m['inicio'], ' Fim: ', $m['fim'], ' Turno: ', $m['turno']; //aqui vai o que vai ser mostrado?></option> 
            <?php
            }
        ?>
        </select><br><br>
      <input type="submit" value="VISUALIZAR"> <br><br><br><br>
      
      <?php
        if (isset ($_SESSION['msg'])) { 
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
        } 
      ?>
      
      </form>
  </body>
</html>