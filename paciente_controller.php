<?php

require "./conexao.php";
require "./paciente_model.php";
require "./paciente_service.php";



$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if($acao == 'inserir')
{
     $paciente = new Paciente;

        $paciente->__set('id_cidade', $_POST['cidade']);
        //dados
        $paciente->__set('nome', $_POST['nome']);
        $paciente->__set('idade', $_POST['idade']);
        //olho direito
        $paciente->__set('olho_direito_esferico', $_POST['od-esferico']);
        $paciente->__set('olho_direito_cilindrico', $_POST['od-cilindrico']);
        $paciente->__set('olho_direito_eixo', $_POST['od-eixo']);
        //olho esquerdo
        $paciente->__set('olho_esquerdo_esferico', $_POST['oe-esferico']);
        $paciente->__set('olho_esquerdo_cilindrico', $_POST['oe-cilindrico']);
        $paciente->__set('olho_esquerdo_eixo', $_POST['oe-eixo']);
        //adicao
        $paciente->__set('adicao', $_POST['adicao']);
        //descricao
        $paciente->__set('descricao', $_POST['descricao']);
  //conexao
  $conexao = new Conexao();
  $pacienteService = new PacienteService($conexao, $paciente);
 $pacienteService->inserir();
  header('Location: receita.php?sucesso');

  
}
if($acao == 'recuperarM')
{
  $paciente = new Paciente();
  $conexao = new Conexao();
  $pacienteService = new PacienteService($conexao, $paciente);
  $total_registros_pagina = 8;
  $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1 ;
  $deslocamento = ($pagina - 1) * $total_registros_pagina;
  $pacientes = $pacienteService->recuperarM($pagina,$deslocamento);

  $pagina_ativa = $pagina;

  $pacientes = $pacienteService->recuperarM($total_registros_pagina,$deslocamento,1);
  $pagina_ativa = $pagina;
  $pacientes = $pacientes;
  $total_pacientes = $pacienteService->getTotalregistros(1);
  $total_de_paginas = ceil($total_pacientes->total/$total_registros_pagina);
   
}
if($acao == 'recuperarCl')
{
  $paciente = new Paciente();
  $conexao = new Conexao();
  $pacienteService = new PacienteService($conexao, $paciente);
  $total_registros_pagina = 8;
  $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1 ;
  $deslocamento = ($pagina - 1) * $total_registros_pagina;
  $pacientes = $pacienteService->recuperarCl($pagina,$deslocamento);

  $pagina_ativa = $pagina;

  $pacientes = $pacienteService->recuperarCl($total_registros_pagina,$deslocamento,3);
  $pagina_ativa = $pagina;
  $pacientes = $pacientes;
  $total_pacientes = $pacienteService->getTotalregistros(3);
  $total_de_paginas = ceil($total_pacientes->total/$total_registros_pagina);
   
}
if($acao == 'recuperarum')
{
    $paciente = new Paciente();
    $conexao = new Conexao();
    $pacienteService = new PacienteService($conexao, $paciente);
    $pacientes = $pacienteService->recuperarUm();
    
     foreach($pacientes as $indice => $paciente)
     {
         
     
    
    ?>
    
    <?php 

require_once "validador_acesso.php";

?>

<html lang="pt-br">

  <head>

 

    <meta charset="utf-8" />

    <title>Receitas thiago </title>



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  

    <style>

      .card-abrir-chamado {

        padding: 30px 0 0 0;

        width: 100%;

        margin: 0 auto;

      }

    </style>

  </head>



  <body>


    <nav class="navbar navbar-dark bg-dark">

      <a class="navbar-brand" href="#">

      <i class="fas fa-glasses "></i>

        Ótica Ipanema

      </a>

      <ul class="navbar-nav">

        <li class="nav-item">

          <a href="logoff.php" class="nav-link">

          SAIR

          </a>

        </li>

      </ul>

    </nav>



    <div class="container">    

      <div class="row">



        <div class="card-abrir-chamado">

          <div class="card">

            <div class="card-header">

             Novo cliente

            </div>

            <div class="card-body">

              <div class="row">

                <div class="col">

                  

                  <form method="post" action="paciente_controller.php?acao=atualizar&id=<?php echo $paciente->id; ?>">



                  <div class="form-group mb-3">

                      <label>Cidade</label>

                      <select style="border: 2px solid red;background-color:black;color:white;" name="cidade" class="form-control">

                        <option value="1">Monte Mor</option>

                        <option value="2">Capivari</option>

                        </select>

    </div>



                    <div class="form-group">

                      <label>Nome</label>

                      <input name="nome" type="text" class="form-control" placeholder="Nome" value="<?php echo $paciente->nome; ?>">
                      
                    </div>

                    <div class="form-group">

                    <label>Idade</label>

                    <input name="idade" type="text" class="form-control" value="<?php echo $paciente->idade; ?>" placeholder="idade" style="border: 1px  3px solid yellow;">

                    </div>

                    



                    

                    <div class="table-responsive table-bordered">

          <table class="table">

            <thead class="thead-dark">

        <tr>

        <th>OLHO</th>

        <th>ESFÉRICO</th>

        <th>CILINDRICO</th>

        <th>EIXO</th>

        </tr>

        </thead>

      <tbody>

        <tr>

            <td style="color: red;">0D</td>

            <td> <input name="od-esferico" type="text" class="form-control" placeholder="grau" value="<?php echo $paciente->olho_direito_esferico; ?>"></td>

            <td> <input name="od-cilindrico" type="text" class="form-control" placeholder="grau" value="<?php echo $paciente->olho_direito_cilindrico; ?>"></td>

            <td> <input name="od-eixo" type="text" class="form-control"  value="<?php echo $paciente->olho_direito_eixo; ?>"></td>

        </tr>



        <tr>

            <td style="color: red;">OE</td>

            <td> <input name="oe-esferico" type="text" class="form-control" placeholder="grau" value="<?php echo $paciente->olho_esquerdo_esferico; ?>"></td>

            <td> <input name="oe-cilindrico" type="text" class="form-control" placeholder="grau" value="<?php echo $paciente->olho_esquerdo_cilindrico; ?>"></td>

            <td> <input name="oe-eixo" type="text" class="form-control" value="<?php echo $paciente->olho_esquerdo_eixo; ?>"></td>

        </tr>

        </tbody>



    </table>

                    </div>



                    <div class="form-group">

                      <label>Adição</label>

                      <input type="text" class="form-control" name="adicao" value="<?php echo $paciente->adicao; ?>">

                    </div>

  

                    <div class="form-group">

                      <label>Descrição</label>

                      <textarea name="descricao" class="form-control" rows="3"><?php echo $paciente->descricao; ?></textarea>

                    </div>



                    <div class="row mt-5">

                      <div class="col-6">

                        <a href="home.php" class="btn btn-lg btn-outline-warning btn-block">Voltar</a>

                      </div>



                      <div class="col-6">

                        <button class="btn btn-lg btn-outline-success btn-block" type="submit">Atualizar</button>

                      </div>

                    </div>

                  </form>



                </div>

              </div>

            </div>

          </div>

        </div>

    </div>

  </body>
    
    <?php
     }
    }
