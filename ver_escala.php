<?php
session_start();
include_once("conexao.php");

$escala = filter_input(INPUT_POST, 'escala', FILTER_SANITIZE_NUMBER_INT);
$escala_query = "SELECT inicio, fim, turno FROM escalas WHERE esc_ID = $escala";
$result = mysqli_query($conn, $escala_query);
$escala_info = $result->fetch_assoc();
$start_date = new DateTime($escala_info['inicio']);
$end_date = new DateTime($escala_info['fim']);
$period = new DatePeriod(
  $start_date, // 1st PARAM: start date
  new DateInterval('P1D'), // 2nd PARAM: interval (1 day interval in this case)
  $end_date, // 3rd PARAM: end date
);
$mega_query = "SELECT corpo_clinico.nome, setores.nome as setor_nome, sub_user_esc.entrada, sub_user_esc.saida FROM (corpo_clinico JOIN setores ON corpo_clinico.setor_ID = setores.ID ) JOIN (SELECT * FROM usuarios_escalas WHERE usuarios_escalas.esc_ID = $escala) as sub_user_esc on corpo_clinico.referencia = sub_user_esc.user_referencia ORDER BY setores.nome, corpo_clinico.nome" ;
$funcionarios = mysqli_query($conn, $mega_query);
$dias_query = "SELECT * FROM usuarios_dias_escalas WHERE esc_ID = $escala";
$dias = mysqli_query($conn, $dias_query);
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
    <h3>Escala <?php echo date_format($start_date,'d/m/Y'), ' a ', date_format($end_date,'d/m/Y') , ' ' ,  $escala_info['turno'] ?></h3>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

<table border="1">

      <thear> 
       <tr> <td>Nome</td>
        <td>Entrada</td>
        <td>Saída</td>

        <?php $day_counter=0;
        foreach ($period as $day){?>
          
         <td><?php   echo date_format($day,'d/m'); ?></td>
         <?php $day_counter+=1;
        } ?>
        </tr>
      </thear>
        
      <tbody>  
        <?php
        $previous_setor = False;
        while ($mega_row = mysqli_fetch_assoc($funcionarios)) {
          if($mega_row['setor_nome']!=$previous_setor){?>
            <tr><td> <?php echo $mega_row['setor_nome'] ; ?></td></tr>
            <?php $previous_setor = $mega_row['setor_nome'];
          }
          $entrada = new DateTime($mega_row['entrada']);
          $saida = new DateTime($mega_row['saida']);?>
          <tr>
              <td> <?php echo $mega_row['nome']; ?></td> 
              <td> <?php echo date_format($entrada,"H:i"); ?></td>
              <td> <?php echo date_format($saida,"H:i");?></td>




              <?php for($i=0;$i<$day_counter;$i++){
                $dias_row = mysqli_fetch_assoc($dias);?>
              <td><?php  echo $dias_row['situacao'];?></td>
             <?php }
            
            } ?>  
          </tr>



          <?php
            if (isset ($_SESSION['msg'])) { 
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
            } 
          ?>
      </tbody> 
    </table>
      
    </form>
  </body>
</html>