<?php

namespace Src\Classes;

class ClassRender {

    private $Dir;
    private $Title;
    private $Description;
    private $KeyWords;

    public function getDir() {
        return $this->Dir;
    }

    public function getTitle() {
        return $this->Title;
    }

    public function getDescription() {
        return $this->Description;
    }

    public function getKeyWords() {
        return $this->KeyWords;
    }

    public function setDir($Dir) {
        $this->Dir = $Dir;
    }

    public function setTitle($Title) {
        $this->Title = $Title;
    }

    public function setDescription($Description) {
        $this->Description = $Description;
    }

    public function setKeyWords($KeyWords) {
        $this->KeyWords = $KeyWords;
    }

    #Metodo Responsavel por renderizar todos os Layouts

    public function renderLayout() {
        include_once(DIRREQ . "app/views/Layout.php");
    }

    #Adicionar caracteristicas especificas no Head


    public function addHead() {
        if (file_exists(DIRREQ . "app/views/{$this->getDir()}/head.php}"));
        include(DIRREQ . "app/views/{$this->getDir()}/head.php");
    }

    public function addHeader() {

        if (file_exists(DIRREQ . "app/views/{$this->getDir()}/header.php}"));
        include(DIRREQ . "app/views/{$this->getDir()}/header.php");
    }

    #Adicionar caracteristicas especificas do Main

    public function addMain() {
        if (file_exists(DIRREQ . "app/views/{$this->getDir()}/main.php}"));
        include(DIRREQ . "app/views/{$this->getDir()}/main.php");
    }

    #Adicionar caracteristicas especificas do Footer

    public function addFooter() {
        if (file_exists(DIRREQ . "app/views/{$this->getDir()}/footer.php}")) ;
        include(DIRREQ . "app/views/{$this->getDir()}/footer.php");
    }

}
