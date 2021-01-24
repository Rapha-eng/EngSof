<?php
session_start();
include_once("conexao.php");
$q = "SELECT ID, nome FROM setores";
$setores= mysqli_query($conn, $q); 
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title> Deletar Setores </title>
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
      
    <h1>Deletar Setores</h1>
    
    
    
    <form method="POST" action="deleta_setor.php">
      <label>SETOR: </label>
      <select name="setor" id="setor">
                                        <option>Selecione o setor a ser deletado:</option>
            <?php
            foreach($setores as $m)
            {
            ?>
                <option value="<?php echo $m['ID']; //aqui vai o valor a ser guardado no POST?>"><?php echo $m['nome']; //aqui vai o que vai ser mostrado?></option> 
            <?php
            }
        ?>
        </select>
      
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