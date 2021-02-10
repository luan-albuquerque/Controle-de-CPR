<?php

namespace App;

use Src\Classes\ClassRoutes;

class Dispatch extends ClassRoutes
{

    private $Method;
    private $Param = [];
    private $Obj;

    protected function getMethod()
    {
        return $this->Method;
    }

    public function setMethod($Method)
    {
        $this->Method = $Method;
    }

    protected function getParam()
    {
        return $this->Param;
    }

    public function setParam($Param)
    {
        $this->Param = $Param;
    }


    public function __construct()
    {
        self::addController();
    }

    private function addController()
    {

        $RotaController = $this->getRota();
        $NameS = "App\\Controllers\\{$RotaController}";
        $this->Obj = new $NameS;


        if (isset($this->parserURL()[1])) {
            self::addMethod();
        }

    }

    private function addMethod()
    {
        if (method_exists($this->Obj, $this->parserURL()[1])) {
            $this->setMethod("{$this->parserURL()[1]}");
            self::addParam();
            call_user_func_array([$this->Obj, $this->getMethod()], $this->getParam());
        } else {
            echo "<script>alert('ERRO PAGINA NÃO EXISTE OU INDISPONIVEL')</script>";

        }

    }

    private function addParam()
    {

        $ContArray = count($this->parserURL());

        if ($ContArray > 2) {
            foreach ($this->parserURL() as $Key => $value) {
               if($Key > 1){
                   $this->setParam($this->Param += [$Key => $value]);

               }            }

        }


    }


}