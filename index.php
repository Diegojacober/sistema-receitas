

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
      body{
        background-color:ivory;
      }
      .card-login {
      
        
        box-shadow: 2px 2px 15px royalblue;
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
        margin-top: 25px;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
      <i class="fas fa-glasses "></i>
        Otica Ipanema
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="valida_login.php" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <?php if(isset($_GET['login']) && $_GET['login'] == 'erro'){?>

                <div class="text-danger">
                  Usuário ou senha inválido(s)
                </div>

                <?php } ?>
                <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2'){?>

                <div class="text-danger">
                  Por favor, faça login antes de acessar as páginas protegidas
                </div>

                <?php } ?>

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>