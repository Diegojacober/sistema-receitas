

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8" />
    <title>Receitas Thiago </title>
    <link rel="icon" href="./opto.ico">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="./CSS/receita.css">
</head>

<body>
<?php
session_start();
date_default_timezone_set('america/sao_paulo');
if(isset($_SESSION['logado']) && $_SESSION['logado'] == true)
{?>

    <nav class="navbar navbar-dark bg-dark">

        <a class="navbar-brand" href="#">
  
        <i class="fas fa-glasses "></i>
  
          Thiago Jacober
  
        </a>
  
        <ul class="navbar-nav">
  
          <li class="nav-item">
  
            <a href="../Controllers/LoginController.php?logoff=true" class="nav-link">
  
            SAIR
  
            </a>
  
          </li>
  
        </ul>
  
      </nav>

      <div class="card-nova-receita">

<div class="card">

    <div class="card-header">

        Novo cliente

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col">

                <?php if(isset($_SESSION['aviso']) && $_SESSION['aviso'] != ''): ?>
                    <div class="aviso"><?= $_SESSION['aviso']; ?></div>
                <?php $_SESSION['aviso'] = ''; endif; ?>

                <form method="post" action="../Controllers/ReceitaController.php?new=true">



                    <div class="form-group mb-3">

                        <label>Cidade:</label>

                        <select style="border: 1px solid red;background-color:rgb(238, 190, 190);" name="cidade"
                            class="form-control">

                            <option value="1">Monte Mor</option>
                            <option value="2">Capivari</option>
                            <option value="3">Clientes</option>

                        </select>

                    </div>



                    <div class="form-group">

                        <label>Nome:</label>

                        <input name="nome" type="text" class="form-control" placeholder="Nome">

                    </div>

                    <div class="form-group">

                        <label for="idade">Idade: <input required name="idade" type="text" class="form-control"
                                placeholder="idade" style="border: 1px  3px solid yellow;">
                        </label>
                    </div>



                    <div class="form-group">
                        <label>Data:</label>

                        <input readonly name="data" type="text" class="form-control" value="<?php echo date('d/m/Y H:i:s'); ?>">

                    </div>



                    <div class="table-responsive ">

                        <table class="table table-bordered">

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

                                    <td> <select name="od-esferico" class="form-control">

                                       
                                    <?php
                                        for($g = -25.00; $g < 0;$g += 0.25){
                                            echo '<option>'.number_format($g,2,',')."</option>";
                                        } 
                                    ?>
                                           <option selected=selected>0,00</option>
                                            <?php
                                        for($g = 0.25; $g <= 25; $g += 0.25){
                                            echo '<option>+'.number_format($g,2,',')."</option>";
                                        } 
                                    ?>
                                        </select></td>

                                    <td> <select name="od-cilindrico" class="form-control">

                                    <?php
                                        for($g = -25.00; $g < 0;$g += 0.25){
                                            echo '<option>'.number_format($g,2,',')."</option>";
                                        } 
                                    ?>
                                            <option selected=selected>0,00</option>
                                        </select></td>

                                    <td> <input name="od-eixo" type="text" class="form-control"
                                            placeholder="eixo"></td>

                                </tr>



                                <tr>

                                    <td style="color: red;">OE</td>

                                    <td> <select name="oe-esferico" class="form-control">

                                          
                                    <?php
                                        for($g = -25.00; $g < 0;$g += 0.25){
                                            echo '<option>'.number_format($g,2,',')."</option>";
                                        } 
                                    ?>
                                           <option selected=selected>0,00</option>
                                            <?php
                                        for($g = 0.25; $g <= 25; $g += 0.25){
                                            echo '<option>+'.number_format($g,2,',')."</option>";
                                        } 
                                    ?>
                                        </select></td>

                                    <td> <select name="oe-cilindrico" class="form-control">

                                    <?php
                                        for($g = -25.00; $g < 0;$g += 0.25){
                                            echo '<option>'.number_format($g,2,',')."</option>";
                                        } 
                                    ?>
                                            <option selected=selected>0,00</option>
                                        </select></td>

                                    <td> <input name="oe-eixo" type="text" class="form-control"
                                            placeholder="eixo"></td>

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

                            <a href="../Views/home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>

                        </div>



                        <div class="col-6">

                            <button class="btn btn-lg btn-success btn-block" type="submit">Adicionar</button>

                        </div>

                    </div>

                </form>



            </div>

        </div>

    </div>

</div>

</div>

</div>

        <?php }
else{
    echo '<div align="center" "><B>PÁGINA RESTRITA - RESTRICT PAGE</B></div>';
}
?>
</body>

</html>

