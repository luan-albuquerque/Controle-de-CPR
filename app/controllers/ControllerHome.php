<?php

namespace App\Controllers;

use Src\Classes\ClassRender;
use Src\Interfaces\InterfaceView;

class ControllerHome extends ClassRender implements InterfaceView
{

    public function __construct()
    {
        $this->setTitle("Pagina Inicial");
        $this->setDescription("Esse é o site MVC");
        $this->setKeyWords("MVC - Keywords Teste");
        $this->setDir("home");
        $this->renderLayout();
    }

}

