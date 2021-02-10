<?php
#Arquivos Diretorios Raiz
$PastaInterna = "";
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}");

if (substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') {

    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$PastaInterna}");
} else {
    define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$PastaInterna}");
}

#Diretorios Especificos
define('DIRIMG', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}public/img/");
define('DIRCSS', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}public/css/");
define('DIRJS', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}public/js/");
define('DIRFONTES', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}public/fontes/");
define('DIRAUDIO', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}public/audio/");
define('DIRDESIGN', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}public/design/");
define('DIRVIDEO', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}public/video/");

define('HOST', "localhost");
define('USER', 'root');
define('PASS', "");
define('DB', "dti_financeiro");
