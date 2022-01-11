

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

    <link rel="stylesheet" href="./CSS/home.css">
</head>

<body>
<?php
session_start();
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

    <div class="card-home">

        <div class="card">

            <div class="card-header">

                Menu

            </div>

            <div class="card-body">

                <div class="itens">

                <?php if($_SESSION['userid'] == 1): ?>
                    <div class="item">
                        <a href="../Views/receita.php" >
                            <i id="adicionar" class=" fas fa-user-plus fa-7x text-success"></i>
                            <p>Adicionar novo cliente</p>
                        </a>
                    </div>
                    <?php endif; ?>

                 <?php if($_SESSION['userid'] == 1 || $_SESSION['userid'] == 2): ?>
                    <div class="item">
                        <a href="../Controllers/ReceitaController.php?cidade=montemor">
                            <i id="ver" class="text-dark fas fa-search fa-7x"></i>
                            <p>Monte mor</p>
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php if($_SESSION['userid'] == 1 || $_SESSION['userid'] == 3): ?>
                    <div class="item">

                        <a href="../Controllers/ReceitaController.php?cidade=capivari">

                            <i id="ver" class="text-light fas fa-search fa-7x"></i>
                            <p>Capivari</p>
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php if($_SESSION['userid'] == 1 || $_SESSION['userid'] == 4): ?>
                    <div class="item">

                        <a href="../Controllers/ReceitaController.php?cidade=outros">

                            <i id="ver" class="text-info fas fa-search fa-7x"></i>
                            <p>Outros</p>
                        </a>

                    </div>
                    <?php endif; ?>








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