if($acao == 'recuperarC')
{
    $paciente = new Paciente();
    $conexao = new Conexao();
    $pacienteService = new PacienteService($conexao, $paciente);
    $total_registros_pagina = 8;
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1 ;
    $deslocamento = ($pagina - 1) * $total_registros_pagina;
    $pacientes = $pacienteService->recuperarC($total_registros_pagina,$deslocamento);
    $pagina_ativa = $pagina;
    
    $total_pacientes = $pacienteService->getTotalregistros(2);
    $total_de_paginas = ceil($total_pacientes->total/$total_registros_pagina);
   
}

if($acao == 'atualizar')
{
   $paciente = new Paciente();
   //local
   $paciente->__set('id_cidade', $_POST['cidade']);
   //dados
   $paciente->__set('nome', $_POST['nome']);
   $paciente->__set('idade', $_POST['idade']);
   //olho direito
   $paciente->__set('olho_direito_esferico', $_POST['od-esferico']);
   $paciente->__set('olho_direito_cilindrico', $_POST['od-cilindrico']);
   $paciente->__set('olho_direito_eixo', $_POST['od-eixo']);
   //olho esquerdo
   $paciente->__set('olho_esquerdo_esferico', $_POST['oe-esferico']);
   $paciente->__set('olho_esquerdo_cilindrico', $_POST['oe-cilindrico']);
   $paciente->__set('olho_esquerdo_eixo', $_POST['oe-eixo']);
   //adicao
   $paciente->__set('adicao', $_POST['adicao']);
   //descricao
   $paciente->__set('descricao', $_POST['descricao']);
   //conexao
   $conexao = new Conexao();
   $pacienteService = new PacienteService($conexao,$paciente);
   $pacienteService->atualizar();
   header('Location: home.php');

}
else if($acao == 'remover') {

    $paciente = new Paciente();
    $paciente->__set('id', $_GET['id']);

    $conexao = new Conexao();

    $pacienteService = new PacienteService($conexao, $paciente);
    $pacienteService->remover();

    header('location: home.php');
}
else if($acao == 'pesquisarM')
{
  $paciente = new Paciente();
  $conexao = new Conexao();
  $pacienteService = new PacienteService($conexao, $paciente);
  $pacientes = $pacienteService->pesquisarM();

  if(empty($pacientes))
  {
    echo 'Nenhum registro encontrado';
  }

 foreach($pacientes as $indice => $paciente){

    ?>

<html lang="pt-br">

  <head>

 

    <meta charset="utf-8" />

    <title>Receitas Ipanema </title>



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <script>
    function remover(id) {
    location.href = 'paciente_controller.php?acao=remover&id='+id;
    }

    function atualizar(id) {
    location.href = 'paciente_controller.php?acao=recuperarum&id='+id;
    }

    function visualizar(id) {
    location.href = 'paciente_controller.php?acao=ver&id='+id;
    }

    function pesquisar()
    {
      let nome = document.getElementById('pesquisa').value
      location.href = 'paciente_controller.php?acao=pesquisar&nome='+nome;
    }

  </script>

    <style>

      .um:hover{

        background-color: #D3D3D3;

      }

.card-header{

  color: green;

  font-size:26px ;

  text-align: center;

}



      .card{

        background-color:#B0C4DE;

       

        



      }



      .card-consultar-chamado {

        padding: 30px 0 0 0;

        width: 100%;

        margin: 0 auto;

        margin-bottom: 22px;

      }

    </style>

  </head>



  <div class="card-consultar-chamado">

  <div class="card">

    <div class="card-header">

      <p>Clientes</p>

      

    </div>

    

    <div class="card-body">

      

   





      <div class="card mb-5 bg-light">

        <div class="card-body um">

      <!-- <h4 style="color: red;" class="card-title"><?php echo $paciente->nome; ?></h4> --->

          <h5 style="color: black;" class="card-title"><?php echo " $paciente->nome ,$paciente->idade Anos "; ?></h5>

          <h6 style="color: black;" class="card-title"><?php echo $paciente->data_cadastrado;
        
 ?></h6>





         

          <div class="table-responsive table-bordered">

  <table class="table">

    <thead class="thead-dark">

<tr>

<th>OLHO</th>

<th>ESFÉRICO</th>

<th>CILINDRICO</th>

<th>EIXO</th>

</tr>

</thead>

<tbody>

<tr>

    <td style="color: red;">0D</td>

    <td> <?php echo $paciente->olho_direito_esferico; ?></td>

    <td> <?php echo $paciente->olho_direito_cilindrico; ?></td>

    <td>  <?php echo $paciente->olho_direito_eixo; ?></td>

</tr>



<tr>

    <td style="color: red;">OE</td>

    <td> <?php echo $paciente->olho_esquerdo_esferico; ?></td>

    <td>  <?php echo $paciente->olho_esquerdo_cilindrico; ?></td>

    <td>  <?php echo $paciente->olho_esquerdo_eixo; ?></td>

</tr>

</tbody>



</table>

            </div>    

        

        

        </h6>

          <p style="color: green;font-size:large " class="card-text">Adição: <?php echo $paciente->adicao; ?></p>



          <p style="color: blue;font-size:large " class="card-text">Descrição: <?php echo $paciente->descricao; ?></p>


          <?php if($_SESSION['perfil_id'] == 1){ ?>
            <div style="border:2px double blue" class="mt-3 p-3 ">
            <i style="margin-left: 400px;" class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $paciente->id ?>)"></i>
              <i style="margin-left: 50px;" class="fas fa-edit fa-lg text-info" onclick="atualizar(<?= $paciente->id ?>)"></i>
              <i style="margin-left: 50px;" class=" fas fa-print fa-lg"  onclick="visualizar(<?= $paciente->id ?>)"></i>
            </div>
              <?php } ?>

              <?php if($_SESSION['perfil_id'] == 2 || $_SESSION['perfil_id'] == 3){ ?>
            <div style="border:2px double blue" class="mt-3 p-3 ">
              <i style="margin-left: 50px;" class=" fas fa-print fa-lg"  onclick="visualizar(<?= $paciente->id ?>)"></i>
            </div>
              <?php } ?>

        </div>

      </div>

      





     

    </div>

  </div>

</div>
<?php }

