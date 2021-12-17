<?php 

require_once "validador_acesso.php";

 // echo $_SESSION['perfil_id']

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

     #adicionar{

       color: green;

     

     }

      img{

        background-color: transparent;

      }

      .card-home {

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

        Thiago Jacober

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



        <div class="card-home">

          <div class="card">

            <div class="card-header">

              Menu

            </div>

            <div class="card-body">

              <div class="row">



      <?php  if($_SESSION['perfil_id'] == 1) { ?>



                <div class="col-3 d-flex justify-content-center">

                  <a href="receita.php">

                  <i id="adicionar" class=" fas fa-user-plus fa-7x"></i><p>Adicionar novo cliente</p>

                  </a>

                </div>

                <div class="col-3 d-flex justify-content-center">

                <a href="consultar_receitas.php?acao=recuperarM">

                <i id="ver" class="text-danger fas fa-search fa-7x"></i><p>Monte mor</p>

                </a>

                </div>

                <div class="col-3 d-flex justify-content-center">

                <a href="consultar_receitas.php?acao=recuperarC">

                <i id="ver" class="text-dark fas fa-search fa-7x"></i><p>Capivari</p>
                  </a>

                  </div>

                  <div class="col-3 d-flex justify-content-center">

<a href="consultar_receitas.php?acao=recuperarCl">

<i id="ver" class="text-secondary fas fa-search fa-7x"></i><p>Clientes</p>
  </a>

  </div>
               

      <?php  }; ?>


      <?php  if($_SESSION['perfil_id'] == 2) { ?>
                <div class="col-6 d-flex justify-content-center">

                   <a href="consultar_receitas.php?acao=recuperarM">

                   <i id="ver" class="fas fa-search fa-7x"></i><p>Monte mor</p>

                  </a>

                </div>
                <?php } ?>

                <?php  if($_SESSION['perfil_id'] == 3) { ?>
                <div class="col-6 d-flex justify-content-center">

              <a href="consultar_receitas.php?acao=recuperarC">

              <i id="ver" class="fas fa-search fa-7x"></i><p>Capivari</p>
                </a>

                </div>
                <?php } ?>

                <?php  if($_SESSION['perfil_id'] == 4) { ?>
                <div class="col-12 d-flex justify-content-center">

              <a href="consultar_receitas.php?acao=recuperarCl">

              <i id="ver" class="fas fa-search fa-7x"></i><p>Receitas</p>
                </a>

                </div>
                <?php } ?>

              </div>

            </div>

          </div>

        </div>

    </div>

  </body>

</html>