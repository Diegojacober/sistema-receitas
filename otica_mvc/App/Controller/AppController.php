<?php


namespace App\Controller;

use App\Model\Paciente;
use App\Model\Usuario;
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{
    public function homeadm(){
        session_start();
        $this->render('home','Layout.phtml');
    }
    public function homem(){
        session_start();
        $this->render('homem','Layout.phtml');
    }
    public function homec(){
        session_start();
        $this->render('homec','Layout.phtml');
    }
    public function adicionar(){
         session_start();
        $_SESSION['id'] = $_GET['id'];
        if($_SESSION['id'] == 1)
        {   

          $this->render('receita','Layout.phtml');
        }
        else{
            header('Location: /?login=erro');
        }
 
      

     
    }
    public function inserir(){
       
        session_start();
        $paciente = Container::getModel('Paciente');

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

      

        $paciente->salvar();

        header('Location: /adicionar?id=1&&sucesso');

    }

    public function recuperarMontemor()
    {
        session_start();
        $paciente = Container::getModel('Paciente');

        $total_registros_pagina = 2;
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1 ;
        $deslocamento = ($pagina - 1) * $total_registros_pagina;
       

        $pacientes = $paciente->getPorPagina($total_registros_pagina,$deslocamento,1);
        $this->view->pagina_ativa = $pagina;
        $this->view->pacientes = $pacientes;
        $total_pacientes = $paciente->getTotalregistros(1);
        $this->view->total_de_paginas = ceil($total_pacientes['total']/$total_registros_pagina);

      
        $this->render('receitasM','Layout.phtml');


    }
    public function recuperarCapivari()
    {
        session_start();
        $paciente = Container::getModel('Paciente');

        $total_registros_pagina = 8;
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1 ;
        $deslocamento = ($pagina - 1) * $total_registros_pagina;
        $this->view->pagina_ativa = $pagina;

        $pacientes = $paciente->getPorPagina($total_registros_pagina,$deslocamento,2);
        $this->view->pagina_ativa = $pagina;
        $this->view->pacientes = $pacientes;
        $total_pacientes = $paciente->getTotalregistros(2);
        $this->view->total_de_paginas = ceil($total_pacientes['total']/$total_registros_pagina);

      
        $this->render('receitasC','Layout.phtml');


    }

    public function pesquisarcapivari(){
        session_start();
        $paciente = Container::getModel('Paciente');

       $pacientes =  $paciente->pesquisarC();
       $this->view->pacientes = $pacientes;
        $this->render('pesquisarcapivari','layout1.phyml');
     
      
    }
    public function pesquisarmontemor(){
        session_start();
        $paciente = Container::getModel('Paciente');

       $pacientes =  $paciente->pesquisarM();
       $this->view->pacientes = $pacientes;
        $this->render('pesquisarmontemor','layout1.phyml');
    }
    public function pesquisartudo(){
        session_start();
        $paciente = Container::getModel('Paciente');

       $pacientes =  $paciente->pesquisarTD();
       $this->view->pacientes = $pacientes;
        $this->render('pesquisar','layout1.phyml');
    }
}