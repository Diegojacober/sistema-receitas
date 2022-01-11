<?php

use BD\Conexao;
use FontLib\EOT\Header;

require_once "../Models/Receita.php";
require_once "../Controllers/Conexao.php";

session_start();
date_default_timezone_set('america/sao_paulo');
class ReceitaController
{
    public static function newReceita($data)
    {


        $cidade = filter_input(INPUT_POST, 'cidade');
        $nome = filter_input(INPUT_POST, 'nome');
        $idade = filter_input(INPUT_POST, 'idade');
        $odEsferico = filter_input(INPUT_POST, 'od-esferico');
        $odCilindrico = filter_input(INPUT_POST, 'od-cilindrico');
        $odEixo = filter_input(INPUT_POST, 'od-eixo');
        $oeEsferico = filter_input(INPUT_POST, 'oe-esferico');
        $oeCilindrico = filter_input(INPUT_POST, 'oe-cilindrico');
        $oeEixo = filter_input(INPUT_POST, 'oe-eixo');
        $adicao = filter_input(INPUT_POST, 'adicao');
        $descricao = filter_input(INPUT_POST, 'descricao');

        if ($oeEixo == '') {
            $oeEixo = '---';
        }
        if ($odEixo == '') {
            $odEixo = '---';
        }

        $conexao = new Conexao();
        $receita = new Receita($conexao);
        $receita->new($cidade, $nome, $idade, $data, $odEsferico, $odCilindrico, $odEixo, $oeEsferico, $oeCilindrico, $oeEixo, $adicao, $descricao);
    }

    // public static function editReceita($date, $id, $nome, $idade, $odEsferico, $odCilindrico, $odEixo, $oeEsferico, $oeCilindrico, $oeEixo, $adicao, $descricao)
    // {

    //     $conexao = new Conexao();
    //     $receita = new Receita($conexao);
    //     $receita->updateReceita($id, $nome, $idade, $date, $odEsferico, $odCilindrico, $odEixo, $oeEsferico, $oeCilindrico, $oeEixo, $adicao, $descricao);
    // }

    public static function recuperarReceitas($idCidade, $pagina, $deslocamento)
    {

        $conexao = new Conexao();
        $receitas = new Receita($conexao);
        return $receitas->recuperar($idCidade, $pagina, $deslocamento);
    }
    public static function totalReceitas($idCidade)
    {
        $conexao = new Conexao();
        $receitas = new Receita($conexao);
        return $receitas->totalPorCidade($idCidade);
    }

    public static function delete($id)
    {
        $conexao = new Conexao();
        $receitas = new Receita($conexao);
        $receitas->delete($id);
    }
    public static function pesquisa($termo,$cidade){
        $conexao = new Conexao();
        $receitas = new Receita($conexao);
        $id = '';
        if($cidade == 'montemor')
        {
            $id = 1;
        }
        elseif($cidade == 'capivari')
        {
            $id = 2;
        }
        elseif($cidade == 'outros')
        {
            $id = 3;
        }
        return $receitas->search($termo,$id);
    }
}

if (isset($_GET['new']) && $_GET['new']  == true) {
    date_default_timezone_set('america/sao_paulo');
    $dataGravada = date('Y-m-d H:i:s');
    $insert = ReceitaController::newReceita($dataGravada);
    $_SESSION['aviso'] = 'Inserido Com Sucesso!';
    header('Location: ../Views/receita.php');
}

