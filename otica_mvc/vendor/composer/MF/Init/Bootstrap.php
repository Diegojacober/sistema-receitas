<?php 

namespace MF\Init;

abstract Class Bootstrap{
    

    private $routes;


    abstract protected function initRoutes();

    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    public function getRoutes()
    {
        return $this->routes;
    }
    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    protected function run($url){
        foreach($this->getRoutes() as $key => $route)
        {
            if($url == $route['route'])
            {
                //uc first é para colocar a primeira letra em maisculo por causa do nome
                $class = "App\\Controller\\".ucfirst($route['controller']);

                //o $class é igual o App\controller\Indexcontroller
                $controller = new $class;
                $action = $route['action'];
                $controller->$action();
            }
        }
    }

    public function getUrl(){
        //$_SERVER[]
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}

?>