?>
<div class="row mt-5">

<div class="col-6">

  <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>

</div>

</div>

<?php
}?>






<?php
if($acao == 'pesquisarCl')
{
  $paciente = new Paciente();
  $conexao = new Conexao();
  $pacienteService = new PacienteService($conexao, $paciente);
  $pacientes = $pacienteService->pesquisarCl();

  if(empty($pacientes))
  {
    echo 'Nenhum registro encontrado';
  }
  else{
    foreach($pacientes as $indice => $paciente){  ?>
  
  <html lang="pt-br">

  <head>

 

    <meta charset="utf-8" />

    <title>Receitas Ipanema </title>



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <script>
    function remover(id) {
    location.href = 'paciente_controller.php?acao=remover&id='+id;
    }

    function atualizar(id) {
    location.href = 'paciente_controller.php?acao=recuperarum&id='+id;
    }

    function visualizar(id) {
    location.href = 'paciente_controller.php?acao=ver&id='+id;
    }

    function pesquisar()
    {
      let nome = document.getElementById('pesquisa').value
      location.href = 'paciente_controller.php?acao=pesquisar&nome='+nome;
    }

  </script>

    <style>

      .um:hover{

        background-color: #D3D3D3;

      }

.card-header{

  color: green;

  font-size:26px ;

  text-align: center;

}



      .card{

        background-color:#B0C4DE;

       

        



      }



      .card-consultar-chamado {

        padding: 30px 0 0 0;

        width: 100%;

        margin: 0 auto;

        margin-bottom: 22px;

      }

    </style>

  </head>



  <div class="card-consultar-chamado">

  <div class="card">

    <div class="card-header">

      <p>Clientes</p>

      

    </div>

    

    <div class="card-body">

      

   





      <div class="card mb-5 bg-light">

        <div class="card-body um">

      <!-- <h4 style="color: red;" class="card-title"><?php echo $paciente->nome; ?></h4> --->

          <h5 style="color: black;" class="card-title"><?php echo " $paciente->nome ,$paciente->idade Anos "; ?></h5>

          <h6 style="color: black;" class="card-title"><?php  echo $paciente->data_cadastrado;   
 ?></h6>





         

          <div class="table-responsive table-bordered">

  <table class="table">

    <thead class="thead-dark">

<tr>

<th>OLHO</th>

<th>ESFÉRICO</th>

<th>CILINDRICO</th>

<th>EIXO</th>

</tr>

</thead>

<tbody>

<tr>

    <td style="color: red;">0D</td>

    <td> <?php echo $paciente->olho_direito_esferico; ?></td>

    <td> <?php echo $paciente->olho_direito_cilindrico; ?></td>

    <td>  <?php echo $paciente->olho_direito_eixo; ?></td>

</tr>



<tr>

    <td style="color: red;">OE</td>

    <td> <?php echo $paciente->olho_esquerdo_esferico; ?></td>

    <td>  <?php echo $paciente->olho_esquerdo_cilindrico; ?></td>

    <td>  <?php echo $paciente->olho_esquerdo_eixo; ?></td>

</tr>

</tbody>



</table>

            </div>    

        

        

        </h6>

          <p style="color: green;font-size:large " class="card-text">Adição: <?php echo $paciente->adicao; ?></p>



          <p style="color: blue;font-size:large " class="card-text">Descrição: <?php echo $paciente->descricao; ?></p>


          <?php if($_SESSION['perfil_id'] == 1){ ?>
            <div style="border:2px double blue" class="mt-3 p-3 ">
            <i style="margin-left: 400px;" class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $paciente->id ?>)"></i>
              <i style="margin-left: 50px;" class="fas fa-edit fa-lg text-info" onclick="atualizar(<?= $paciente->id ?>)"></i>
              <i style="margin-left: 50px;" class=" fas fa-print fa-lg"  onclick="visualizar(<?= $paciente->id ?>)"></i>
            </div>
              <?php } ?>

              <?php if($_SESSION['perfil_id'] == 2 || $_SESSION['perfil_id'] == 3 || $_SESSION['perfil_id'] == 4){ ?>
            <div style="border:2px double blue" class="mt-3 p-3 ">
              <i style="margin-left: 50px;" class=" fas fa-print fa-lg"  onclick="visualizar(<?= $paciente->id ?>)"></i>
            </div>
              <?php } ?>

        </div>

      </div>

      



<div class="row mt-5">

<div class="col-6">

  <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>

</div>

</div>

     

    </div>

  </div>

</div>
</html>


 <?php } } } ?>
