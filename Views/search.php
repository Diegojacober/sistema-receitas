<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="utf-8" />
    <title>Receitas Thiago </title>
    <link rel="icon" href="./opto.ico">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <link rel="stylesheet" href="./CSS/consulta.css">
</head>

<body>
<?php
session_start();
if(isset($_SESSION['logado']) && $_SESSION['logado'] == true && isset($_SESSION['pesquisa']) && $_SESSION['pesquisa'] != '')
{
    $resultados = $_SESSION['pesquisa'];
    ?>

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
      <main class="container">

      <?php foreach ($resultados as $dado) :  ?>
                <div class="cardd">
                    <div class="card-head">
                        <h4><?= $dado['nome'] ?>, <?= $dado['idade'] ?> anos</h4>
                        <small><?= $dado["DATE_FORMAT(data_cadastrado, '%d/%m/%Y ')"] ?></small>
                    </div>

                    <div class="card-body-edit">
                        <div class="table-responsive tabela">

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

                                        <td style="color: red;">OD</td>

                                        <td> <?= $dado['olho_direito_esferico'] ?></td>

                                        <td> <?= $dado['olho_direito_cilindrico'] ?></td>

                                        <td> <?= $dado['olho_direito_eixo'] ?></td>

                                    </tr>

                                    <tr>

                                        <td style="color: red;">OE</td>

                                        <td> <?= $dado['olho_esquerdo_esferico'] ?></td>

                                        <td> <?= $dado['olho_esquerdo_cilindrico'] ?></td>

                                        <td> <?= $dado['olho_esquerdo_eixo'] ?></td>

                                    </tr>

                                </tbody>



                            </table>

                        </div>

                        <div class="adicao">Adição: <p><?= $dado['adicao'] ?></p>
                        </div>
                        <div class="descricao"><?= $dado['descricao'] ?></div>
                    </div>
                <br><br>
                    <div class="botoes">

                        <a target="_blank" href="../receitaimpressa.php?descricao=<?= $dado['descricao']; ?>&nome=<?= $dado['nome'] ?>&idade=<?= $dado['idade'] ?>&data=<?= $dado["DATE_FORMAT(data_cadastrado, '%d/%m/%Y ')"] ?>&adicao=<?= $dado['adicao'] ?>&od_esferico=<?= $dado['olho_direito_esferico'] ?>&od_cilindrico=<?= $dado['olho_direito_cilindrico'] ?>&od_eixo=<?= $dado['olho_direito_eixo'] ?>&oe_esferico=<?= $dado['olho_esquerdo_esferico'] ?>&oe_cilindrico=<?= $dado['olho_esquerdo_cilindrico'] ?>&oe_eixo=<?= $dado['olho_esquerdo_eixo'] ?>" title="Imprimir Receita" class="print"><i class="fa fa-print text-success" aria-hidden="true"></i></a>
                        <?php if($_SESSION['userid'] == 1): ?>
                        <a href="./edit.php?id=<?=$dado['id']?>&nome=<?= $dado['nome'] ?>&idade=<?= $dado['idade'] ?>&data=<?= $dado["DATE_FORMAT(data_cadastrado, '%d/%m/%Y ')"] ?>&adicao=<?= $dado['adicao'] ?>&od_esferico=<?= $dado['olho_direito_esferico'] ?>&od_cilindrico=<?= $dado['olho_direito_cilindrico'] ?>&od_eixo=<?= $dado['olho_direito_eixo'] ?>&oe_esferico=<?= $dado['olho_esquerdo_esferico'] ?>&oe_cilindrico=<?= $dado['olho_esquerdo_cilindrico'] ?>&oe_eixo=<?= $dado['olho_esquerdo_eixo'] ?>&descricao=<?= $dado['descricao'] ?>"  rel="modal:open"  title="Editar Receita" class="edit"><i class="fas fa-edit text-info"></i></a>
                        <a onclick="return confirm('Tem certeza que deseja excluir a Receita?')" href="../Controllers/ReceitaController.php?delete=<?=$dado['id']; ?>" title="DELETAR dado" class="delete"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endforeach; ?>

      </main>

        <?php }
else{
    echo '<div align="center" "><B>PÁGINA RESTRITA - RESTRICT PAGE</B></div>';
}
?>
</body>

</html>

