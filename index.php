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
  $q = "SELECT ID, nome FROM setores";
  $setores= mysqli_query($conn, $q); 
  ?>
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
    <h1>Cadastrar Usuário</h1>
    
    
    
    <form method="POST" action="cadastra.php">
      <label>Vinculo: </label>
      <select name="vinculo" id="vinculo">
                                        <option>Escolha a Categoria:</option>
            <option value="SPDM">SPDM</option>
            <option value="Outro">Outro</option>
      </select><br><br>
      <label>RF/RE: </label>
      <input type="text" name="referencia" placeholder="Digite a RF/RE "><br><br>
      <label>Nome: </label>
      <input type="text" name="nome" placeholder="Digite o Nome "><br><br>
      <label>Categoria: </label>
      <select name="categoria" id="categoria">
                                        <option>Escolha a Categoria:</option>
            <option value="Aux. Enfermagem">Aux. Enfermagem</option>
            <option value="Técnico Enfermagem">Técnico Enfermagem</option>
            <option value="Enfermeiro Pleno">Enfermeiro Pleno</option>
            <option value="Enfermeiro">Enfermeiro</option>
      </select><br><br>
      <label>COREN: </label>
      <input type="text" name="consenf" placeholder="Digite o COREN"><br><br>
      <label>SETOR: </label>
      <select name="setor" id="setor">
                                        <option value = NULL>Selecione o setor do funcionário:</option>
            <?php
            foreach($setores as $m)
            {
            ?>
                <option value="<?php echo $m['ID']; //aqui vai o valor a ser guardado no POST?>"><?php echo $m['nome']; //aqui vai o que vai ser mostrado?></option> 
            <?php
            }
        ?>
        </select><br><br>
      
      
      <input type="submit" value="CADASTRAR"> <br><br><br><br>
      
      <?php
        if (isset ($_SESSION['msg'])) { 
        echo $_SESSION['msg'];
        unset ($_SESSION['msg']);
        } 
      ?>
      
      </form>
  </body>
</html>