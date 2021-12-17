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

  <?php 
		if(isset($_GET['sucesso']))
		{
			echo '<div style="padding:5px;text-align:center;color:whitesmoke;font-size:1.2em;" class="bg-success">RECEITA INSERIDA COM SUCESSO!</div>';
		}
	?>

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

                  

                  <form method="post" action="paciente_controller.php?acao=inserir">



                  <div class="form-group mb-3">

                      <label>Cidade</label>

                      <select style="border: 2px solid red;background-color:black;color:white;" name="cidade" class="form-control">

                        <option value="1">Monte Mor</option>

                        <option value="2">Capivari</option>
                        <option value="3">Clientes</option>

                        </select>

    </div>



                    <div class="form-group">

                      <label>Nome</label>

                      <input name="nome" type="text" class="form-control" placeholder="Nome">

                    </div>

                    <div class="form-group">

                    <label>Idade</label>

                    <input required name="idade" type="text" class="form-control" placeholder="idade" style="border: 1px  3px solid yellow;">

                    </div>

                    

                    <div class="form-group">
                                          <label>Data</label>

                      <input readonly name="data" type="text" class="form-control" value="<?php echo date("d").'/'. date("m").'/'.  date("Y"); ?>">

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

            <td> <input name="od-esferico" type="text" class="form-control" placeholder="grau"></td>

            <td> <input name="od-cilindrico" type="text" class="form-control" placeholder="grau"></td>

            <td> <input name="od-eixo" type="text" class="form-control" placeholder="eixo"></td>

        </tr>



        <tr>

            <td style="color: red;">OE</td>

            <td> <input name="oe-esferico" type="text" class="form-control" placeholder="grau"></td>

            <td> <input name="oe-cilindrico" type="text" class="form-control" placeholder="grau"></td>

            <td> <input name="oe-eixo" type="text" class="form-control" placeholder="eixo"></td>

        </tr>

        </tbody>



    </table>

                    </div>



                    <div class="form-group">

                      <label>Adição</label>

                      <select name="adicao" class="form-control">

                        <option>+0,00</option>

                        <option>+0,25</option>

                        <option>+0,50</option>

                        <option>+1,00</option>

                        <option>+1,25</option>

                        <option>+1,50</option>

                        <option>+1,75</option>

                        <option>+2,00</option>

                        <option>+2,25</option>

                        <option>+2,50</option>

                        <option>+2,75</option>

                        <option>+3,00</option>

                        <option>+3,25</option>

                        <option>+3,50</option>

                        <option>+3,75</option>

                        <option>+4,00</option>

                        <option>+4,25</option>

                        <option>+4,50</option>

                        <option>+4,75</option>

                        <option>+5,00</option>

                        <option>+5,25</option>

                        <option>+5,50</option>

                        <option>+5,75</option>

                        <option>+6,00</option>

                        <option>+6,25</option>

                        <option>+6,50</option>

                        <option>+6,75</option>

                        <option>+7,00</option>

                        <option>+7,25</option>

                        <option>+7,50</option>

                        <option>+8,00</option>

                      </select>

                    </div>

  

                    <div class="form-group">

                      <label>Descrição</label>

                      <textarea name="descricao" class="form-control" rows="3">-</textarea>

                    </div>



                    <div class="row mt-5">

                      <div class="col-6">

                        <a href="home.php" class="btn btn-lg btn-outline-warning btn-block">Voltar</a>

                      </div>



                      <div class="col-6">

                        <button class="btn btn-lg btn-outline-success btn-block" type="submit">Adicionar</button>

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