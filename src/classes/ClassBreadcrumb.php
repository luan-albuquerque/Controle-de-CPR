<?php

namespace Src\Classes;

class ClassBreadcrumb
{
    use \Src\traits\UrlParser;

    public function addBreadCrumb()
    {

        $Contador = count($this->parserURL());
        $ArrayLink[0] = '';

        echo "<li><a class='primarybread' href=" . DIRPAGE . ">Home /</a></li> ";
        for ($I = 0; $I < $Contador; $I++) {
            $ArrayLink[0] .= $this->parserURL()[$I];

            echo "<li><a class= 'abread' href=" . DIRPAGE . $ArrayLink[0] . ">" . $this->parserURL()[$I] . "</a></li>";

            if ($I < $Contador - 1) {
                echo "/";
            }
        }
    }

}