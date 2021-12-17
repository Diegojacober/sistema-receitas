<?php

namespace MF\Model;
use App\Connection;

class Container {
    public static function getModel($model)
    {
        $class = "\\App\\Model\\".ucfirst($model);

         //instancia de conexão
       $conexao = Connection::getDb();

        return new $class($conexao);
    }
}

?>