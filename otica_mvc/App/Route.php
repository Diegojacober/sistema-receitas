<?php 
namespace App;
//parao autoload funcionar

use MF\Init\Bootstrap;
class Route extends Bootstrap{

   protected function initRoutes()
    {
        $routes['index'] = array(
            'route' => '/',
            'controller'=>'indexController',
            'action' => 'index'
        );
        $routes['homeADM'] = array(
            'route' => '/homeADM',
            'controller'=>'AppController',
            'action' => 'homeadm'
        );
        $routes['home'] = array(
            'route' => '/home',
            'controller'=>'AppController',
            'action' => 'homem'
        );
        $routes['homec'] = array(
            'route' => '/homec',
            'controller'=>'AppController',
            'action' => 'homec'
        );
        $routes['autenticar'] = array(
            'route' => '/autenticar',
            'controller'=>'AuthController',
            'action' => 'autenticar'
        );
        $routes['sair'] = array(
            'route' => '/sair',
            'controller'=>'AuthController',
            'action' => 'sair'
        );
        $routes['adicionar'] = array(
            'route' => '/adicionar',
            'controller'=>'AppController',
            'action' => 'adicionar'
        );
        $routes['inserir'] = array(
            'route' => '/inserir',
            'controller'=>'AppController',
            'action' => 'inserir'
        );
        $routes['recuperaar'] = array(
            'route' => '/recuperaar',
            'controller'=>'AppController',
            'action' => 'recuperarMontemor'
        );
        $routes['recuperarc'] = array(
            'route' => '/recuperarc',
            'controller'=>'AppController',
            'action' => 'recuperarCapivari'
        );
        $routes['pesquisarcapivari'] = array(
            'route' => '/pesquisarcapivari',
            'controller'=>'AppController',
            'action' => 'pesquisarcapivari'
        );
        $routes['pesquisarmontemor'] = array(
            'route' => '/pesquisarmontemor',
            'controller'=>'AppController',
            'action' => 'pesquisarmontemor'
        );
        $routes['pesquisar'] = array(
            'route' => '/pesquisar',
            'controller'=>'AppController',
            'action' => 'pesquisartudo'
        );

       

        
        $this->setRoutes($routes);
    }

    
}

?>