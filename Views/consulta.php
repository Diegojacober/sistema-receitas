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
    // echo '<pre>';
    // print_r($_SESSION['receitas']);
    // echo '</pre>';
    $paginaativa = $_SESSION['pagina_ativa'];
    $cidade = $_SESSION['cidade'];
    $total_de_paginas = $_SESSION['total_de_paginas'];
    $receitas = $_SESSION['receitas'];
    if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) { ?>

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

            <div class="pesquisa">
                <form target="_blank" action="../Controllers/ReceitaController.php?pesquisa=true&cidadepesquisa=<?= $_SESSION['cidade'];?>" method="post">
                    <input type="text" name="pesquisa" id="campo" placeholder="Pesquise um cliente">
                    <button type="submit" class="botao"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>

            <?php foreach ($receitas as $indice => $receita) :  ?>
                <div class="cardd">
                    <div class="card-head">
                        <h4><?= $receita['nome'] ?>, <?= $receita['idade'] ?> anos</h4>
                        <small><?= $receita["DATE_FORMAT(data_cadastrado, '%d/%m/%Y ')"] ?></small>

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

                                        <td> <?= $receita['olho_direito_esferico'] ?></td>

                                        <td> <?= $receita['olho_direito_cilindrico'] ?></td>

                                        <td> <?= $receita['olho_direito_eixo'] ?></td>

                                    </tr>



                                    <tr>

                                        <td style="color: red;">OE</td>

                                        <td> <?= $receita['olho_esquerdo_esferico'] ?></td>

                                        <td> <?= $receita['olho_esquerdo_cilindrico'] ?></td>

                                        <td> <?= $receita['olho_esquerdo_eixo'] ?></td>

                                    </tr>

                                </tbody>



                            </table>

                        </div>

                        <div class="adicao">Adição: <p><?= $receita['adicao'] ?></p>
                        </div>
                        <div class="descricao"><?= $receita['descricao'] ?></div>
                    </div>
                <br><br>
                    <div class="botoes">

                        <a target="_blank" href="../receitaimpressa.php?descricao=<?= $receita['descricao']; ?>&nome=<?= $receita['nome'] ?>&idade=<?= $receita['idade'] ?>&data=<?= $receita["DATE_FORMAT(data_cadastrado, '%d/%m/%Y ')"] ?>&adicao=<?= $receita['adicao'] ?>&od_esferico=<?= $receita['olho_direito_esferico'] ?>&od_cilindrico=<?= $receita['olho_direito_cilindrico'] ?>&od_eixo=<?= $receita['olho_direito_eixo'] ?>&oe_esferico=<?= $receita['olho_esquerdo_esferico'] ?>&oe_cilindrico=<?= $receita['olho_esquerdo_cilindrico'] ?>&oe_eixo=<?= $receita['olho_esquerdo_eixo'] ?>" title="Imprimir Receita" class="print"><i class="fa fa-print text-success" aria-hidden="true"></i></a>
                      <?php if($_SESSION['userid'] == 1): ?>
                        <a href="./edit.php?id=<?=$receita['id']?>&nome=<?= $receita['nome'] ?>&idade=<?= $receita['idade'] ?>&data=<?= $receita["DATE_FORMAT(data_cadastrado, '%d/%m/%Y ')"] ?>&adicao=<?= $receita['adicao'] ?>&od_esferico=<?= $receita['olho_direito_esferico'] ?>&od_cilindrico=<?= $receita['olho_direito_cilindrico'] ?>&od_eixo=<?= $receita['olho_direito_eixo'] ?>&oe_esferico=<?= $receita['olho_esquerdo_esferico'] ?>&oe_cilindrico=<?= $receita['olho_esquerdo_cilindrico'] ?>&oe_eixo=<?= $receita['olho_esquerdo_eixo'] ?>&descricao=<?= $receita['descricao'] ?>"  rel="modal:open"  title="Editar receita" class="edit"><i class="fas fa-edit text-info"></i></a>
                        <a onclick="return confirm('Tem certeza que deseja excluir a receita?')" href="../Controllers/ReceitaController.php?delete=<?=$receita['id']; ?>" title="DELETAR RECEITA" class="delete"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endforeach; ?>


            <div class="row mt-5 ml-4">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item  <?= $paginaativa == $i ? 'active' : '' ?>">
                            <a class="page-link " href="../Controllers/ReceitaController.php?cidade=<?= $cidade ?>&pagina=1" tabindex="-1">Primeira</a>
                        </li>
                        <?php for ($i = 1; $i <= $total_de_paginas; $i++) { ?>
                            <li class="page-item <?= $paginaativa == $i ? 'active' : '' ?>"><a class="page-link" href="../Controllers/ReceitaController.php?cidade=<?= $cidade ?>&pagina=<?php echo $i; ?>"><?= $i ?></a></li>
                        <?php } ?>
                        <li class="page-item <?= $paginaativa == $i ? 'active' : '' ?>">
                            <a class="page-link " href="../Controllers/ReceitaController.php?cidade=<?= $cidade ?>&pagina=<?php echo $total_de_paginas; ?>">Ultima</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </main>

    <?php } else {
        echo '<div align="center" "><B>PÁGINA RESTRITA - RESTRICT PAGE</B></div>';
    }
    ?>
</body>

</html>