<?php
if($acao == 'pesquisarC')
{
  $paciente = new Paciente();
  $conexao = new Conexao();
  $pacienteService = new PacienteService($conexao, $paciente);
  $pacientes = $pacienteService->pesquisarC();

  if(empty($pacientes))
  {
    echo 'Nenhum registro encontrado';
  }

 foreach($pacientes as $indice => $paciente){

    ?>

<html lang="pt-br">

  <head>

 

    <meta charset="utf-8" />

    <title>Receitas Ipanema </title>



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <script>
    function remover(id) {
    location.href = 'paciente_controller.php?acao=remover&id='+id;
    }

    function atualizar(id) {
    location.href = 'paciente_controller.php?acao=recuperarum&id='+id;
    }

    function visualizar(id) {
    location.href = 'paciente_controller.php?acao=ver&id='+id;
    }

    function pesquisar()
    {
      let nome = document.getElementById('pesquisa').value
      location.href = 'paciente_controller.php?acao=pesquisar&nome='+nome;
    }

  </script>

    <style>

      .um:hover{

        background-color: #D3D3D3;

      }

.card-header{

  color: green;

  font-size:26px ;

  text-align: center;

}



      .card{

        background-color:#B0C4DE;

       

        



      }



      .card-consultar-chamado {

        padding: 30px 0 0 0;

        width: 100%;

        margin: 0 auto;

        margin-bottom: 22px;

      }

    </style>

  </head>



  <div class="card-consultar-chamado">

  <div class="card">

    <div class="card-header">

      <p>Clientes</p>

      

    </div>

    

    <div class="card-body">

      

   





      <div class="card mb-5 bg-light">

        <div class="card-body um">

      <!-- <h4 style="color: red;" class="card-title"><?php echo $paciente->nome; ?></h4> --->

          <h5 style="color: black;" class="card-title"><?php echo " $paciente->nome ,$paciente->idade Anos "; ?></h5>

          <h6 style="color: black;" class="card-title"><?php  echo $paciente->data_cadastrado;   
 ?></h6>





         

          <div class="table-responsive table-bordered">

  <table class="table">

    <thead class="thead-dark">

<tr>

<th>OLHO</th>

<th>ESFÉRICO</th>

<th>CILINDRICO</th>

<th>EIXO</th>

</tr>

</thead>

<tbody>

<tr>

    <td style="color: red;">0D</td>

    <td> <?php echo $paciente->olho_direito_esferico; ?></td>

    <td> <?php echo $paciente->olho_direito_cilindrico; ?></td>

    <td>  <?php echo $paciente->olho_direito_eixo; ?></td>

</tr>



<tr>

    <td style="color: red;">OE</td>

    <td> <?php echo $paciente->olho_esquerdo_esferico; ?></td>

    <td>  <?php echo $paciente->olho_esquerdo_cilindrico; ?></td>

    <td>  <?php echo $paciente->olho_esquerdo_eixo; ?></td>

</tr>

</tbody>



</table>

            </div>    

        

        

        </h6>

          <p style="color: green;font-size:large " class="card-text">Adição: <?php echo $paciente->adicao; ?></p>



          <p style="color: blue;font-size:large " class="card-text">Descrição: <?php echo $paciente->descricao; ?></p>


          <?php if($_SESSION['perfil_id'] == 1){ ?>
            <div style="border:2px double blue" class="mt-3 p-3 ">
            <i style="margin-left: 400px;" class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $paciente->id ?>)"></i>
              <i style="margin-left: 50px;" class="fas fa-edit fa-lg text-info" onclick="atualizar(<?= $paciente->id ?>)"></i>
              <i style="margin-left: 50px;" class=" fas fa-print fa-lg"  onclick="visualizar(<?= $paciente->id ?>)"></i>
            </div>
              <?php } ?>

              <?php if($_SESSION['perfil_id'] == 2 || $_SESSION['perfil_id'] == 3 || $_SESSION['perfil_id'] == 4){ ?>
            <div style="border:2px double blue" class="mt-3 p-3 ">
              <i style="margin-left: 50px;" class=" fas fa-print fa-lg"  onclick="visualizar(<?= $paciente->id ?>)"></i>
            </div>
              <?php } ?>

        </div>

      </div>

      



<div class="row mt-5">

<div class="col-6">

  <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>

</div>

</div>

     

    </div>

  </div>

</div>
</html>
<?php }
}

 ?>