if (isset($_GET['cidade']) && $_GET['cidade']  != '') {



    $_SESSION['receitas'] = [];

    if ($_GET['cidade'] == 'montemor') {
        if ($_SESSION['userid'] == 1 || $_SESSION['userid'] == 2) {

            $pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
            $total_registros_pagina = 5;
            $deslocamento = ($pagina - 1) * $total_registros_pagina;
            $pagina_ativa = $pagina;
            $_SESSION['pagina_ativa'] = $pagina_ativa;
            $total_pacientes = ReceitaController::totalReceitas(1);
            $total_de_paginas = ceil($total_pacientes->total / $total_registros_pagina);
            $_SESSION['total_de_paginas'] = $total_de_paginas;

            $receitas = ReceitaController::recuperarReceitas(1, $total_registros_pagina, $deslocamento);

            $_SESSION['receitas'] = $receitas;
            $_SESSION['cidade'] = 'montemor';
            header('Location: ../Views/consulta.php');
        } else {
            header('Location: ../Views/home.php');
        }
    }
    if ($_GET['cidade'] == 'capivari') {
        if ($_SESSION['userid'] == 1 || $_SESSION['userid'] == 3) {

            $pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
            $total_registros_pagina = 5;
            $deslocamento = ($pagina - 1) * $total_registros_pagina;
            $pagina_ativa = $pagina;
            $_SESSION['pagina_ativa'] = $pagina_ativa;
            $total_pacientes = ReceitaController::totalReceitas(2);
            $total_de_paginas = ceil($total_pacientes->total / $total_registros_pagina);
            $_SESSION['total_de_paginas'] = $total_de_paginas;

            $receitas = ReceitaController::recuperarReceitas(2, $total_registros_pagina, $deslocamento);

            $_SESSION['receitas'] = $receitas;
            $_SESSION['cidade'] = 'capivari';
            header('Location: ../Views/consulta.php');
        } else {
            header('Location: ../Views/home.php');
        }
    }
    if ($_GET['cidade'] == 'outros') {
        if ($_SESSION['userid'] == 1 || $_SESSION['userid'] == 4) {

            $pagina = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
            $total_registros_pagina = 5;
            $deslocamento = ($pagina - 1) * $total_registros_pagina;
            $pagina_ativa = $pagina;
            $_SESSION['pagina_ativa'] = $pagina_ativa;
            $total_pacientes = ReceitaController::totalReceitas(3);
            $total_de_paginas = ceil($total_pacientes->total / $total_registros_pagina);
            $_SESSION['total_de_paginas'] = $total_de_paginas;

            $receitas = ReceitaController::recuperarReceitas(3, $total_registros_pagina, $deslocamento);

            $_SESSION['receitas'] = $receitas;
            $_SESSION['cidade'] = 'outros';
            header('Location: ../Views/consulta.php');
        } else {
            header('Location: ../Views/home.php');
        }
    }
}

//atualizei dessa maneira pois não estava funcionando usar a função editReceita() do controller
if (isset($_GET['edit']) && $_GET['edit'] != '') {
    $id = intval($_GET['edit']);

    $dataGravada = date('Y-m-d H:i:s');
    $nome = filter_input(INPUT_POST, 'nome');
    $idade = filter_input(INPUT_POST, 'idade');
    $odEsferico = filter_input(INPUT_POST, 'od_esferico');
    $odCilindrico = filter_input(INPUT_POST, 'od_cilindrico');
    $odEixo = filter_input(INPUT_POST, 'od_eixo');
    $oeEsferico = filter_input(INPUT_POST, 'oe_esferico');
    $oeCilindrico = filter_input(INPUT_POST, 'oe_cilindrico');
    $oeEixo = filter_input(INPUT_POST, 'oe_eixo');
    $adicao = filter_input(INPUT_POST, 'adicao');
    $descricao = filter_input(INPUT_POST, 'descricao');

    if ($oeEixo == '') {
        $oeEixo = '---';
    }
    if ($odEixo == '') {
        $odEixo = '---';
    }
    $conexao = new Conexao();
    $receita = new Receita($conexao);
    $receita->updateReceita($id, $nome, $idade, $dataGravada, $odEsferico, $odCilindrico, $odEixo, $oeEsferico, $oeCilindrico, $oeEixo, $adicao, $descricao);
     Header('Location: ./ReceitaController.php?cidade='.$_SESSION['cidade']);
}

if (isset($_GET['delete']) && $_GET['delete'] != '') {

    $id = intval($_GET['delete']);

    ReceitaController::delete($id);

    Header('Location: ./ReceitaController.php?cidade='.$_SESSION['cidade']);
}
if (isset($_GET['pesquisa']) && $_GET['pesquisa'] == true) {

    $termo = filter_input(INPUT_POST,'pesquisa',FILTER_SANITIZE_SPECIAL_CHARS);
    echo '<pre>';
    $results = ReceitaController::pesquisa($termo,$_GET['cidadepesquisa']);
    $_SESSION['pesquisa'] = $results;
    // echo '<pre>';
    // print_r($results);
   header('Location: ../Views/search.php');
}