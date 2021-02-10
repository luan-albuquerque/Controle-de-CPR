<?php

namespace Src\Interfaces;

interface InterfaceView{
    
    public function setDir($Dir) ;
    public function setTitle($Title) ;
    public function setDescription($Description) ;
    public function setKeyWords($KeyWords);
    public function renderLayout();
    
}