<?php


if($acao == 'pesquisar')
{
  $paciente = new Paciente();
  $conexao = new Conexao();
  $pacienteService = new PacienteService($conexao, $paciente);
  $pacientes = $pacienteService->pesquisar();

  if(empty($pacientes))
  {
    echo 'Nenhum registro encontrado';
  }

 foreach($pacientes as $indice => $paciente){

    ?>

<html lang="pt-br">

  <head>

 

    <meta charset="utf-8" />

    <title>Receitas Ipanema </title>



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <script>
    function remover(id) {
    location.href = 'paciente_controller.php?acao=remover&id='+id;
    }

    function atualizar(id) {
    location.href = 'paciente_controller.php?acao=recuperarum&id='+id;
    }

    function visualizar(id) {
    location.href = 'paciente_controller.php?acao=ver&id='+id;
    }

    function pesquisar()
    {
      let nome = document.getElementById('pesquisa').value
      location.href = 'paciente_controller.php?acao=pesquisar&nome='+nome;
    }

  </script>

    <style>

      .um:hover{

        background-color: #D3D3D3;

      }

.card-header{

  color: green;

  font-size:26px ;

  text-align: center;

}



      .card{

        background-color:#B0C4DE;

       

        



      }



      .card-consultar-chamado {

        padding: 30px 0 0 0;

        width: 100%;

        margin: 0 auto;

        margin-bottom: 22px;

      }

    </style>

  </head>



  <div class="card-consultar-chamado">

  <div class="card">

    <div class="card-header">

      <p>Clientes</p>

      

    </div>

    

    <div class="card-body">

      

   





      <div class="card mb-5 bg-light">

        <div class="card-body um">

      <!-- <h4 style="color: red;" class="card-title"><?php echo $paciente->nome; ?></h4> --->

          <h5 style="color: black;" class="card-title"><?php echo " $paciente->nome ,$paciente->idade Anos "; ?></h5>

          <h6 style="color: black;" class="card-title"><?php echo($paciente->data_cadastrado);
        
 ?></h6>





         

          <div class="table-responsive table-bordered">

  <table class="table">

    <thead class="thead-dark">

<tr>

<th>OLHO</th>

<th>ESFÉRICO</th>

<th>CILINDRICO</th>

<th>EIXO</th>

</tr>

</thead>

<tbody>

<tr>

    <td style="color: red;">0D</td>

    <td> <?php echo $paciente->olho_direito_esferico; ?></td>

    <td> <?php echo $paciente->olho_direito_cilindrico; ?></td>

    <td>  <?php echo $paciente->olho_direito_eixo; ?></td>

</tr>



<tr>

    <td style="color: red;">OE</td>

    <td> <?php echo $paciente->olho_esquerdo_esferico; ?></td>

    <td>  <?php echo $paciente->olho_esquerdo_cilindrico; ?></td>

    <td>  <?php echo $paciente->olho_esquerdo_eixo; ?></td>

</tr>

</tbody>



</table>

            </div>    

        

        

        </h6>

          <p style="color: green;font-size:large " class="card-text">Adição: <?php echo $paciente->adicao; ?></p>



          <p style="color: blue;font-size:large " class="card-text">Descrição: <?php echo $paciente->descricao; ?></p>


          <?php if($_SESSION['perfil_id'] == 1){ ?>
            <div style="border:2px double blue" class="mt-3 p-3 ">
            <i style="margin-left: 400px;" class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $paciente->id ?>)"></i>
              <i style="margin-left: 50px;" class="fas fa-edit fa-lg text-info" onclick="atualizar(<?= $paciente->id ?>)"></i>
              <i style="margin-left: 50px;" class=" fas fa-print fa-lg"  onclick="visualizar(<?= $paciente->id ?>)"></i>
            </div>
              <?php } ?>

              <?php if($_SESSION['perfil_id'] == 2 || $_SESSION['perfil_id'] == 3){ ?>
            <div style="border:2px double blue" class="mt-3 p-3 ">
              <i style="margin-left: 50px;" class=" fas fa-print fa-lg"  onclick="visualizar(<?= $paciente->id ?>)"></i>
            </div>
              <?php } ?>

        </div>

      </div>

      





     

    </div>

  </div>

</div>
<?php }

