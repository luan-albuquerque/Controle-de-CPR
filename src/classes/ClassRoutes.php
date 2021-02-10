<?php

namespace Src\Classes;

use Src\traits\UrlParser;

class ClassRoutes
{

    use \Src\traits\UrlParser;

    private $Rota;

    #Método de retorno da rota
    public function getRota()
    {
        $Url = $this->parserURL();
        $I = $Url[0];
        $this->Rota = array(
            "" => "ControllerHome",
            "Home" => "ControllerHome",
            "Fornecedores" => "ControllerFornecedor",
            "Servicos" => "ControllerServico"
        );

        if (array_key_exists($I, $this->Rota)) {
            if (file_exists(DIRREQ . "app/controllers/{$this->Rota[$I]}.php")) {
                return $this->Rota[$I];
            } else {
                return "ControllerHome";
            }

        } else {
            return "Controller404";

        }

    }

}
