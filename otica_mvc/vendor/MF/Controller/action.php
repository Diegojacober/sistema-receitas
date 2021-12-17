<?php

namespace MF\Controller;


abstract class Action{
    protected $view;

    
    public function __construct()
    {
        $this->view = new \stdClass();
        //classe para criar objetos vazios 
    }


    protected function render($view,$layout)
    {
        $this->view->page = $view;

        if(file_exists("../App/view/".$layout.".phtml")){
            require_once "../App/view/".$layout.".phtml";
            //varios layouts posso criar varios temas
        }
        else{
            $this->content();
        }
        
        
      
    }

    protected function content(){
        $classe_atual = get_class($this);

        $classe_atual = str_replace('App\\Controller\\','',$classe_atual);
        
         $classe_atual = strtolower(str_replace('Controller','',$classe_atual));
 
 
        require_once "../App/View/".$classe_atual."/".$this->view->page.".phtml";
    }
}
?>