?>
<div class="row mt-5">

<div class="col-6">

  <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>

</div>

</div>

<?php
}?>







<?php
if($acao == 'ver')
{
    $paciente = new Paciente();
    $conexao = new Conexao();
    $pacienteService = new PacienteService($conexao, $paciente);
    $pacientes = $pacienteService->recuperarUm();
    
     foreach($pacientes as $indice => $paciente)
     {
         
     
    
    ?>
    
    <?php 

require_once "validador_acesso.php";

?>

<html lang="pt-br">

  <head>

 

    <meta charset="utf-8" />

    <title>Receitas Ipanema </title>



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">



    <!-- Font Awesome -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  

    <style>

      .card-abrir-chamado {

        padding: 30px 0 0 0;

        width: 100%;

        margin: 0 auto;

      }

    </style>

  </head>



  <body>


   



    <div class="container">    

      <div class="row">



        <div class="card-abrir-chamado">

          <div class="card">

          

            <div class="card-body">

              <div class="row">

             


                  

                <div class="col-12">

                  

                  <form method="post">

fefe

                



                    <div class="form-group">

                      <label>Nome</label>

                      <input name="nome" type="text" class="form-control"  value="<?php echo $paciente->nome; ?>" readonly>
                      
                    </div>

                    <div class="form-group">

                    <label>Idade</label>

                    <input readonly name="idade" type="text" class="form-control" value="<?php echo $paciente->idade; ?>"  style="border: 1px  3px solid yellow;">

                    </div>

                    



                    

                    <div class="table-responsive table-bordered">

          <table class="table">

            <thead class="thead-dark">

        <tr>

        <th>OLHO</th>

        <th>ESFÉRICO</th>

        <th>CILINDRICO</th>

        <th>EIXO</th>

        </tr>

        </thead>

      <tbody>

        <tr>

            <td style="color: red;">0D</td>

            <td> <input readonly name="od-esferico" type="text" class="form-control" value="<?php echo $paciente->olho_direito_esferico; ?>"></td>

            <td> <input readonly name="od-cilindrico" type="text" class="form-control"  value="<?php echo $paciente->olho_direito_cilindrico; ?>"></td>

            <td> <input readonly name="od-eixo" type="text" class="form-control"  value="<?php echo $paciente->olho_direito_eixo; ?>"></td>

        </tr>



        <tr>

            <td style="color: red;">OE</td>

            <td> <input readonly name="oe-esferico" type="text" class="form-control"  value="<?php echo $paciente->olho_esquerdo_esferico; ?>"></td>

            <td> <input readonly name="oe-cilindrico" type="text" class="form-control"  value="<?php echo $paciente->olho_esquerdo_cilindrico; ?>"></td>

            <td> <input readonly name="oe-eixo" type="text" class="form-control"  value="<?php echo $paciente->olho_esquerdo_eixo; ?>"></td>

        </tr>

        </tbody>



    </table>

                    </div>



                    <div class="form-group">

                      <label>Adição</label>

                      <input readonly type="text" class="form-control" name="adicao" value="<?php echo $paciente->adicao; ?>">

                    </div>

  

                    <div class="form-group">

                      <label>Descrição</label>

                      <textarea readonly name="descricao" class="form-control" rows="3"><?php echo $paciente->descricao; ?></textarea>

                    </div>



                   

                  </form>



                </div>

              </div>

            </div>

          </div>

        </div>

    </div>

  </body>
    
<?php
     }
    }
    ?>
