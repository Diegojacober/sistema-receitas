<?php 

require_once "validador_acesso.php";
require_once "./paciente_controller.php";

$acao = 'recuperar';



?>

<html lang="pt-br">

  <head>

 

    <meta charset="utf-8" />

    <title>Receitas Thiago </title>



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
    window.open (`paciente_controller.php?acao=ver&id=${id}`,'_blank')
    }

    function pesquisar()
    {
      let nome = document.getElementById('pesquisa').value
      location.href = 'paciente_controller.php?acao=pesquisarM&nome='+nome;
    }

    function pesquisarCa()
    {
      let nome = document.getElementById('pesquisa').value
      location.href = 'paciente_controller.php?acao=pesquisarC&nome='+nome;
    }
    
    function pesquisarCl()
    {
      let nome = document.getElementById('pesquisa').value
      location.href = 'paciente_controller.php?acao=pesquisarCl&nome='+nome;
    }

    function pesquisarTD()
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

      <?php if($_SESSION['perfil_id'] == 2 ){ ?>

      <div class="mt-5">
      <div class="input-group mb-2">
       
        <input type="text" name="nomeP" id="pesquisa" class="form-control" placeholder="Nome">
        <div class="input-group-append">
          <div class="input-group-text"><a target="_blank" onclick="pesquisar()"><i class="fas fa-search fa-lg"></i></a></div>
        </div>
      </div>
    </div>
											<?php } ?>

    <?php if($_SESSION['perfil_id'] == 3 ){ ?>
 
      <div class="mt-5">
      <div class="input-group mb-2">
       
        <input type="text" name="nomeP" id="pesquisa" class="form-control" placeholder="Nome">
        <div class="input-group-append">
          <div class="input-group-text"><a target="_blank" onclick="pesquisarCa()"><i class="fas fa-search fa-lg"></i></a></div>
        </div>
      </div>
    </div>
											<?php } ?>
                      <?php if($_SESSION['perfil_id'] == 4 ){ ?>

<div class="mt-5">
<div class="input-group mb-2">
 
  <input type="text" name="nomeP" id="pesquisa" class="form-control" placeholder="Nome">
  <div class="input-group-append">
    <div class="input-group-text"><a target="_blank" onclick="pesquisarCl()"><i class="fas fa-search fa-lg"></i></a></div>
  </div>
</div>
</div>
                <?php } ?>

                      <?php if($_SESSION['perfil_id'] == 1 ){ ?>
 
 <div class="mt-5">
 <div class="input-group mb-2">
  
   <input type="text" name="nomeP" id="pesquisa" class="form-control" placeholder="Nome">
   <div class="input-group-append">
     <div class="input-group-text"><a target="_blank" onclick="pesquisarTD()"><i class="fas fa-search fa-lg"></i></a></div>
   </div>
 </div>
</div>
                 <?php } ?>

        <div class="card-consultar-chamado">

          <div class="card">

            <div class="card-header">

              <p>Clientes</p>

              

            </div>

            

            <div class="card-body">

              

            <?php foreach($pacientes as $indice => $paciente){

              ?>

        



              <div class="card mb-5 bg-light">

                <div class="card-body um">

              <!-- <h4 style="color: red;" class="card-title"><?php echo $paciente->nome; ?></h4> --->

                  <h5 style="color: black;" class="card-title"><?php echo " $paciente->nome ,$paciente->idade Anos "; ?></h5>

                  <h6 style="color: black;" class="card-title"><?php  echo $paciente->data; ?></h6>





                 

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

              <?php } ?>



              <div class="row mt-5">

                <div class="col-6">

                  <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

      <?php if($_SESSION['perfil_id'] == 1 && $_GET['acao'] == 'recuperarM' ){ ?>
      <div class="row mt-5">
          <div class="col-12">
		<nav aria-label="...">
		<ul class="pagination">
			<li class="page-item  <?=$pagina_ativa == $i ? 'active' : '' ?>">
			<a class="page-link " href="?acao=recuperarM&pagina=1" tabindex="-1">Primeira</a>
			</li>
			<?php for($i =1; $i <= $total_de_paginas; $i++)
			{ ?>
			<li class="page-item <?=$pagina_ativa == $i ? 'active' : '' ?>"><a class="page-link" href="?acao=recuperarM&pagina=<?php echo $i;?>"><?= $i ?></a></li>
			<?php } ?>
			<li class="page-item <?=$pagina_ativa == $i ? 'active' : '' ?>">
			<a class="page-link " href="?acao=recuperarM&pagina=<?php echo $total_de_paginas;?>">Ultima</a>
			</li>
		</ul>
		</nav>
		</div>
        </div>
        <?php } ?>

        <?php if($_SESSION['perfil_id'] == 1 && $_GET['acao'] == 'recuperarC' ){ ?>
      <div class="row mt-5">
          <div class="col-12">
		<nav aria-label="...">
		<ul class="pagination">
			<li class="page-item  <?=$pagina_ativa == $i ? 'active' : '' ?>">
			<a class="page-link " href="?acao=recuperarC&pagina=1" tabindex="-1">Primeira</a>
			</li>
			<?php for($i =1; $i <= $total_de_paginas; $i++)
			{ ?>
			<li class="page-item <?=$pagina_ativa == $i ? 'active' : '' ?>"><a class="page-link" href="?acao=recuperarC&pagina=<?php echo $i;?>"><?= $i ?></a></li>
			<?php } ?>
			<li class="page-item <?=$pagina_ativa == $i ? 'active' : '' ?>">
			<a class="page-link " href="?acao=recuperarC&pagina=<?php echo $total_de_paginas;?>">Ultima</a>
			</li>
		</ul>
		</nav>
		</div>
        </div>
        <?php } ?>

        <?php if($_SESSION['perfil_id'] == 1 && $_GET['acao'] == 'recuperarCl' ){ ?>
      <div class="row mt-5">
          <div class="col-12">
		<nav aria-label="...">
		<ul class="pagination">
			<li class="page-item  <?=$pagina_ativa == $i ? 'active' : '' ?>">
			<a class="page-link " href="?acao=recuperarCl&pagina=1" tabindex="-1">Primeira</a>
			</li>
			<?php for($i =1; $i <= $total_de_paginas; $i++)
			{ ?>
			<li class="page-item <?=$pagina_ativa == $i ? 'active' : '' ?>"><a class="page-link" href="?acao=recuperarCl&pagina=<?php echo $i;?>"><?= $i ?></a></li>
			<?php } ?>
			<li class="page-item <?=$pagina_ativa == $i ? 'active' : '' ?>">
			<a class="page-link " href="?acao=recuperarCl&pagina=<?php echo $total_de_paginas;?>">Ultima</a>
			</li>
		</ul>
		</nav>
		</div>
        </div>
        <?php } ?>

        <?php if($_SESSION['perfil_id'] == 2 ){ ?>
      <div class="row mt-5">
		<nav aria-label="...">
		<ul class="pagination">
			<li class="page-item  <?=$pagina_ativa == $i ? 'active' : '' ?>">
			<a class="page-link " href="?acao=recuperarM&pagina=1" tabindex="-1">Primeira</a>
			</li>
			<?php for($i =1; $i <= $total_de_paginas; $i++)
			{ ?>
			<li class="page-item <?=$pagina_ativa == $i ? 'active' : '' ?>"><a class="page-link" href="?acao=recuperarM&pagina=<?php echo $i;?>"><?= $i ?></a></li>
			<?php } ?>
			<li class="page-item <?=$pagina_ativa == $i ? 'active' : '' ?>">
			<a class="page-link " href="?acao=recuperarM&pagina=<?php echo $total_de_paginas;?>">Ultima</a>
			</li>
		</ul>
		</nav>
		</div>
        <?php } ?>

        <?php if( $_SESSION['perfil_id'] == 3){ ?>
      <div class="row mt-5">
		<nav aria-label="...">
		<ul class="pagination">
			<li class="page-item  <?=$pagina_ativa == $i ? 'active' : '' ?>">
			<a class="page-link " href="?acao=recuperarC&pagina=1" tabindex="-1">Primeira</a>
			</li>
			<?php for($i = 1; $i <= $total_de_paginas; $i++)
			{ ?>
			<li class="page-item <?=$pagina_ativa == $i ? 'active' : '' ?>"><a class="page-link" href="?acao=recuperarC&pagina=<?php echo $i;?>"><?= $i ?></a></li>
			<?php } ?>
			<li class="page-item <?=$pagina_ativa == $i ? 'active' : '' ?>">
			<a class="page-link " href="?acao=recuperarC&pagina=<?php echo $total_de_paginas;?>">Ultima</a>
			</li>
		</ul>
		</nav>
		</div>
        <?php } ?>

        <?php if( $_SESSION['perfil_id'] == 4){ ?>
      <div class="row mt-5">
		<nav aria-label="...">
		<ul class="pagination">
			<li class="page-item  <?=$pagina_ativa == $i ? 'active' : '' ?>">
			<a class="page-link " href="?acao=recuperarCl&pagina=1" tabindex="-1">Primeira</a>
			</li>
			<?php for($i = 1; $i <= $total_de_paginas; $i++)
			{ ?>
			<li class="page-item <?=$pagina_ativa == $i ? 'active' : '' ?>"><a class="page-link" href="?acao=recuperarCl&pagina=<?php echo $i;?>"><?= $i ?></a></li>
			<?php } ?>
			<li class="page-item <?=$pagina_ativa == $i ? 'active' : '' ?>">
			<a class="page-link " href="?acao=recuperarCl&pagina=<?php echo $total_de_paginas;?>">Ultima</a>
			</li>
		</ul>
		</nav>
		</div>
        <?php } ?>
    </div>

  </body>

</html>