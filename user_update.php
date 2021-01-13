<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title> Atualizar Funcionários </title>
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
  $q = "SELECT ID, nome FROM setores";
  $setores= mysqli_query($conn, $q); 
  ?>
  </style>
  
  </style>
   
  
  <body>
    
      <a href="index.php">Cadastrar</a><br>
      <a href="setores.php">Cadastrar Setores</a><br>
      <a href="user_del.php">Deletar Funcionários</a><br>
      <a href="user_update.php">Modificar Setor de Funcionários</a><br>
      <a href="setor_del.php">Deletar Setor</a><br>
      <a href="listar.php">Listar</a><br>
      <a href="escala.php">Escala</a><br>
      
    <h1>Modificar Setor do Funcionário</h1>
    
    
    
    <form method="POST" action="update_user.php">
      <label>RF/RE: </label>
      <input type="text" name="referencia" placeholder="Digite a referência"><br><br>
      <label>Novo Setor: </label>
      <select name="setor" id="setor">
                                        <option>Selecione o setor do funcionário:</option>
            <?php
            foreach($setores as $m)
            {
            ?>
                <option value="<?php echo $m['ID']; //aqui vai o valor a ser guardado no POST?>"><?php echo $m['nome']; //aqui vai o que vai ser mostrado?></option> 
            <?php
            }
        ?>
        </select>
      <input type="submit" value="ATUALIZAR"> <br><br><br><br>
      
      <?php
        if (isset ($_SESSION['msg'])) { 
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
        } 
      ?>
      
      </form>
  </body>
</html>